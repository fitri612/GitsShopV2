<nav>
    <div class="sidebar">
        <div class="head-text">
            <h3 class="text-center">user</h3>
        </div>
        <div class="menu-link">
            <a href="{{ route('transaction.cashier') }}"><i class="fa fa-cart-shopping " aria-hidden="true"></i> Casier</a>
            <a href="{{ route('transaction.history') }}"><i class="fa-solid fa-cart-plus"></i> Transaksi</a>
        </div>
        <a href="{{ route('show_profile') }}"><i class="fa-solid fa-user"></i>Profile</a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fa-sharp fa-solid fa-right-from-bracket"></i>{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </div>
    <div class="nav-content">
        <div class="logo">
            <img src="../img/keyboard.png" alt="" style="width:60px;height:60px;">
            <a href="/" style="color:#00214d">Lemon Shop</a>
        </div>
        <form class="search-box">
            <input type="text" placeholder=" Cari produk....">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <ul class="nav-links">
            @guest
            @if (Route::has('login'))
                    <li><a href="{{ route('login') }}"><button class="btn btn-primary">masuk</button></a></li>
                @endif

                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}"><button class="btn btn-primary">daftar</button></a></li>
                @endif
                </li>
            @endguest
        </ul>
    </div>
</nav>
