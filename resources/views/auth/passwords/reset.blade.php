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
            <div class="col-md-offset-4 col-md-4" id="box"> 
               <h2>Đặt lại mật khẩu</h2> 
               <hr>

               <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <fieldset>
                  <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group"> 
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-addon input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                                <input type="email" placeholder="Nhập Email..." class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                            <input type="password" placeholder="Nhập Mật khẩu..." class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
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
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-addon input-group-text"><i class="fas fa-lock"></i></span>
                              </div>
                            <input type="password" placeholder="Xác nhận Mật khẩu..." class="form-control @error('password') is-invalid @enderror" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                           </div> 
                          </div> 
                         </div> 

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="margin-bottom: 10px;" type="submit" class="btn btn-primary">
                                    {{ __('Đặt lại mật khẩu') }}
                                </button>
                            </div>
                        </div>    
                </fieldset>
                        
               </form>
            </div> 
          
        </div>
    </div>
</body>
</html>

