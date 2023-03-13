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
                <a class="nav-link active" href="#">All products</a>
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
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- End Table -->

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

      <div class="footer">
        <div class="row justify-content-between align-items-center">
          <div class="col">
            <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
          </div>
          <!-- End Col -->

          <div class="col-auto">
            <div class="d-flex justify-content-end">
              <!-- List Separator -->
              <ul class="list-inline list-separator">
                <li class="list-inline-item">
                  <a class="list-separator-link" href="#">FAQ</a>
                </li>

                <li class="list-inline-item">
                  <a class="list-separator-link" href="#">License</a>
                </li>

                <li class="list-inline-item">
                  <!-- Keyboard Shortcuts Toggle -->
                  <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts" aria-controls="offcanvasKeyboardShortcuts">
                    <i class="bi-command"></i>
                  </button>
                  <!-- End Keyboard Shortcuts Toggle -->
                </li>
              </ul>
              <!-- End List Separator -->
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>

      <!-- End Footer -->
@endsection

