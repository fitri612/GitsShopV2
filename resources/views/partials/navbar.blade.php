<header>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <ul class="list-group list-group-flush mx-3 mt-4" id="navmenu" style="list-style-type: none;">
                <li>
                    <a href="{{ route('transaction.cashier') }}"
                        class="{{ request()->routeIs('transaction.cashier') ? 'active' : '' }}">
                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Cashier</span>
                    </a>
                </li>
                <li >
                    <a href="{{ route('transaction.history') }}"
                        class="{{ request()->routeIs('transaction.history') ? 'active' : '' }}">
                        <i class="fas fa-lock fa-fw me-3"></i><span>Transaction</span>
                    </a>
                </li>
                <li >
                    <a href="{{ route('show_profile') }}"
                        class="{{ request()->routeIs('show_profile') ? 'active' : '' }}">
                        <i class="fa-solid fa-user fa-fw me-3"></i><span>Profile</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
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
                <img src="../img/keyboard.png" style="width:60px;height:60px;  margin: 0px;" loading="lazy" />
                <strong class="ms-1">Lemon Shop</strong>
            </a>
            <!-- Search form -->
            {{-- <form class="d-none d-md-flex input-group w-auto my-auto">
                <input type="text" id="searchInput" onkeyup="searchByName()" placeholder="Search by name...">
                <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
            </form> --}}
            <form class="d-none d-md-flex input-group w-auto my-auto">
                <input class="form-control" type="text" id="searchInput" onkeyup="searchByName()"
                    placeholder="Search by name...">
                <span class="input-group-text border-0 btn btn-primary"><i class="fas fa-search"></i></span>
            </form>
        </div>

        <!-- Container wrapper -->

    </nav>
</header>
