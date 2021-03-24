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
    <style type="text/css">
      .invalid-feedback{
        color: #fd1414;
        text-align: center;
        font-weight: bold;
      }
    </style>
    
</head>
<body class="bg-image-1" style="background-image: url('{{ asset('user_asset/images/vanhanh.jpg')}}');">
    <div class="container-fluid">
        <div class="col-md-12" >
            <p style="color: azure;top: 80px;margin-left: 40px;" class="col-md-offset-4 col-md-4"> <b>Xin chào: </b>{{ Auth::user()->name }} | 
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b> Đăng xuất</b> 
                </a>
                <br>
                 <a href="{{ route('home') }}"> <span class="fas fa-home"></span> Về trang chủ</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>

            </p>
            
            <div class="col-md-offset-4 col-md-4" id="box"> 
               <h2>Đổi mật khẩu</h2> 
               <hr>

               @if (\Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {!! \Session::get('message') !!}
                        </div>
               @endif
               <form method="POST" action="{{ route('change.password') }}">
                        @csrf
                         <div class="form-group row"> 
                          <div class="col-md-12">
                            <div class="input-group">
                              <label style="color: #ececec;" for="current_password" class="col-md-4 col-form-label text-md-right">Mật khẩu cũ</label>
                                <input class="form-control col-md-6 @error('current_password') is-invalid @enderror" id="current_password" name ="current_password" type="password" required autofocus> 
                            
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('current_password') }}
                                    </span>
                                @enderror
                            </div>
                          </div> 
                         </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <div class="input-group">
                              <label style="color: #ececec;" for="new_password" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>
                                <input class="form-control col-md-6  @error('new_password') is-invalid @enderror" id="new_password" name ="new_password" type="password" required autofocus> 
                            
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('new_password') }}
                                    </span>
                                @enderror
                            </div>
                          </div> 
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <div class="input-group">
                              <label style="color: #ececec;" for="re_new_password" class="col-md-4 col-form-label text-md-right">Xác nhận Mật khẩu</label>
                                <input class="form-control col-md-6  @error('re_new_password') is-invalid @enderror" id="re_new_password" name ="re_new_password" type="password" required autofocus> 
                            
                                @error('re_new_password')
                                    <span  class="invalid-feedback" role="alert">
                                        {{ $errors->first('re_new_password') }}
                                    </span>
                                @enderror
                            </div>
                          </div> 
                        </div>
                        <div class="form-group row mb-0">
                            <div style="margin-bottom: 10px;" class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </div>
                    </form> 
              </div> 
          
        </div>
    </div>
</body>
</html>

