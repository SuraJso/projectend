    <!-- navbar-->
    <header class="header mb-5">
        <!--
        *** TOPBAR ***
        _________________________________________________________
        -->
        <div id="top">
          <div class="container">
            <div class="row">
              {{-- <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div> --}}
              <div class="col-lg-12 text-center text-lg-right">
                <ul class="menu list-inline mb-0">
                @guest
                <li class="nav-item">
                    @if (Route::has('login'))
                    <li class="list-inline-item"><a class="nav-link-inline" href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                    @endif
                    @if (Route::has('register'))
                    <li class="list-inline-item"><a class="nav-link-inline" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    </li>
                @else
                <li class="nav-item">
                    <li class="list-inline-item"><a href="#">{{ Auth::user()->name }}</a></li>
                    <li class="list-inline-item"><a href="{{ route('logout')}}"
                     onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endif

                </ul>
              </div>
            </div>
          </div>
          <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Login</h5>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <p class="text-center">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>
                  </form>
                  <p class="text-center text-muted"><a href="{{ route('reset') }}"><strong>Reset password</strong></a></p>
                </div>
              </div>
            </div>
          </div>
          <!-- *** TOP BAR END ***-->


        </div>

        <nav class="navbar navbar-expand-lg">
          <div class="container"><a href="{{ route('home1') }}" class="navbar-brand home"><img src="img/logo.png" width="100px;" height="90px;" alt="logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ route('home1') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item"><a href="{{ route('category') }}" class="nav-link {{ Request::is('category') ? 'active' : '' }}">Category</a></li>
                {{-- <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Men<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <h5>Clothing</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Shoes</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Accessories</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Featured</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          </ul>
                          <h5>Looks and trends</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Ladies<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <h5>Clothing</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Shoes</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Accessories</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                          <h5>Looks and trends</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="banner"><a href="#"><img src="img/banner.jpg" alt="" class="img img-fluid"></a></div>
                          <div class="banner"><a href="#"><img src="img/banner2.jpg" alt="" class="img img-fluid"></a></div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Template<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <h5>Shop</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="index.html" class="nav-link">Homepage</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Category - sidebar left</a></li>
                            <li class="nav-item"><a href="category-right.html" class="nav-link">Category - sidebar right</a></li>
                            <li class="nav-item"><a href="category-full.html" class="nav-link">Category - full width</a></li>
                            <li class="nav-item"><a href="detail.html" class="nav-link">Product detail</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>User</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="register.html" class="nav-link">Register / login</a></li>
                            <li class="nav-item"><a href="customer-orders.html" class="nav-link">Orders history</a></li>
                            <li class="nav-item"><a href="customer-order.html" class="nav-link">Order history detail</a></li>
                            <li class="nav-item"><a href="customer-wishlist.html" class="nav-link">Wishlist</a></li>
                            <li class="nav-item"><a href="customer-account.html" class="nav-link">Customer account / change password</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Order process</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="basket.html" class="nav-link">Shopping cart</a></li>
                            <li class="nav-item"><a href="checkout1.html" class="nav-link">Checkout - step 1</a></li>
                            <li class="nav-item"><a href="checkout2.html" class="nav-link">Checkout - step 2</a></li>
                            <li class="nav-item"><a href="checkout3.html" class="nav-link">Checkout - step 3</a></li>
                            <li class="nav-item"><a href="checkout4.html" class="nav-link">Checkout - step 4</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Pages and blog</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="blog.html" class="nav-link">Blog listing</a></li>
                            <li class="nav-item"><a href="post.html" class="nav-link">Blog Post</a></li>
                            <li class="nav-item"><a href="faq.html" class="nav-link">FAQ</a></li>
                            <li class="nav-item"><a href="text.html" class="nav-link">Text page</a></li>
                            <li class="nav-item"><a href="text-right.html" class="nav-link">Text page - right sidebar</a></li>
                            <li class="nav-item"><a href="404.html" class="nav-link">404 page</a></li>
                            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li> --}}

                @guest
                @else
                <li class="nav-item"><a href="{{ route('profileuser.index') }}" class="nav-link {{ Request::is('profileuser.index') ? 'active' : '' }}">Profile</a></li>
                @endif
              </ul>
              <div class="navbar-buttons d-flex justify-content-end">
                <!-- /.nav-collapse-->
                {{-- <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a> --}}
                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="{{ route('cart') }}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>Cart</span></a></div>
              </div>
            </div>
          </div>
        </nav>
        <div id="search" class="collapse">
          <div class="container">
            <form role="search" class="ml-auto">
              <div class="input-group">
                <input type="text" placeholder="Search" class="form-control">
                <div class="input-group-append">
                  <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </header>
