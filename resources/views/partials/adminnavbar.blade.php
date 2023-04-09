<nav>
    <div class="sidebar">
        <div class="head-text">
            <h3 class="text-center">Admin Page</h3>
        </div>
        <a href="{{ route('category.index') }}"><i class="fa-solid fa-list"></i> Category</a>
        <a href="{{ route('index.productV2') }}">
            <i class="fa-solid fa-cart-plus"></i> Product</a>
    </div>

    <div class="nav-content">
        <div class="logo">
            <img src="../img/keyboard.png" alt="" style="width:60px;height:60px;">
            <a href="/admin" style="color:#00214d">Lemon Shop</a>
        </div>
        <form class="search-box">
            <input type="text" placeholder=" Cari produk....">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <ul class="nav-links">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle account" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="../img/avataritem.png" style="border-radius: 100%; width: 30px; height: 30px;"
                        alt="Avatar" class="avatar me-2">{{ Auth::user()->name }}
                </a>
                {{-- variasi styling saja --}}
                {{-- @include('partials.popup') --}}
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('show_profile_admin') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                            <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
