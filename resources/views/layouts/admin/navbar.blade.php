<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->


        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->

        <!-- Content -->
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
            <!-- Collapse -->
            <div class="nav-item">
                <a class="nav-link {{ Request::is('admin.home') ? 'active' : '' }}  " href="{{ route('admin.home') }}"  data-placement="left">
                  <i class="bi-house-door nav-icon"></i>
                  <span class="nav-link-title">Dashboards</span>
                </a>
            </div>
            <!-- End Collapse -->

            <span class="dropdown-header mt-4">Pages</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu">

              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle" href="#navbarVerticalMenuPagesEcommerceMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceMenu" aria-expanded="true" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                  <i class="bi-basket nav-icon"></i>
                  <span class="nav-link-title">E-commerce</span>
                </a>

                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu">
                  {{-- <a class="nav-link" href="./ecommerce.html">Overview</a> --}}

                  <div id="navbarVerticalMenuPagesMenuEcommerce">
                    <!-- Collapse -->
                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarVerticalMenuPagesEcommerceProductsMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceProductsMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesEcommerceProductsMenu">
                        Products
                      </a>

                      <div id="navbarVerticalMenuPagesEcommerceProductsMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenuEcommerce">
                        <a class="nav-link {{ Request::is('admin.product') ? 'active' : '' }}  " href="{{ route('admin.product') }}">Products</a>
                        {{-- <a class="nav-link " href="./ecommerce-product-details.html">Product Details</a> --}}
                        <a class="nav-link {{ Request::is('admin.insertproduct') ? 'active' : '' }}  " href="{{ route('admin.insertproduct') }}">Add Product</a>
                      </div>
                    </div>
                    <!-- End Collapse -->


                    <!-- Collapse -->
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#navbarVerticalMenuPagesEcommerceTypeProductMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceTypeProductMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesEcommerceProductTypeMenu">
                          Typeproduct
                        </a>

                        <div id="navbarVerticalMenuPagesEcommerceTypeProductMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesEcommerceTypeProductMenu">
                          <a class="nav-link {{ Request::is('admin.typeproduct') ? 'active' : '' }}  " href="{{ route('admin.typeproduct') }}">Typeproduct</a>
                          {{-- <a class="nav-link " href="./ecommerce-product-details.html">Product Details</a> --}}
                          <a class="nav-link {{ Request::is('admin.inserttypeproduct') ? 'active' : '' }}  " href="{{ route('admin.inserttypeproduct') }}">Add Typeproduct</a>
                        </div>
                    </div>
                    <!-- End Collapse -->
                    <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link {{ Request::is('adminimport.index') ? 'active' : '' }}  " href="{{ route('adminimport.index') }}">Import</a>
                        </div>
                    <!-- End Collapse -->
                    <div class="nav-item">
                        <a class="nav-link {{ Request::is('adminuser.index') ? 'active' : '' }}  " href="{{ route('adminuser.index') }}">User</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link {{ Request::is('adminstock.index') ? 'active' : '' }}  " href="{{ route('adminstock.index') }}">Requisition </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link {{ Request::is('adminorder.index') ? 'active' : '' }}  " href="{{ route('adminorder.index') }}">Checkorder</a>
                    </div>
                  </div>

                </div>
              </div>


          </div>

        </div>
        <!-- End Content -->

        <!-- Footer -->
        <div class="navbar-vertical-footer">
          <ul class="navbar-vertical-footer-list">
            <li class="navbar-vertical-footer-list-item">
              <!-- Style Switcher -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                </button>

                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                  <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                    <i class="bi-moon-stars me-2"></i>
                    <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                  </a>
                  <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                    <i class="bi-brightness-high me-2"></i>
                    <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                  </a>
                  <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                    <i class="bi-moon me-2"></i>
                    <span class="text-truncate" title="Dark">Dark</span>
                  </a>
                </div>
              </div>

              <!-- End Style Switcher -->
            </li>

          </ul>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>
