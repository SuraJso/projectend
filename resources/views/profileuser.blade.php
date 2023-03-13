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
                <li aria-current="page" class="breadcrumb-item active">My account</li>
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
          <div class="col-lg-9">
            <div class="box">
              <h1>My account</h1>
              <h3>Change password</h3>
              {{-- <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password_old">Old password</label>
                      <input id="password_old" type="password" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password_1">New password</label>
                      <input id="password_1" type="password" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password_2">Retype new password</label>
                      <input id="password_2" type="password" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row-->
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                </div>
              </form> --}}
              <h3 class="mt-5">Personal details</h3>
              <form action="{{ route('profileuser.update',$user->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="firstname">Firstname</label>
                      <input id="firstname" name="name" type="text" class="form-control" value="{{ $user->name }}">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="lastname">Lastname</label>
                      <input id="lastname" name="surname" type="text" class="form-control" value="{{ $user->surname }}">
                      @error('surname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- /.row-->
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="place">Place</label>
                        <textarea id="place" type="text" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ $user->place }}" required autocomplete="place" autofocus>{{ $user->place }}</textarea>

                        @error('place')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="tel">Tel</label>
                      <input id="tel" name="tel" type="text" class="form-control" value="{{ $user->tel }}">
                      @error('tel')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                  </div>
                </div>
                <!-- /.row-->
                <div class="row">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
