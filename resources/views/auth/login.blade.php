<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body style="background-color: rgb(240, 240, 244)">
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="pembungkus-kartu-login">
                @if (Session::has('success'))
                <div class="alert alert-success mt-3" role="alert">
                    <i class="fa-solid fa-circle-check"></i> {{Session::get('success')}} 
                </div>
                @endif
    
                @if (Session::has('error'))
                    <div class="alert alert-danger mt-3" role="alert">
                        <i class="fa-solid fa-circle-check"></i> {{Session::get('error')}} 
                    </div>
                @endif
                <div class="kartu-login">
            
                    <div class="judul-login">
                        <h3>Masuk</h3>
                    </div>
                    @if (Session::Has('errorLogin'))
                    <div class="alert alert-danger mt-3" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i> {{Session::get('errorLogin')}} 
                    </div>
                    @endif
                    <div class="isi-login">
                        @error('username')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <input type="text" name="email" placeholder="email" class="@error('username') is-invalid @enderror" 
                        value="{{old('email')}}" >
                        @error('password')
                        <div class="text-danger">
                        {{$message}}
                        </div>
                        @enderror
                        <input type="password" name="password" placeholder="password" 
                        class="@error('password') is-invalid @enderror" >
                        <button type="submit">Masuk</button>
                        <div class="bantuan">
                            <p>Belum Punya Akun ? <a href="{{ route('register') }}">Daftar</a> </p>
                            {{-- @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot Password</a>
                            @endif --}}
                            
    
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
    
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</body>
</html>
