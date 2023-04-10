<header>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                </a>
                <a href="{{ route('transaction.cashier') }}"
                    class="list-group-item list-group-item-action py-2 ripple active">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Cashier</span>
                </a>
                <a href="{{ route('transaction.history') }}"
                    class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Transaction</span></a>
                <a href="{{ route('show_profile') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-line fa-fw me-3"></i><span>Profile</span></a>
                <li class="nav-item dropdown" style="list-style-type: none;">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-chart-line fa-fw me-3"></i><span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </div>
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
                <img src="../img/keyboard.png" style="width:60px;height:60px;" loading="lazy" />
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
    </nav>
</header>
