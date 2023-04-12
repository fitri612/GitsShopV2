@extends('layouts.app')

@section('content')
    <section class="section-content padding-y-sm bg-default">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 card padding-y-sm card ">
                    <ul id="category-nav" class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="pill" data-category-id="all" href="#all">
                                <i class="fa fa-tags"></i> All</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" data-category-id="{{ $category->id }}"
                                    href="#category-{{ $category->id }}">
                                    <i class="fa fa-tags"></i> {{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <span id="items">
                        <div class="row">
                            @foreach ($products as $product)
                                {{-- <div class="col-md-3" data-category-id="{{ $product->category_id }}"> --}}
                                <div class="col-md-3 col-md-4" data-category-id="{{ $product->category_id }}">

                                    <figure class="card card-product col">
                                        <span class="badge-new"> NEW </span>
                                        <div class="img-wrap">
                                            <img src="{{ url('images/' . $product->image) }}"
                                                style="margin: 0; left: 0; right: 0;">
                                            <form action="{{ route('show.productV2', $product) }}" method="get">
                                                <button type="submit" class="btn-overlay"><i class="fa fa-search-plus"></i>
                                                    Quick view</button>
                                            </form>
                                        </div>
                                        <figcaption class="info-wrap">
                                            <p class="title h-80">{{ $product->name }}</p>
                                            <div class="action-wrap">
                                                <form action="{{ route('add_to_cart', $product) }}" method="post">
                                                    @csrf
                                                    <div class="py-1">
                                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2"
                                                            role="group" aria-label="...">
                                                            <button type="button" class="m-btn btn btn-default"
                                                                onclick="decrementValue('amountInput{{ $product->id }}')"><i
                                                                    class="fa fa-minus"></i></button>
                                                            <input type="text" class="form-control"
                                                                aria-describedby="basic-addon2" name="amount"
                                                                id="amountInput{{ $product->id }}" value="1"
                                                                min="1">
                                                            <button type="button" class="m-btn btn btn-default"
                                                                onclick="incrementValue('amountInput{{ $product->id }}')"><i
                                                                    class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="py-5">
                                                        <button type="submit" class="btn btn-success btn-xl float-right">
                                                            <i class="fa fa-cart-plus"></i> Add
                                                        </button>
                                                        <div class="price-wrap h5">
                                                            <span
                                                                class="price-new">Rp{{ number_format($product->price) }}</span>
                                                        </div>
                                                        @if (Auth::check() && Auth::user()->is_admin)
                                                            <form action="{{ route('destroy.productV2', $product) }}"
                                                                method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger mt-2 btn-xl float-right">Delete
                                                                    product</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </figcaption>

                                    </figure>
                                </div>
                            @endforeach
                        </div>
                    </span>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        @php
                            $total_price = 0;
                        @endphp
                        <span id="cart">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col" width="120">Qty</th>
                                        <th scope="col" width="120">Price</th>
                                        <th scope="col" class="text-right" width="200">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>
                                                <figure class="media">
                                                    <img src="{{ url('images/' . $cart->product->image) }}"
                                                        class="img-thumbnail img-xs " style="margin: 0">
                                                    <figcaption class="media-body"
                                                        style="max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                                                        <h6 class="title text-truncate ml-4">{{ $cart->product->name }}
                                                        </h6>
                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td class="text-center">
                                                <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                                    aria-label="...">
                                                    <button type="button" class="m-btn btn btn-default"
                                                        disabled>{{ $cart->amount }}</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                    <var class="price">Rp{{ number_format($cart->product->price) }}</var>
                                                </div> <!-- price-wrap .// -->
                                            </td>
                                            <td class="text-right">
                                                <button type="submit" class="btn btn-outline-success" data-toggle="modal"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $cart->id }}">
                                                    <i class="fa-regular fa-pen-to-square"></i></button>
                                            </td>
                                            <td class="text-right">
                                                <form action="{{ route('delete_cart', ['cart' => $cart->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"> <i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $total_price += $cart->product->price * $cart->amount;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </span>
                    </div>
                    <div class="box">
                        <dl class="dlist-align">
                            <dt>Total: </dt>
                            <dd class="text-right h4 b"> Rp{{ number_format($total_price) }} </dd>
                        </dl>
                        <form action="{{ route('transaction.store') }}" method="post">
                            @csrf
                            <dl class="dlist-align">
                                <dt>Cash: </dt>
                                <dd class="text-right h4 b"> <input type="text" class="form-control " id="cash"
                                        name="cash" value="" placeholder="Cash" required></dd>
                            </dl>
                            <div class="align-items-center">
                                <div class="col-md-14 mt-5">
                                    <button class="btn  btn-success btn-lg btn-block"
                                        onclick="return confirm('Are you sure you want to checkout?')"><i
                                            class="fa fa-shopping-bag"></i>
                                        Paid </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- modal edit cart --}}
    @foreach ($carts as $cart)
        <div class="modal " id="exampleModal{{ $cart->id }}" aria-labelledby="editProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('update_cart', ['cart' => $cart->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- stock --}}
                            <div class="form-group">
                                <label for="amount">Quantity</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    value="{{ $cart->amount }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Quantity</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
