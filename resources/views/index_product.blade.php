    @extends('layouts.app')

    @section('content')

        
        <div class="container">
            <h2 class="text-center">{{ __('Products') }}</h2>
            <div class="row row-cols-1 row-cols-md-3 justify-content-center">
                @foreach ($products as $product)
                    <div class="card shadow-lg m-3 p-3 mb-5  " style="width:18rem">
                        <img class="card-img-tops" style="height: 250px" src="{{ url('storage/' . $product->image) }}"
                            alt="Card image cap">
                        <div class="card-body m-auto ">
                            <p class="card-text">{{ $product->name }}</p>
                            <form action="{{ route('show_product', $product) }}" method="get">
                                <button type="submit" class="btn btn-primary">Show detail</button>
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
