<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
       <link rel="stylesheet" href="{{asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="{{asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('admin_asset/dist/css/adminlte.min.css')}}">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  
      <link href="{{asset('user_asset/assets/css/lg.css')}}" rel="stylesheet" > 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!--   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">

    
</head>
<body class="bg-image-1" style="background-image: url('{{ asset('user_asset/images/vanhanh.jpg')}}');">
    <div class="container-fluid">
        <div class="col-md-12" >
            <p style="color: azure;top: 80px;margin-left: 40px;" class="col-md-offset-4 col-md-4"> <b>Xin chào: </b>{{ Auth::user()->name }} | 
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b> Đăng xuất</b> 
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </p>
                

            <div class="col-md-offset-4 col-md-4" id="box"> 
               <h2>Xác nhận Email</h2> 
               <hr>

               @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                        </div>
               @endif
               <p style="font-size: x-large; color: cyan;">Trước khi tiếp tục, vui lòng kiểm tra email của bạn để nhận liên kết xác minh tài khoản!</p>
               <span style="color: azure; font-size: large;">Nếu bạn không nhận được email, </span>
               <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button style="margin-bottom: 10px;" type="submit" class="btn btn-md btn-danger pull-right" >{{ __('Bấm vào đây để gửi yêu cầu khác') }}</button>.
               </form> 
              </div> 
          
        </div>
    </div>
</body>
</html>

