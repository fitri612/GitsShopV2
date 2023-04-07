<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/c4ed16d53e.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow p-2 mb-2">
            <div class="container">
                <a class="navbar-brand fs-4" href="{{ route('index_product') }}">
                    HI-ecommerce
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow-sm p-7 "
                                    aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->is_admin)
                                        <a class="dropdown-item" href="{{ route('category.index') }}">
                                            <i class="fa-solid fa-list"></i>
                                            Categories
                                        </a>
                                    @endif
                                    @if (Auth::user()->is_admin)
                                        <a class="dropdown-item" href="{{ route('index.productV2') }}">
                                            <i class="fa-solid fa-cart-plus"></i>
                                            Create product V2
                                        </a>
                                        <a class="dropdown-item" href="{{ route('create_product') }}">
                                            <i class="fa-solid fa-cart-plus"></i>
                                            Create product
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('show_cart') }}">
                                            <i class="fa fa-cart-shopping " aria-hidden="true"></i>
                                            Cart
                                        </a>
                                        <a class="dropdown-item" href="{{ route('transaction.cashier') }}">
                                            <i class="fa fa-cart-shopping " aria-hidden="true"></i>
                                            Casier
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('index_order') }}">
                                        <i class="fa-sharp fa-solid fa-clipboard-list"></i>
                                        My Order
                                    </a>

                                    <a class="dropdown-item" href="{{ route('show_profile') }}">
                                        <i class="fa-solid fa-user"></i>
                                        Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-sharp fa-solid fa-right-from-bracket"></i>

                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2 ">


            @yield('content')
        </main>
    </div>
    </div>
    </div>
    </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

</html>
