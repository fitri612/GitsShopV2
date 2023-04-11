
@extends('layouts.admin')

{{-- @extends('layouts.app') --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center">Admin Profile</h3>


                                    <div class="card mt-3">

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        <form action="{{ route('edit_profile') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <img src="{{asset('images/1680958590_baju koko.png')}}" alt="" class="img-thumbnail rounded" style="width:100%;height:250px;margin:0;object-fit: cover">
                                    </div>
                                    {{-- <div class="label mt-3">          
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" name="gambar"
                                        id="formFile" style="background-color: rgb(240, 240, 244)" value="{{asset('storage/images/1680958590_baju koko.png')}}">
                                    </div> --}}
                        h
                                </div>
                                <div class="col-md-8">

                                    <div class="form-group mt-2">
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="Name" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Role</label>
                                        <input type="role" class="form-control"
                                            value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                                    </div>
                                    <div class="d-flex justify-content-end tombol-tambah">

                                        <button type="submit" class="btn  mt-3 " style="color:white;">Change profile details</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                    {{-- <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        <form action="{{ route('edit_profile') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="role" class="form-control"
                                    value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Change profile details</button>
                        </form>
                    </div> --}}
            </div>
        </div>
    </div>
@endsection
