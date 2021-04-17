<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
       <link rel="stylesheet" href="{{asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
      
      <!-- Theme style -->
   
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  
      <link rel="stylesheet" href="{{asset('admin_asset/dist/css/bootstrap-datetimepicker.css')}} " rel="stylesheet" media="screen">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
    
</head>
 <link href="{{asset('user_asset/assets/css/lg.css')}}" rel="stylesheet" > 
 <style type="text/css">
 
.mb-3 {
    margin-bottom: 14px;
}
.invalid-feedback{
  color: red;
}
.is-invalid{
  border-color: red;
}
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
      <div class="mobile1 col-md-8" id="box" >
       
         <h2>Cập nhật tài khoản thành viên</h2> 
        <hr> 
        <?php 
          $arrName = explode(" ", $name);
          $holyname = array_shift($arrName);
          $fullname = implode(" ", $arrName);
         ?>           
         <form class="needs-validation form-horizontal" action="{{url('dutu/store')}}" method="post" >
        @csrf

        <div class="row">
          <div class="col-md-4" >
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="holyname" type="text" class="form-control @error('holyname') is-invalid @enderror" name="holyname" required value="{{$holyname}}"  autocomplete="name" placeholder="Tên Thánh" autofocus>
              </div>
            @error('holyname')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>
    
    <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$fullname}}" required autocomplete="name" placeholder="Họ tên" autofocus>
          </div>
          
          
            @error('name')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>
    
        <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$email}}" autocomplete="email" placeholder="Email" required>
         </div>
          
         
            @error('email')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>

        <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
          <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="" autocomplete="phonenumber" placeholder="Số điện thoại" >
         </div>
          
         
            @error('phonenumber')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
           @enderror
         
        </div>
      </div>
      <!-- nhom 1 - nhom 2 -->
      <div class="col-md-4">
        <!--  -->

        <div class="mb-3 ">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>          
          <input type="text" id="dob" value="" autocomplete="dob" class="form_datetime form-control @error('dob') is-invalid @enderror" required placeholder="Ngày sinh" autofocus  name="dob" >

          </div>
          @error('dob')
             <span class="invalid-feedback" role="alert">
              {{ $message }}
             </span>
           @enderror
            
          
         
        </div>

        <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></span>  
          <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="" placeholder="Trường học" required autocomplete="scholl" autofocus>
          
          </div>
          
            @error('school')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>
    
    
    <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span> 
          <input id="majors" type="text" class="form-control @error('majors') is-invalid @enderror" name="majors" value="" autocomplete="name" required placeholder="Chuyên Ngành" autofocus>
          
          </div>
          
            @error('majors')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>
          </div>
          <!-- nhom 2 - nhom 3 -->
          <!-- het ben trai -->
        <div class="col-md-4" >
           <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span> 
          <input id="parish" type="text" class="form-control @error('parish') is-invalid @enderror" name="parish" value="" required placeholder="Giáo xứ" autocomplete="parish" autofocus>
          </div>
          
          
            @error('parish')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>

        <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span> 
          <select id="year" type="text" class="form-control custom-select browser-default @error('idyear') is-invalid @enderror" name="idyear" value="" autocomplete="year" required autofocus   style="width: 100%;" >
                    <option value="">Chọn năm</option>
                    @foreach($year as $y)
                      <option value="{{$y->id}}">{{$y->name}}</option>
                    @endforeach
          </select>
          </div>
          
            @error('idyear')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>

        <div class="mb-3"> <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span> 
          <select id="zone" type="text" class="form-control custom-select browser-default @error('idzone') is-invalid @enderror" name="idzone" value="" autocomplete="year" autofocus   style="width: 100%;" required>
                    <option value="">Chọn nhóm sinh hoạt</option>
                    @foreach($zone as $z)
                    <option value="{{$z->id}}">{{$z->name}}</option>
                    @endforeach
          </select>
          
          </div>
            @error('idzone')
             <span class="invalid-feedback" role="alert">
              {{ $message }} !
             </span>
           @enderror
         
        </div>
         </div> 
      
        
        <div class="row">
          <div class="col-md-12" style="margin: 20px;">
              <div class="checkbox">
                <label><input type="checkbox" id="agreeTerms" name="terms" value="agree" required value="">Xin chịu trách nhiệm <a href="#">với các thông tin</a></label>
              </div>
            
           <!-- /.col -->
          <div class="col-md-5"></div>
          <div class="col-md-2" style="margin-top:14px ">
            
            <button type="submit" class=" btn btn-primary btn-block">Cập nhật</button>
          </div>
          <!-- /.col -->
          <br/>
             <div class="col-md-5" style="margin-bottom: 10px;">
               <a style="color: #ffffffc4;" href="{{url('/')}}" class="text-center">Trở về TRANG CHỦ</a>
              </div>
          </div>
          
        </div>
    
    

       
         
        </div>
      </form>

      
      
       </div>
   
          
  </div>
   </div>
    <script src="{{asset('admin_asset/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('user_asset/assets/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('js/datetime_picker/bootstrap-datetimepicker.js')}}"></script>
    <script type="text/javascript">
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd',
      language:  'vi',
      weekStart: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
    forceParse: 0
    });
    </script> 
</body>
</html>
