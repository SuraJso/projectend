@extends('layouts.admin.app')

@section('content')
<div class="content container" style="margin-top: -19rem;">
    <!-- Card -->
    {{-- <div class="card card-centered mb-3 mb-lg-5">
      <div class="card-body py-10 my-lg-10">
        <img class="img-fluid mb-5" src="../assets/svg/layouts/content-combinations-container-overlay.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
        <img class="img-fluid shadow-sm mb-5" src="../assets/svg/layouts-light/content-combinations-container-overlay.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">

        <h1>Overlay Container - Content Combinations</h1>
        <p>Customize your overview page layout. Choose the one that best fits your needs.</p>
        <a class="btn btn-primary" href="../layouts/index.html">Go back to Layouts</a>
        @yield('content')
      </div>
    </div> --}}
    <!-- End Card -->

    <!-- Card -->
    {{-- <div class="card card-centered">
      <div class="card-body py-10">
        <img class="avatar avatar-xxl mb-3" src="../assets/svg/illustrations/oc-megaphone.svg" alt="Image Description" data-hs-theme-appearance="default">
        <img class="avatar avatar-xxl mb-3" src="../assets/svg/illustrations-light/oc-megaphone.svg" alt="Image Description" data-hs-theme-appearance="dark">
        <p class="card-text">No data to show</p>
        <a class="btn btn-white btn-sm" href="../index.html">Get Started</a>
      </div>
    </div> --}}
    <!-- End Card -->
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    Admin
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Card -->
    <div class="card card-centered">
        <div class="card-body py-10">
          {{-- <img class="avatar avatar-xxl mb-3" src="../assets/svg/illustrations/oc-megaphone.svg" alt="Image Description" data-hs-theme-appearance="default">
          <img class="avatar avatar-xxl mb-3" src="../assets/svg/illustrations-light/oc-megaphone.svg" alt="Image Description" data-hs-theme-appearance="dark"> --}}
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
        @endif
            {{ __('You are logged in!') }}
            Admin
        </div>
    </div>
    <!-- End Card -->
</div>
  <!-- End Content -->
@endsection
