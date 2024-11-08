<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Manajemen Gambar Mobil Pribadi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('style/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset ('style/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/225bc69ba1.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('style/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="/login" class="h1">
            <img src="{{ asset('style/dist/img/laravel_logo.jpg') }}" alt="Chis Logo" style="width: 300px; height: 200px;"/>
        </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login terlebih dahulu</p>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fa-solid fa-hand"></i>
                <div>
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="fa-solid fa-triangle-warning"></i>
                <div>
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif
        @if ($message = Session::get('success'))           
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="fa-solid fa-check"></i>
                <div>
                    <h4 class="alert-heading">Selamat!</h4>
                    <hr>
                    <p class="mb-0">{{$message}}</p>
                </div>
              </div>
        @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="inputEmail" class="form-control" placeholder="Email">     
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span><i class="fa-solid fa-bars"></i></span>
                              </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="inputPassword" class="form-control" placeholder="Password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mb-3">
                            ATAU
                            <br>
                            <a href="{{ route('register')}}" class="btn btn-block btn-danger">
                                <i class="fa-solid fa-address-card"></i> Registrasikan diri anda disini!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
