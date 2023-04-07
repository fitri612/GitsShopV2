<nav>
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
        <li><button class="btn btn-success">cart</button></li>
        
    @guest
        @if (Route::has('login'))
        <li><a href="{{ route('login') }}"><button class="btn btn-primary">masuk</button></a></li>
        @endif

        @if (Route::has('register'))
        <li><a href="{{ route('register') }}"><button class="btn btn-primary">daftar</button></a></li>
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
                @endif
                <a href="{{ route('logout') }}" onclick="event.preventDefault();

                document.getElementById('logout-form').submit();">
                <i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    
                @csrf
            </form>
            </div>
        </li>
       @endguest
      </ul>
   </div>
</nav>
   
 
 
  
 