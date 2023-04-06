@extends('layouts.app')

@section('content')
    <div class="card w-100">
        <div class="card-header">
            <h4 class="card-title">Category</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class=" text-primary">
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
