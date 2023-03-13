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
                <li aria-current="page" class="breadcrumb-item active">My orders</li>
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
          <div id="customer-orders" class="col-lg-9">
            <div class="box">
              <h1>My orders</h1>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Order</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order as $item)
                    <tr>
                        <th> {{ $item->id }}</th>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>{{ $item->total }} บาท</td>
                        <td>
                            @if ($item->status == 1)
                                <span class="badge badge-warning">รอชำระเงิน</span>
                            @elseif ($item->status == 2)
                                <span class="badge badge-info">แจ้งชำระเงินเรียบร้อย</span>
                            @elseif ($item->status == 3)
                                <span class="badge badge-warning">ชำระเงินไม่ผ่าน</span>
                            @elseif ($item->status == 4)
                                <span class="badge badge-info">กำลังจัดส่ง</span>
                            @elseif ($item->status == 5)
                            <span class="badge badge-success">จัดส่งเรียบร้อย</span>
                            @elseif ($item->status == 6)
                            <span class="badge badge-badge-danger">ยกเลิก</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('order.edit',$item->id) }}" class="btn btn-primary btn-sm">รายละเอียด</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
