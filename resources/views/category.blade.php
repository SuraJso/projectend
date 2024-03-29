@extends('layouts.main')

@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Category</li>
              </ol>
            </nav>
            {{-- <div class="box">
              <h1>Product</h1>
              <p>In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
            </div>
            <div class="box info-bar">
              <div class="row">
                <div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of <strong>25</strong> products</div>
                <div class="col-md-12 col-lg-7 products-number-sort">
                  <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                    <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div>
                    <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                      <select name="sort-by" class="form-control">
                        <option>Price</option>
                        <option>Name</option>
                        <option>Sales first</option>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
            </div> --}}
            <div class="row products">
            @foreach ($products as $item)
              <div class="col-lg-3 col-md-4">
                <div class="product">
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="detail.html"><img src="{{ url('public/product/img/'.$item->product->img) }}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="detail.html"><img src="{{ url('public/product/img/'.$item->product->img) }}" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="detail.html" class="invisible"><img src="{{ url('public/product/img/'.$item->product->img) }}" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="detail.html">{{ $item->product->name }}</a></h3>
                    <p class="price">
                      <del></del>{{ $item->product->price }} บาท
                    </p>
                    <p class="buttons"><a href="{{ route('categorydetail.edit',$item->product->id) }}" class="btn btn-outline-secondary">View detail</a>
                    <input type="hidden" name="product_id" placeholder="" value="{{ $item->product->id }}">
                    <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </p><p>จำนวนคงเหลือ {{ $item->count }}</a></p>
                  </div>
                </form>
                  <!-- /.text-->
                </div>
                <!-- /.product            -->
              </div>
            @endforeach
              <!-- /.products-->
            </div>
            <div class="pages">
              {{-- <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p> --}}
              <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                {{ $products->links() }}
              </nav>
            </div>
          </div>
          <!-- /.col-lg-9-->
        </div>
      </div>
    </div>
</div>
@endsection
