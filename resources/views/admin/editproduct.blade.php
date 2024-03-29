@extends('layouts.admin.app')

@section('content')
<div class="content container-fluid" style="margin-top: -19rem;">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter">
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('admin.product') }}">Products</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
          </nav>

          <h1 class="page-header-title">Add Product</h1>

          {{-- <div class="mt-2">
            <a class="text-body me-3" href="javascript:;">
              <i class="bi-clipboard me-1"></i> Duplicate
            </a>
            <a class="text-body" href="javascript:;">
              <i class="bi-eye me-1"></i> Preview
            </a>
          </div> --}}
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <div class="row">
      <div class="col-lg-12 mb-3 mb-lg-0">
        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
          <!-- Header -->
          <div class="card-header">
            <h4 class="card-header-title">Product information</h4>
          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" id="image-upload-preview" action="{{ url('admin/insertproduct/update',$product->id) }}" >
                @csrf
            <!-- Form -->
            <div class="mb-4">
              <label for="productNameLabel" class="form-label">Name</label>
              {{-- <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Products are the goods or services you sell."></i> --}}
              <input type="text" class="form-control" name="name" id="name" placeholder="ชื่อ" aria-label="ชื่อ" value="{{ $product->name }}" required>
                    {{-- @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror --}}
            </div>
            <!-- End Form -->

            <div class="row">
              <div class="col-sm-6">
                <!-- Form -->
                <div class="mb-4">
                  <label for="SKULabel" class="form-label">Price</label>

                  <input type="text" class="form-control" name="price" id="price" placeholder="ราคา" aria-label="ราคา" value="{{ $product->price }}" required>
                @error('price') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <!-- End Form -->
              </div>
              <!-- End Col -->

              <div class="col-sm-6">
                <!-- Form -->
                <div class="mb-4">
                  <label for="weightLabel" class="form-label">ProductType</label>

                  <div class="input-group">
                    {{-- <input type="text" class="form-control" name="typeproduct" id="typeproduct" placeholder="ประเภทสินค้า" aria-label="ประเภทสินค้า"  value="{{ $product->typeproductid }}" required> --}}
                    <select class="form-control"  name="typeproduct" id="typeproduct">
                        @foreach ($typeproduct as $item)

                          <option @if ($product->typeproductid == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                  </div>

                </div>
                <!-- End Form -->
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
                    <img id="preview-image-before-upload" src="{{ url('public/product/img/'.$product->img) }}"
                        alt="preview image" style="max-height: 250px;">
                </div>
            </div>
            <!-- End Row -->

            <div class="row mb-4">
                <label class="form-label">Detail <span class="form-label-secondary">(รายละเอียดสินค้า)</span></label>
                <textarea id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" value="{{ $product->detail }}" required autocomplete="detail" autofocus>{{ $product->detail }}</textarea>
            </div>

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
          <!-- Body -->
        </div>
        <!-- End Card -->

        <!-- Card -->
        {{-- <div class="card mb-3 mb-lg-5">
          <!-- Header -->
          <div class="card-header card-header-content-between">
            <h4 class="card-header-title">Media</h4>

            <!-- Dropdown -->
            <div class="dropdown">
              <a class="btn btn-ghost-secondary btn-sm" href="#!" id="mediaDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Add media from URL <i class="bi-chevron-down"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-end mt-1">
                <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addImageFromURLModal">
                  <i class="bi-link dropdown-item-icon"></i> Add image from URL
                </a>
                <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#embedVideoModal">
                  <i class="bi-youtube dropdown-item-icon"></i> Embed video
                </a>
              </div>
            </div>
            <!-- End Dropdown -->
          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <!-- Dropzone -->
            <div id="attachFilesNewProjectLabel" class="js-dropzone dz-dropzone dz-dropzone-card">
              <div class="dz-message">
                <img class="avatar avatar-xl avatar-4x3 mb-3" src="./assets/svg/illustrations/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="default">
                <img class="avatar avatar-xl avatar-4x3 mb-3" src="./assets/svg/illustrations-light/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="dark">

                <h5>Drag and drop your file here</h5>

                <p class="mb-2">or</p>

                <span class="btn btn-white btn-sm">Browse files</span>
              </div>
            </div>
            <!-- End Dropzone -->
          </div>
          <!-- Body -->
        </div> --}}
        <!-- End Card -->

        <!-- Card -->
        {{-- <div class="card">
          <!-- Header -->
          <div class="card-header">
            <h4 class="card-header-title">Variants</h4>
          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <h6 class="text-cap">Options</h6>

            <div class="js-add-field" data-hs-add-field-options='{
                  "template": "#addAnotherOptionFieldTemplate",
                  "container": "#addAnotherOptionFieldContainer",
                  "defaultCreated": 0
                }'>
              <div class="row mb-4">
                <div class="col-sm-4 mb-2 mb-sm-0">
                  <!-- Select -->
                  <div class="tom-select-custom">
                    <select class="js-select form-select" data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true
                            }'>
                      <option value="Size">Size</option>
                      <option value="Color">Color</option>
                      <option value="Material">Material</option>
                      <option value="Style">Style</option>
                      <option value="Title">Title</option>
                    </select>
                  </div>
                  <!-- End Select -->
                </div>
                <!-- End Col -->

                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Enter tags" aria-label="Enter tags">
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->

              <!-- Container For Input Field -->
              <div id="addAnotherOptionFieldContainer"></div>

              <a href="javascript:;" class="js-create-field form-link">
                <i class="bi-plus"></i> Add another option
              </a>
            </div>

            <!-- Add Another Option Input Field -->
            <div id="addAnotherOptionFieldTemplate" style="display: none;">
              <div class="row mb-4">
                <div class="col-sm-4 mb-2 mb-sm-0">
                  <!-- Select -->
                  <div class="tom-select-custom">
                    <select class="js-select-dynamic form-select" data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true
                            }'>
                      <option value="Size">Size</option>
                      <option value="Color">Color</option>
                      <option value="Material">Material</option>
                      <option value="Style">Style</option>
                      <option value="Title">Title</option>
                    </select>
                  </div>
                  <!-- End Select -->
                </div>
                <!-- End Col -->

                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Enter tags" aria-label="Enter tags">
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
            <!-- End Add Another Option Input Field -->
          </div>
          <!-- Body -->
        </div> --}}
        <!-- End Card -->
      </div>
      <!-- End Col -->

      {{-- <div class="col-lg-4">
        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
          <!-- Header -->
          <div class="card-header">
            <h4 class="card-header-title">Pricing</h4>
          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <!-- Form -->
            <div class="mb-4">
              <label for="priceNameLabel" class="form-label">Price</label>

              <div class="input-group">
                <input type="text" class="form-control" name="priceName" id="priceNameLabel" placeholder="0.00" aria-label="0.00">

                <div class="input-group-append">
                  <!-- Select -->
                  <div class="tom-select-custom">
                    <select class="js-select form-select" data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true,
                              "dropdownWidth": "7rem",
                              "dropdownWrapperClass": "tom-select-custom tom-select-custom-end"
                            }'>
                      <option value="USD" selected>USD</option>
                      <option value="AED">AED</option>
                      <option value="AFN">AFN</option>
                      <option value="ALL">ALL</option>
                      <option value="AMD">AMD</option>
                      <option value="ANG">ANG</option>
                      <option value="AOA">AOA</option>
                      <option value="ARS">ARS</option>
                      <option value="AUD">AUD</option>
                      <option value="AWG">AWG</option>
                      <option value="AZN">AZN</option>
                      <option value="BAM">BAM</option>
                      <option value="BBD">BBD</option>
                      <option value="BDT">BDT</option>
                      <option value="BGN">BGN</option>
                      <option value="BIF">BIF</option>
                      <option value="BMD">BMD</option>
                      <option value="BND">BND</option>
                      <option value="BOB">BOB</option>
                      <option value="BRL">BRL</option>
                      <option value="BSD">BSD</option>
                      <option value="BWP">BWP</option>
                      <option value="BZD">BZD</option>
                      <option value="CAD">CAD</option>
                      <option value="CDF">CDF</option>
                      <option value="CHF">CHF</option>
                      <option value="CLP">CLP</option>
                      <option value="CNY">CNY</option>
                      <option value="COP">COP</option>
                      <option value="CRC">CRC</option>
                      <option value="CVE">CVE</option>
                      <option value="CZK">CZK</option>
                      <option value="DJF">DJF</option>
                      <option value="DKK">DKK</option>
                      <option value="DOP">DOP</option>
                      <option value="DZD">DZD</option>
                      <option value="EGP">EGP</option>
                      <option value="ETB">ETB</option>
                      <option value="EUR">EUR</option>
                      <option value="FJD">FJD</option>
                      <option value="FKP">FKP</option>
                      <option value="GBP">GBP</option>
                      <option value="GEL">GEL</option>
                      <option value="GIP">GIP</option>
                      <option value="GMD">GMD</option>
                      <option value="GNF">GNF</option>
                      <option value="GTQ">GTQ</option>
                      <option value="GYD">GYD</option>
                      <option value="HKD">HKD</option>
                      <option value="HNL">HNL</option>
                      <option value="HRK">HRK</option>
                      <option value="HTG">HTG</option>
                      <option value="HUF">HUF</option>
                      <option value="IDR">IDR</option>
                      <option value="ILS">ILS</option>
                      <option value="INR">INR</option>
                      <option value="ISK">ISK</option>
                      <option value="JMD">JMD</option>
                      <option value="JPY">JPY</option>
                      <option value="KES">KES</option>
                      <option value="KGS">KGS</option>
                      <option value="KHR">KHR</option>
                      <option value="KMF">KMF</option>
                      <option value="KRW">KRW</option>
                      <option value="KYD">KYD</option>
                      <option value="KZT">KZT</option>
                      <option value="LAK">LAK</option>
                      <option value="LBP">LBP</option>
                      <option value="LKR">LKR</option>
                      <option value="LRD">LRD</option>
                      <option value="LSL">LSL</option>
                      <option value="MAD">MAD</option>
                      <option value="MDL">MDL</option>
                      <option value="MGA">MGA</option>
                      <option value="MKD">MKD</option>
                      <option value="MMK">MMK</option>
                      <option value="MNT">MNT</option>
                      <option value="MOP">MOP</option>
                      <option value="MRO">MRO</option>
                      <option value="MUR">MUR</option>
                      <option value="MVR">MVR</option>
                      <option value="MWK">MWK</option>
                      <option value="MXN">MXN</option>
                      <option value="MYR">MYR</option>
                      <option value="MZN">MZN</option>
                      <option value="NAD">NAD</option>
                      <option value="NGN">NGN</option>
                      <option value="NIO">NIO</option>
                      <option value="NOK">NOK</option>
                      <option value="NPR">NPR</option>
                      <option value="NZD">NZD</option>
                      <option value="PAB">PAB</option>
                      <option value="PEN">PEN</option>
                      <option value="PGK">PGK</option>
                      <option value="PHP">PHP</option>
                      <option value="PKR">PKR</option>
                      <option value="PLN">PLN</option>
                      <option value="PYG">PYG</option>
                      <option value="QAR">QAR</option>
                      <option value="RON">RON</option>
                      <option value="RSD">RSD</option>
                      <option value="RUB">RUB</option>
                      <option value="RWF">RWF</option>
                      <option value="SAR">SAR</option>
                      <option value="SBD">SBD</option>
                      <option value="SCR">SCR</option>
                      <option value="SEK">SEK</option>
                      <option value="SGD">SGD</option>
                      <option value="SHP">SHP</option>
                      <option value="SLL">SLL</option>
                      <option value="SOS">SOS</option>
                      <option value="SRD">SRD</option>
                      <option value="STD">STD</option>
                      <option value="SZL">SZL</option>
                      <option value="THB">THB</option>
                      <option value="TJS">TJS</option>
                      <option value="TOP">TOP</option>
                      <option value="TRY">TRY</option>
                      <option value="TTD">TTD</option>
                      <option value="TWD">TWD</option>
                      <option value="TZS">TZS</option>
                      <option value="UAH">UAH</option>
                      <option value="UGX">UGX</option>
                      <option value="UYU">UYU</option>
                      <option value="UZS">UZS</option>
                      <option value="VND">VND</option>
                      <option value="VUV">VUV</option>
                      <option value="WST">WST</option>
                      <option value="XAF">XAF</option>
                      <option value="XCD">XCD</option>
                      <option value="XOF">XOF</option>
                      <option value="XPF">XPF</option>
                      <option value="YER">YER</option>
                      <option value="ZAR">ZAR</option>
                      <option value="ZMW">ZMW</option>
                    </select>
                  </div>
                  <!-- End Select -->
                </div>
              </div>
            </div>
            <!-- End Form -->

            <div class="mb-2">
              <a class="d-inline-block" href="javascript:;" data-bs-toggle="modal" data-bs-target="#productsAdvancedFeaturesModal">
                <i class="bi-star-fill fs-4 text-warning me-1"></i> Set "Compare to" price
              </a>
            </div>

            <a class="d-inline-block" href="javascript:;" data-bs-toggle="modal" data-bs-target="#productsAdvancedFeaturesModal">
              <i class="bi-star-fill fs-4 text-warning me-1"></i> Bulk discount pricing
            </a>

            <hr class="my-4">

            <!-- Form Switch -->
            <label class="row form-check form-switch" for="availabilitySwitch1">
              <span class="col-8 col-sm-9 ms-0">
                <span class="text-dark">Availability <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Product availability switch toggler."></i></span>
              </span>
              <span class="col-4 col-sm-3 text-end">
                <input type="checkbox" class="form-check-input" id="availabilitySwitch1">
              </span>
            </label>
            <!-- End Form Switch -->
          </div>
          <!-- Body -->
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card">
          <!-- Header -->
          <div class="card-header">
            <h4 class="card-header-title">Organization</h4>
          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <!-- Form -->
            <div class="mb-4">
              <label for="vendorLabel" class="form-label">Vendor</label>

              <input type="text" class="form-control" name="vendor" id="vendorLabel" placeholder="eg. Nike" aria-label="eg. Nike">
            </div>
            <!-- End Form -->

            <!-- Form -->
            <div class="mb-4">
              <label for="categoryLabel" class="form-label">Category</label>

              <!-- Select -->
              <div class="tom-select-custom">
                <select class="js-select form-select" autocomplete="off" id="categoryLabel" data-hs-tom-select-options='{
                          "searchInDropdown": false,
                          "hideSearch": true,
                          "placeholder": "Select category"
                        }'>
                  <option value="Clothing">Clothing</option>
                  <option value="Shoes">Shoes</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Others">Others</option>
                </select>
              </div>
              <!-- End Select -->
            </div>
            <!-- Form -->

            <!-- Form -->
            <div class="mb-4">
              <label for="collectionsLabel" class="form-label">Collections</label>

              <!-- Select -->
              <div class="tom-select-custom">
                <select class="js-select form-select" autocomplete="off" id="collectionsLabel" data-hs-tom-select-options='{
                          "searchInDropdown": false,
                          "hideSearch": true,
                          "placeholder": "Select collections"
                        }'>
                  <option value="Winter">Winter</option>
                  <option value="Spring">Spring</option>
                  <option value="Summer">Summer</option>
                  <option value="Autumn">Autumn</option>
                </select>
              </div>
              <!-- End Select -->

              <span class="form-text">Add this product to a collection so it’s easy to find in your store.</span>
            </div>
            <!-- Form -->

            <label for="tagsLabel" class="form-label">Tags</label>

            <input type="text" class="form-control" id="tagsLabel" placeholder="Enter tags here" aria-label="Enter tags here">
          </div>
          <!-- Body -->
        </div>
        <!-- End Card -->
      </div> --}}
      <!-- End Col -->
    </div>
    <!-- End Row -->

    {{-- <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
      <!-- Card -->
      <div class="card card-sm bg-dark border-dark mx-2">
        <div class="card-body">
          <div class="row justify-content-center justify-content-sm-between">
            <div class="col">
              {{-- <button type="button" class="btn btn-ghost-danger">Delete</button>
            </div>
            <!-- End Col -->

            <div class="col-auto">
              <div class="d-flex gap-3">
                {{-- <button type="button" class="btn btn-ghost-light">Discard</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
      <!-- End Card -->
    </div> --}}
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
