<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{asset('user_asset/assets/css/lg/font-awesome.min.css')}}" rel="stylesheet" >
    <link href="{{asset('user_asset/assets/css/lg/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('user_asset/assets/css/lg/bootstrap-theme.min.css')}}" rel="stylesheet" >
    <link href="{{asset('user_asset/assets/css/lg/bootstrap-social.css')}}" rel="stylesheet" >   
    <link href="{{asset('user_asset/assets/css/lg/templatemo_style.css')}}" rel="stylesheet" >   
    <link href="{{asset('user_asset/assets/css/lg/lg.css')}}" rel="stylesheet" > 
    <link rel="stylesheet" href="{{asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
</head>
<body class="templatemo-bg-image-1">
    <div class="container-fluid">
        <div class="col-md-12">         
            <form class="templatemo-login-form-2" role="form" action="{{ route('login') }}" method="post"> @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="templatemo-one-signin col-md-6">
                        <div class="form-group">
                          <div class="col-md-12">                   
                            <label for="email" class="control-label">Email</label>
                            <div class="templatemo-input-icon-container">
                                <i class="fa fa-user"></i>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            <label for="password" class="control-label">Password</label>
                            <div class="templatemo-input-icon-container">
                                <i class="fa fa-lock"></i>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
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
                            <input type="submit" value="LOG IN" class="btn btn-warning" > 
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                 @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-12"> 
                                <a href="{{'register'}}" class="text-center">Đăng ký</a>
                            </div>
                            </div>
                        </div>
                    </div>
                      
                </div>                  
              </form>                         
        </div>
    </div>
</body>
</html>
