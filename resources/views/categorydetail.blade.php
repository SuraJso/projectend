@extends('layouts.main')

@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            {{-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Ladies</a></li>
                <li class="breadcrumb-item"><a href="#">Tops</a></li>
                <li aria-current="page" class="breadcrumb-item active">White Blouse Armani</li>
              </ol>
            </nav> --}}
          </div>

          <div class="col-lg-12 order-1 order-lg-2">
            <div id="productMain" class="row">
              <div class="col-md-6">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  <div class="item"> <img src="img/detailbig1.jpg" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="img/detailbig2.jpg" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="img/detailbig3.jpg" alt="" class="img-fluid"></div>
                </div>
                <!-- /.ribbon-->
              </div>
              <div class="col-md-6">
                <div class="box">
                  <h1 class="text-center">{{ $product->name }}</h1>
                  <p class="price">{{ $product->price }} บาท</p>
                  <p class="text-center buttons"><a href="{{ route('cart') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a></p>
                </div>
                <div data-slider-id="1" class="owl-thumbs">
                  <button class="owl-thumb-item"><img src="img/detailsquare.jpg" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                </div>
              </div>
            </div>
            <div id="details" class="box">
              <p></p>
              <h4>Product details</h4>
              <p>{{ $product->detail }}</p>
            </div>
          </div>
          <!-- /.col-md-9-->
        </div>
      </div>
    </div>
</div>
@endsection
