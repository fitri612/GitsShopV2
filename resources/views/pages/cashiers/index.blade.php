@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Cashiers</div>
                    @foreach ($products as $product)
                        <div class="card shadow-lg m-3 p-3 mb-5  " style="width:18rem">
                            <img class="card-img-tops" style="height: 250px" src="{{ url('storage/' . $product->image) }}"
                                alt="Card image cap">
                            <div class="card-body m-auto ">
                                <p class="card-text">{{ $product->name }}</p>
                                <form action="{{ route('show.productV2', $product) }}" method="get">
                                    <button type="submit" class="btn btn-primary">Show detail</button>
                                </form>
                                <form action="{{ route('add_to_cart', $product) }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" aria-describedby="basic-addon2"
                                            name="amount" value=1 min="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">
                                                <i class="fa-solid fa-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                @if (Auth::check() && Auth::user()->is_admin)
                                    <form action="{{ route('destroy.productV2', $product) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-2">Delete product</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Cart') }}</div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @endif

                    @php
                        $total_price = 0;
                    @endphp
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $cart->product->name }}</td>
                                    <td><img src="{{ url('storage/' . $cart->product->image) }}" alt=""
                                            width="50px"></td>
                                    <td>{{ $cart->product->price }}</td>
                                    <td>{{ $cart->amount }}</td>

                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal{{ $cart->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="3">Total price</td>
                                <td>{{ $total_price }}</td>
                            </tr>
                            <form action="{{ route('transaction.store') }}" method="post">
                                @csrf
                                <tr class="table table-borderless">
                                    <td>
                                        <label for="cash">Cash(Rp)</label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="cash" name="cash"
                                            value="" placeholder="Cash" required>
                                    </td>
                                </tr>
                                <tr class="table table-borderless">
                                    <td></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm col-12" type="submit"
                                            onclick="return confirm('Are you sure you want to checkout?')">Checkout
                                            / Paid</button>
                                    </td>
                                </tr>
                            </form>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
