@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{ __('Products') }}</h2>
        <div class="row row-cols-1 row-cols-md-3 justify-content-center">
            @foreach ($products as $product)
                <div class="card shadow-lg m-3 p-3 mb-5  " style="width:18rem">
                    <img class="card-img-tops" style="height: 250px" src="{{ url('images/' . $product->image) }}"
                        alt="Card image cap">
                    <div class="card-body m-auto ">
                        <p class="card-text">{{ $product->name }}</p>
                        <form action="{{ route('show.productV2', $product) }}" method="get">
                            <button type="submit" class="btn btn-primary">Show detail</button>
                        </form>
                        <form action="{{ route('add_to_cart', $product) }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount"
                                    value=1 min="1">
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
    @endsection
