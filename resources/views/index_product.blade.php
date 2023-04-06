    @extends('layouts.app')

    @section('content')
    <div id="carouselExampleIndicators" class="carousel slide w-100 mx-auto" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="slide/slide1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>VANS</h2>
                <h5>Off The Wall</h5>
              </div>
          </div>
          <div class="carousel-item">
            <img src="slide/slide2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>NIKE</h2>
                <h5>Just Do It</h5>
              </div>
          </div>
          <div class="carousel-item" style="">
            <img src="slide/slide3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>COMPASS</h2>
                <h5>Compass Untuk Semua</h5>
              </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    
    </div>
        <div class="container">
            <h2 class="text-center">{{ __('Products') }}</h2>
            <div class="row row-cols-1 row-cols-md-3 justify-content-center">
                            @foreach ($products as $product)
                                <div class="card shadow-lg m-3 p-3 mb-5  " style="width:18rem">
                                    <img class="card-img-tops" style="height: 250px" src="{{ url('storage/' . $product->image) }}"
                                        alt="Card image cap">
                                    <div class="card-body m-auto ">
                                        <p class="card-text">{{ $product->name }}</p>
                                        <form action="{{ route('show_product', $product) }}" method="get">
                                            <button type="submit" class="btn btn-primary">Show detail</button>
                                        </form>
                                        @if (Auth::check() && Auth::user()->is_admin)
                                            <form action="{{ route('delete_product', $product) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mt-2">Delete product</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
    <div class="text-center text-light p-3 bg-black">
        © 2022 Copyright:
        <a class="text-white" href="https://www.instagram.com/hikmalrsq/?hl=id">hikmalrsq</a>
        <br>
  <p>STUDY AT:SMKN 7 PONTIANAK</p>
</div>


    @endsection
