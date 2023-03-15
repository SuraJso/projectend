@extends('layouts.admin.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
              <h1 class="page-header-title">Order <span class="badge bg-soft-dark text-dark ms-2"></span></h1>
            </div>
            <!-- End Col -->


            <!-- End Col -->
          </div>
          <!-- End Row -->

          <!-- Nav Scroller -->
          <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <span class="hs-nav-scroller-arrow-prev" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="bi-chevron-left"></i>
              </a>
            </span>

            <span class="hs-nav-scroller-arrow-next" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="bi-chevron-right"></i>
              </a>
            </span>

            <!-- Nav -->
            <ul class="nav nav-tabs page-header-tabs" id="pageHeaderTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#">All Orders</a>
              </li>
            </ul>
            <!-- End Nav -->
          </div>
          <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <div class="row justify-content-end mb-3">
          <div class="col-lg">
            <!-- Datatable Info -->
            <div id="datatableCounterInfo" style="display: none;">
              <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
                <span class="d-block d-sm-inline-block fs-5 me-3 mb-2 mb-sm-0">
                  <span id="datatableCounter">0</span>
                  Selected
                </span>
                <a class="btn btn-outline-danger btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                  <i class="bi-trash"></i> Delete
                </a>
                <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                  <i class="bi-archive"></i> Archive
                </a>
                <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                  <i class="bi-upload"></i> Publish
                </a>
                <a class="btn btn-white btn-sm mb-2 mb-sm-0" href="javascript:;">
                  <i class="bi-x-lg"></i> Unpublish
                </a>
              </div>
            </div>
            <!-- End Datatable Info -->
          </div>
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div class="card">
          <!-- Header -->
          <div class="card-header card-header-content-md-between">
            <div class="mb-2 mb-md-0">
              <form>
                <!-- Search -->
                <div class="input-group input-group-merge input-group-flush">
                  <div class="input-group-prepend input-group-text">
                    <i class="bi-search"></i>
                  </div>
                </div>
                <!-- End Search -->
              </form>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 4, 9],
                        "width": "5%",
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 12,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="table-column-pe-0">
                    Number
                  </th>
                  <th class="table-column-ps-0">Img</th>
                  <th>status</th>
                  <th>Total</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($order as $key=>$item)
                  <td class="table-column-pe-0">
                        {{ ++$key }}
                  </td>
                  <td class="table-column-ps-0">
                    {{-- <a class="d-flex align-items-center" href="./ecommerce-product-details.html"> --}}
                      <div class="flex-shrink-0">
                        <img height="300" width="300" src="{{ url('public/payment/img/'.$item->img) }}" alt="Image Description">
                      </div>
                    {{-- </a> --}}
                  </td>
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

                  <td>{{ $item->total }} บาท</td>
                  <td>
                    <div class="btn-group" role="group">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editmodal{{ $item->id }}">
                            รายละเอียด
                        </button>
                        </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- End Table -->
        @foreach ($order as $item)
        <!-- Modal -->
        <div class="modal fade" id="editmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                @csrf
                @method('put')
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">รายละเอียด</h1>
                    </div>
                    <div class="modal-body">
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
                                @foreach ($item->order_details as $items)
                              <tr>
                                <td><a href="#"><img height="250" width="300" src="{{ url('public/product/img/'.$items->product->img) }}" alt="{{ $items->product->name }}"></a></td>
                                <td><a href="#">{{ $items->product->name }}</a></td>
                                <td>
                                    {{ $items->amount }}
                                </td>
                                <td colspan="3">{{ $items->price }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th colspan="5" class="text-right">Total</th>
                                  <th>{{ $item->total }} บาท</th>
                                </tr>
                                <tr>
                              </tfoot>
                            </table>
                          </div>
                        <div class="mb-8">
                            <div class="btn-group" role="group">
                            <form action="{{ route('adminorder.update', $item->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="value" value="success">
                                <button class="btn btn-outline-info" type="submit">ชำระเงินเรียบร้อย</button>
                            </form>
                            <form action="{{ route('adminorder.update', $item->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="value" value="delivery">
                                <button class="btn btn-outline-info" type="submit">กำลังจัดส่ง</button>
                            </form>
                            <form action="{{ route('adminorder.update', $item->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="value" value="deliverysuccess">
                                <button class="btn btn-outline-success" type="submit">จัดส่งเรียบร้อย</button>
                            </form>
                            <form action="{{ route('adminorder.update', $item->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="value" value="notpass">
                                    <button class="btn btn-outline-warning" type="submit">ไม่ผ่าน</button>
                            </form>
                            <form action="{{ route('adminorder.update', $item->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="value" value="cancel">
                                <button class="btn btn-outline-danger" type="submit">ยกเลิก</button>
                            </form>
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- ADD -->
          <!-- Footer -->
          <div class="card-footer">
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
              <div class="col-sm mb-2 mb-sm-0">
                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                </div>
              </div>
              <!-- End Col -->

              <div class="col-sm-auto">
                <div class="d-flex justify-content-center justify-content-sm-end">
                  <!-- Pagination -->
                  <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                  {{ $order->links() }}
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
          <!-- End Footer -->
        </div>
        <!-- End Card -->
      </div>
      <!-- End Content -->

      <!-- Footer -->



      <!-- End Footer -->
@endsection

