@extends('layouts.app')
{{-- @extends('layouts.admin') --}}
@section('web-title', 'Product |')
@section('content')
    <div class="row">
        {{-- Flask Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card w-100">
            <div class="card-header" style="background-color: white">
                <h3 class="card-title" >Table Product</h3>
            </div>


            <div class="d-flex justify-content-between mt-3 px-3 tombol-tambah">
                <button type="button" class="btn mb-3 "  style="color:white;"data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fa-solid fa-plus"></i> Add Product</button>
            </div>
            {{-- card datanya dalam bentuk table--}}
            <div class="card-body ms-3 me-3 mb-5"  style="">    
                <table class="table   text-center">
                    <thead class="table" style="background-color: rgb(116, 193, 99); color:white">
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama product</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Details</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    
                    @foreach ($products as $item)
                    <tbody >
                        <td >{{$loop->iteration}}</td>
                        <td>
                            @if ($item->image)
                            <img src="{{ url('images/' . $item->image) }}" alt="" class="img-thumbnail rounded" style="max-width: 70px;height:70px;margin:0;object-fit: cover;">
                            
                            @else
                            <p>tidak ada gambar</p>
                                            
                            @endif
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>Rp. {{number_format($item->price)}},00</td>
                        <td>
                            <form action="{{ route('show.productV2', $item) }}" method="get">
                                <button type="submit" class="btn btn-secondary mt-2 ">
                                    <i class="fa-solid fa-file"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            @if (Auth::check() && Auth::user()->is_admin)
                            <button type="button" class="btn btn-primary mt-2 " data-bs-toggle="modal"
                                data-bs-target="#editProductModal{{ $item->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('delete_product', $item) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2 ">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endif
                        </td>
                    </tbody>
                    @endforeach
                </table>
                {{-- <div class="d-flex ms-3" >
                    {!! $products->links('pagination::simple-bootstrap-5') !!}
                </div> --}}
            </div>
        
            {{-- product dalam bentuk card, tapi di halaman admin --}}
            {{-- <div class="container">
                <h2 class="text-center">{{ __('Products') }}</h2>
                <div class="row row-cols-1 row-cols-md-3 justify-content-center">
                    @foreach ($products as $product)
                        <div class="card shadow-lg m-3 p-3 mb-5  " style="width:18rem">
                            <img class="card-img-tops" style="height: 250px" src="{{ url('images/' . $product->image) }}"
                                alt="Card image cap">
                            <div class="card-body m-auto ">
                                <p class="card-text">{{ $product->name }}</p>
                                <p class="card-text">
                                    {{ $product->category->name }}
                                </p>
                                <form action="{{ route('show.productV2', $product) }}" method="get">
                                    <button type="submit" class="btn btn-primary">Show detail</button>
                                </form>
                                @if (Auth::check() && Auth::user()->is_admin)
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                        data-bs-target="#editProductModal{{ $product->id }}">
                                        Edit Product
                                    </button>
                                    <form action="{{ route('delete_product', $product) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-2">Delete product</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>
    </div>

    {{-- modal create product --}}
    <div class="modal " id="addProductModal" tabindex="-1" role="modal" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('store.productV2') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit product --}}
    @foreach ($products as $product)
        <div class="modal " id="editProductModal{{ $product->id }}" aria-labelledby="editProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('update.productV2', ['product' => $product->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $product->name }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" value="{{ $product->price }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- stock --}}
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                    id="stock" name="stock" value="{{ $product->stock }}" required>
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- description --}}
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" required>{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- category --}}
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- image --}}
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
