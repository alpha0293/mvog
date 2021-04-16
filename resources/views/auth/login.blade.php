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
<style type="text/css">
  @media only screen and (max-width: 750px) {
    .mobile1 {
      width: 100%;
      margin: 0 auto !important;
    }
    
  }
</style>
<body class="bg-image-1" style="background-image: url('{{ asset('user_asset/images/vanhanh.jpg')}}');">
    <div class="container-fluid">
        <div class="col-md-12" >
            <div class="col-md-4 mobile1" id="box"> 
               <h2>Đăng nhập</h2> 
               <hr> 
               <form class="form-horizontal" id="login_form" role="form" action="{{ route('login') }}" method="post"> @csrf
                <fieldset> 
                 <div class="form-group"> 

                  <div class="col-md-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-addon input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                        <input type="email" placeholder="Nhập Email..." class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div> 
                 </div> 
                 <div class="form-group"> 
                  <div class="col-md-12"> 
                   <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-addon input-group-text"><i class="fas fa-lock"></i></span>
                      </div>
                    <input type="password" placeholder="Nhập Password..." class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   </div> 
                  </div> 
                 </div> 
                 <div class="form-group">
                          <div class="col-md-12">
                       <!--     <div class="checkbox">
                                <label>
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ
                                </label>
                            </div>-->
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                          </div>
                        </div>
                 <div class="form-group"> 
                  <div class="col-md-12"> 
                   <input type="submit" value="Đăng nhập" class="btn btn-md btn-danger pull-right" > 
                  </div> 
                 </div> 
                 <div class="form-group">
                            <div class="col-md-12">
                                 @if (Route::has('password.request'))
                                    <a style="color: color: #ffffffc4;" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-12"> 
                                <a style="color: #ffffffc4;" href="{{'register'}}" class="text-center">Đăng ký</a>
                            </div>
                            </div>
                        </div>
                </fieldset> 
               </form> 
              </div> 
          
        </div>
    </div>
</body>
</html>
