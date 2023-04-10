{{-- <nav>
    <div class="sidebar">
        <div class="head-text">
            <h3 class="text-center">Admin Page</h3>
        </div>
        <a href="{{ route('category.index') }}"><i class="fa-solid fa-list"></i> Category</a>
        <a href="{{ route('index.productV2') }}">
            <i class="fa-solid fa-cart-plus"></i> Products</a>
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
</nav> --}}

<header>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <ul class="list-group list-group-flush mx-3 mt-4" id="navmenu" style="list-style-type: none;">
                <li>
                    <a href="{{ route('category.index') }}"
                        class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-list-ol fa-fw me-3"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('index.productV2') }}"
                        class="{{ request()->routeIs('index.productV2') ? 'active' : '' }}">
                        <i class="fa-solid fa-boxes-stacked fa-fw me-3"></i><span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show_profile_admin') }}"
                        class="{{ request()->routeIs('show_profile_admin') ? 'active' : '' }}">
                        <i class="fa-solid fa-user fa-fw me-3"></i><span>Profile</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket fa-fw me-3"></i><span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="../img/keyboard.png" style="width:60px;height:60px; margin: 0px;" loading="lazy" />
                <strong class="ms-1">Lemon Shop</strong>
            </a>
            <!-- Search form -->
            <form class="d-none d-md-flex input-group w-auto my-auto">
                <input class="form-control" type="text" id="searchInput" onkeyup="searchByName()"
                    placeholder="Search by name...">
                <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
            </form>
        </div>
        <!-- Container wrapper -->
    </nav>
</header>
