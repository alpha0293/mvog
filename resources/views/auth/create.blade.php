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
  <h5>Xin hoàn tất thông tin cá nhân chính xác và chờ sự xác nhận của Linh mục phụ trách</h5>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      
      <form class="needs-validation" action="{{url('dutu/store')}}" method="post" >
        @csrf
        
		
		<div class="input-group mb-3">
          <input id="holyname" type="text" class="form-control @error('holyname') is-invalid @enderror" name="holyname" value=""  autocomplete="name" placeholder="Tên Thánh" autofocus>
          
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
            @error('holyname')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
		
		<div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$name}}" required autocomplete="name" placeholder="Họ tên" autofocus>
          
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
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$email}}" autocomplete="email" placeholder="Email" required>
         
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
        <span>Ngày sinh:</span>
        <div class="input-group mb-3">
          <input id="birthday" type="date" value="" id="example-date-input" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="birthday" required>

            @error('dob')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>

        <div class="input-group mb-3">
          <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="" placeholder="Trường học" required autocomplete="scholl" autofocus>
          
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fa fa-graduation-cap"></span>
            </div>
          </div>
          
            @error('school')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
		
		
		<div class="input-group mb-3">
          <input id="majors" type="text" class="form-control @error('majors') is-invalid @enderror" name="majors" value="" autocomplete="name" placeholder="Chuyên Ngành" autofocus>
          
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
            @error('majors')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
		

        <div class="input-group mb-3">
          <input id="parish" type="text" class="form-control @error('parish') is-invalid @enderror" name="parish" value="" required placeholder="Giáo xứ" autocomplete="parish" autofocus>
          
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-church"></span>
            </div>
          </div>
          
            @error('parish')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>

        <div class="input-group mb-3">
          <select id="year" type="text" class="form-control custom-select browser-default @error('year') is-invalid @enderror" name="idyear" value="" autocomplete="year" autofocus   style="width: 100%;" required>
                    <option value="">Chọn năm</option>
                    @foreach($year as $y)
                      <option value="{{$y->id}}">{{$y->name}}</option>
                    @endforeach
          </select>
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-calendar-plus"></span>
            </div>
          </div>
          
            @error('year')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>

        <div class="input-group mb-3">
          <select id="zone" type="text" class="form-control custom-select browser-default @error('year') is-invalid @enderror" name="idzone" value="" autocomplete="year" autofocus   style="width: 100%;" required>
                    <option value="">Chọn nhóm sinh hoạt</option>
                    @foreach($zone as $z)
                    <option value="{{$z->id}}">{{$z->name}}</option>
                    @endforeach
          </select>
          <div class="input-group-append ">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
          
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
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br/>
      <a href="{{url('user')}}" class="text-center">Trở về TRANG CHỦ</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!--  js -->

</body>
</html>
