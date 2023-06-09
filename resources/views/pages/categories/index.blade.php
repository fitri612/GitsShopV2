@extends('layouts.app')
{{-- @extends('layouts.admin') --}}
{{-- ubah ke navbar admin --}}
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
            <div class="card-header" style="background-color: white;">
                <h4 class="card-title">Table Categories</h4>
            </div>
            <div class="d-flex justify-content-between mt-3 px-3 tombol-tambah">
                <button type="button" class="btn  mb-3" data-bs-toggle="modal"
                    data-bs-target="#addCategoryModal">
                    <i class="fa-solid fa-plus"></i> Add Category</button>
            </div>

            {{-- Message form validation error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table ">
                        <thead class=" text-white " style="background-color: rgb(116, 193, 99);">
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th >Created At</th>
                            <th >Updated At</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr scope="row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal{{ $category->id }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </td>
                                    <td>
                                            <button type="submit" data-bs-toggle="modal" data-bs-target="#deletemodal{{ route('categories.destroy', $category->id) }}" name="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i></button>

                                        {{-- modaldelete --}}                 
                                        <div class="modal fade" id="deletemodal{{ route('categories.destroy', $category->id) }}"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5 " id="staticBackdropLabel">peringatan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form action='{{ route('categories.destroy', $category->id) }}' method="post" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <h6>apakah anda yakin akan menghapus kategori "{{ $category->name }}"</h6>
                                                    </form>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        {{-- modaldelete --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 15px">
                <div class="modal-header" style="background: #31c554">
                    <h5 class="modal-title text-white text-center" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Add Category</button>
                        {{-- <button type="button" class="btn  mb-3" data-bs-toggle="modal">
                    <i class="fa-solid fa-plus"></i> Add Category</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    @foreach ($categories as $category)
        <div class="modal " id="editCategoryModal{{ $category->id }}" aria-labelledby="editCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 15px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $category->name }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
