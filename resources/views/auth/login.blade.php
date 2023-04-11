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
                        @error('email')
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
                            
    
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
        
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>
