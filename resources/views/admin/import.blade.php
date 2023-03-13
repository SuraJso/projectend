@extends('layouts.admin.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
              <h1 class="page-header-title">Products <span class="badge bg-soft-dark text-dark ms-2">{{ $count }}</span></h1>
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
              <a class="btn btn-primary" href="{{ route('admin.insertproduct') }}">Add product</a>
            </div>
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
                  <th class="table-column-ps-0">Product</th>
                  <th>Detail</th>
                  <th>Typeproduct</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($products as $key=>$product)
                  <td class="table-column-pe-0">
                        {{ ++$key }}
                  </td>
                  <td class="table-column-ps-0">
                    {{-- <a class="d-flex align-items-center" href="./ecommerce-product-details.html"> --}}
                      <div class="flex-shrink-0">
                        <img class="avatar avatar-lg" src="{{ url('public/product/img/'.$product->img) }}" alt="Image Description">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h5 class="text-inherit mb-0">{{ $product->name }}</h5>
                      </div>
                    {{-- </a> --}}
                  </td>
                  <td>{{ $product->detail }}</td>
                  <td>{{ $product->typeproduct->name }}</td>
                  <td>{{ $product->price }} บาท</td>
                  <td>
                    <div class="btn-group" role="group">
                      <a class="btn btn-white btn-sm confirmdelete" href="{{ route('admin.insertproduct.edit',$product->id) }}">
                        <i class="bi-pencil-fill me-1"></i> Edit
                      </a>
                      <a  class="btn btn-white btn-sm" href="{{ route('admin.insertproduct.delete',$product->id) }}">
                        <i class="bi-trash dropdown-item-icon"></i> Delete
                      </a>
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
                  {{ $products->links() }}
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

