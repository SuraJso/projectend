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
                <li class="breadcrumb-item"><a href="{{ route('home1') }}">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Checkout</li>
              </ol>
            </nav>
          </div>
          <div id="basket" class="col-lg-12">
            <div class="box">

                <h1>Checkout</h1>

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2">Product</th>
                        <th>Quantity</th>
                        <th colspan="3">Unit price</th>
                        {{-- <th colspan="3" class="text-center">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @if ($order)
                        @foreach ($order->order_details as $item)
                      <tr>
                        <td><a href="#"><img src="{{ url('public/product/img/'.$item->product->img) }}" alt="{{ $item->product->name }}"></a></td>
                        <td><a href="#">{{ $item->product->name }}</a></td>
                        <td>
                            {{ $item->amount }}
                        </td>
                        <td colspan="3">{{ $item->price }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="5">Total</th>
                        <th colspan="2">{{ $order->total }}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.table-responsive-->
                <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                  <div class="left">
                    <a href="{{ route('category') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                  </div>
                  <div class="right">
                    <form action="{{ route('checkout.update', $order->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="value" value="checkout">
                        <button type="submit" class="btn btn-primary">Checkout<i class="fa fa-chevron-right"></i></button>
                    </form>
                  </div>
                </div>
                @endif
            </div>
            <!-- /.box-->
          </div>
          <!-- /.col-lg-9-->
          <!-- /.col-md-3-->
        </div>
      </div>
    </div>
</div>
@endsection
