@extends('layouts.admin.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
              <h1 class="page-header-title">Import <span class="badge bg-soft-dark text-dark ms-2"></span></h1>
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
                <a class="nav-link active" id="nav-one-eg2-tab" href="#nav-one-eg2" data-bs-toggle="pill" data-bs-target="#nav-one-eg2" role="tab" aria-controls="nav-one-eg2" aria-selected="true" href="#">All Imports</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav-two-eg2-tab" href="#nav-two-eg2" data-bs-toggle="pill" data-bs-target="#nav-two-eg2" role="tab" aria-controls="nav-two-eg2" aria-selected="false">
                  <div class="d-flex align-items-center">
                    Add Import
                  </div>
                </a>
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
        <div class="tab-content">
            <div class="tab-pane fade show active" id="nav-one-eg2" role="tabpanel" aria-labelledby="nav-one-eg2-tab">
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
                        <th class="table-column-ps-0">Name</th>
                        <th>Shopname</th>
                        <th>Detail</th>
                        <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($import as $key=>$item)
                        <td class="table-column-pe-0">
                                {{ ++$key }}
                        </td>
                        <td class="table-column-ps-0">
                            <div class="flex-shrink-0">
                                <img height="300" width="300" src="{{ url('public/import/img/'.$item->img) }}" alt="">
                              </div>
                        </td>
                        <td>{{ $item->shopname }}</td>
                        <td>{{ $item->detail }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
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
                        {{ $import->links() }}
                        </div>
                    </div>
                    <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Footer -->
                </div>
            </div>
            <div class="tab-pane fade" id="nav-two-eg2" role="tabpanel" aria-labelledby="nav-two-eg2-tab">
                <form method="POST" enctype="multipart/form-data" id="image-upload-preview" action="{{ route('adminimport.store') }}" >
                    @csrf
                <!-- Form -->
                <div class="mb-4">
                  <label for="productNameLabel" class="form-label">Shopname</label>

                  <input type="text" class="form-control" name="shopname" id="shopname" placeholder="ชื่อร้านค้า" aria-label="ชื่อร้านค้า" required>

                </div>
                <!-- End Form -->

                <div class="row">
                  <!-- End Col -->

                  <div class="mb-4">
                    <label class="form-label">Detail <span class="form-label-secondary">(รายละเอียดใบสั่งซื้อ)</span></label>
                    <textarea id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" value="{{ old('detail') }}" required autocomplete="detail" autofocus></textarea>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Row -->

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
                </form>
            </div>
        </div>
        <!-- End Card -->
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
