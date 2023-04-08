@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="pembungkus-kartu-login">
            <div class="kartu-login">
                <div class="judul-login">
                    <h3>Daftar</h3>
                </div>
                <div class="isi-login">
                    @error('name')
                    <div class="text-danger">
                    {{$message}}</div>
                    @enderror
                    <input type="text" name="name" placeholder="nama" class="@error('name') is-invalid @enderror"
                    value="{{old('name')}}">
                    
                    @error('email')
                    <div class="text-danger">
                    {{$message}}</div>
                    @enderror
                    <input type="email" name="email" placeholder="email" class="@error('email') is-invalid @enderror"
                    value="{{old('email')}}">
                    
                    @error('password')
                    <div class="text-danger">
                    {{$message}}</div>
                    @enderror
                    <input type="password" name="password" placeholder="password" class="@error('password') is-invalid @enderror">

                    <input id="confirmasi password" type="password" placeholder="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
            
                    <button type="submit">Daftar</button>
                    
                    <div class="bantuan">
                        <p>Sudah Punya Akun ? <a href="/login">Masuk</a> </p>
                    </div>
                
                </div>
            </div>
        </div>
    </form>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
