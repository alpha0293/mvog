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
      <link href="{{asset('admin_asset/dist/css/jquery-ui.css')}}" rel="stylesheet">
      <link href="{{asset('user_asset/assets/css/lg.css')}}" rel="stylesheet" > 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   <!--  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
    <script src="{{asset('admin_asset/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
      $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
      } );
    </script>
    
</head>
<body class="bg-image-1" style="background-image: url('{{ asset('user_asset/images/vanhanh.jpg')}}');">
   <div class="container-fluid">
    <div class="col-md-12" >
      <div class="col-md-offset-8 col-md-8" id="box">
       
         <h2>Đăng Ký thành viên</h2> 
        <hr>                
         <form class="needs-validation form-horizontal" action="{{url('dutu/store')}}" method="post" >
        @csrf
        <div class="row">
          <div class="col-md-offset-4 col-md-4" >
            <div class="input-group mb-3">
      <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input id="holyname" type="text" class="form-control @error('holyname') is-invalid @enderror" name="holyname" required value=""  autocomplete="name" placeholder="Tên Thánh" autofocus>
          
          
          
            @error('holyname')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
    
    <div class="input-group mb-3">
      <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$name}}" required autocomplete="name" placeholder="Họ tên" autofocus>
          
          
          
            @error('name')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
    
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div> 
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$email}}" autocomplete="email" placeholder="Email" required>
         
          
         
            @error('email')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
        <span>Ngày sinh:</span>
        <div class="input-group mb-3">
          <input id="datepicker" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="birthday" required>

            @error('dob')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
          
         
        </div>

        <div class="input-group mb-3">
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-graduation-cap"></span>
            </div>
          </div>
          <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="" placeholder="Trường học" required autocomplete="scholl" autofocus>
          
          
          
            @error('school')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
    
    
    <div class="input-group mb-3">
      <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input id="majors" type="text" class="form-control @error('majors') is-invalid @enderror" name="majors" value="" autocomplete="name" placeholder="Chuyên Ngành" autofocus>
          
          
          
            @error('majors')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
          </div>
          <!-- het ben trai -->
        <div class="col-md-offset-4 col-md-4" >
           <div class="input-group mb-3">
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-church"></span>
            </div>
          </div>
          <input id="parish" type="text" class="form-control @error('parish') is-invalid @enderror" name="parish" value="" required placeholder="Giáo xứ" autocomplete="parish" autofocus>
          
          
          
            @error('parish')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>

        <div class="input-group mb-3">
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-calendar-plus"></span>
            </div>
          </div>
          <select id="year" type="text" class="form-control custom-select browser-default @error('year') is-invalid @enderror" name="idyear" value="" autocomplete="year" autofocus   style="width: 100%;" required>
                    <option value="">Chọn năm</option>
                    @foreach($year as $y)
                      <option value="{{$y->id}}">{{$y->name}}</option>
                    @endforeach
          </select>
          
          
            @error('year')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>

        <div class="input-group mb-3">
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
          <select id="zone" type="text" class="form-control custom-select browser-default @error('year') is-invalid @enderror" name="idzone" value="" autocomplete="year" autofocus   style="width: 100%;" required>
                    <option value="">Chọn nhóm sinh hoạt</option>
                    @foreach($zone as $z)
                    <option value="{{$z->id}}">{{$z->name}}</option>
                    @endforeach
          </select>
          
          
            @error('zone')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
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
        </div>
    
    

       
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
          <!-- /.col -->
          <br/>
      <div style="margin-bottom: 10px;">
        <a style="float: right; color: #ffffffc4;" href="{{url('user')}}" class="text-center">Trở về TRANG CHỦ</a>
      </div>
        </div>

         </div> 
      </form>

      
      
       </div>
   
          
  </div>
   </div>
 
</body>
</html>
