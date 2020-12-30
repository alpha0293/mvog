<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_asset/dist/css/adminlte.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Đăng Ký</b> thành viên mới</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Đăng ký một thành viên mới</p>

      <form class="needs-validation" action="{{ route('register') }}" method="post" >
        @csrf
        <div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Tên thánh và họ tên" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
            @error('name')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email" required>
         
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div> 
         
            @error('email')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
      
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" name="password" required autocomplete="new-password">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          
            @error('password')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
        <div class="input-group mb-3">
          <input d="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               Xin chịu trách nhiệm <a href="#">với các thông tin</a>
              </label>
            </div>
            <div class="invalid-feedback">
             Chưa đồng ý
          </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <br/>
      <a href="{{'login'}}" class="text-center">Tôi đã có tài khoản</a>
      <a style="float: right;" href="{{url('user')}}" class="text-center">Trở về TRANG CHỦ</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!--  js -->
<script type="text/javascript">
  $(document).ready(
    function () {

        //Chọn các phần tử button và gán sự kiện click cho nó
        $("button").click(function () {

            //Chọn các phần tử p và thi hành ẩn các phần tử đó
            $('.alert').alert();

        });
    }
);
  
</script>
</body>
</html>
