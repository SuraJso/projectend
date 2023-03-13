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
                <li aria-current="page" class="breadcrumb-item"><a href="#">My orders</a></li>
                @if ($order)
                <li aria-current="page" class="breadcrumb-item active">Order {{ $order->id }}</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-3">
            <!--
            *** CUSTOMER MENU ***
            _________________________________________________________
            -->
            <div class="card sidebar-menu">
              <div class="card-header">
                <h3 class="h4 card-title">Customer section</h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills flex-column">
                    <a href="{{ route('order.index') }}" class="nav-link {{ Request::is('order') ? 'active' : '' }}"><i class="fa fa-list"></i> My orders</a>
                    <a href="{{ route('profileuser.index') }}" class="nav-link {{ Request::is('profileuser') ? 'active' : '' }}"><i class="fa fa-user"></i> My account</a>
                    <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></ul>
              </div>
            </div>
            <!-- /.col-lg-3-->
            <!-- *** CUSTOMER MENU END ***-->
          </div>
          <div id="customer-order" class="col-lg-9">
            <div class="box">
              <h1>Order</h1>

              <p class="lead">คำสั่งซื้อ {{ $order->id }} สั่งซื้อวันที่ <strong>{{ $order->created_at->format('d/m/Y') }}</strong>สถานะ
                @if ($order->status == 1)
                <strong>รอชำระเงิน</strong>
                @elseif ($order->status == 2)
                <strong>แจ้งชำระเงินเรียบร้อย</strong>
                @elseif ($order->status == 3)
                <strong>ชำระเงินไม่ผ่าน</strong>
                @elseif ($order->status == 4)
                <strong>กำลังจัดส่ง</strong>
                @elseif ($order->status == 5)
                <strong>จัดส่งเรียบร้อย</strong>
                @elseif ($order->status == 6)
                <strong>ยกเลิก</strong>
                @endif
              </p>
              {{-- <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p> --}}
              <hr>
              <div class="table-responsive mb-4">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <th colspan="3">Unit price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order->order_details as $item)
                  <tr>
                    <td><a href="#"><img src="{{ url('public/product/img/'.$item->img) }}" alt="{{ $item->product->name }}"></a></td>
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
                      <th colspan="5" class="text-right">Total</th>
                      <th>{{ $order->total }}</th>
                    </tr>
                    <tr>
                  </tfoot>
                </table>
                @endif
              </div>
              <!-- /.table-responsive-->
              @if ($order->status == 1 || $order->status == 3)
              <h1>แจ้งชำระเงิน</h1>
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data" id="image-upload-preview" action="{{ route('order.update', $order->id) }}" >
                    @csrf
                    @method('put')


                    <div class="row">
                        <div class="col-sm-12">
                          <!-- Form -->
                          <div class="mb-4">
                            <label for="image" class="form-label">Img</label>

                            <input type="file" class="form-control" name="image" id="image">
                          </div>

                          <!-- End Form -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload" src="{{ url('public/product/img/noimg.png') }}"
                                alt="preview image" style="max-height: 250px;">
                        </div>
                    </div>
                    <!-- End Row -->

                    <div class="row">

                        <div class="col-sm-12 ">
                          <!-- Form -->
                          <button type="submit" class="btn btn-primary">Save</button>
                          <!-- End Form -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                    <!-- Quill -->
                    {{-- <div class="quill-custom">
                      <div class="js-quill" style="height: 15rem;" data-hs-quill-options='{
                           "placeholder": "Type your description...",
                            "modules": {
                              "toolbar": [
                                ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                              ]
                            }
                           }'>
                      </div>
                    </div> --}}
                    <!-- End Quill -->
                </form>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function (e) {


       $('#image').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });

</script>
@endsection
