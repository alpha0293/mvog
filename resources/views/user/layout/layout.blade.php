<!DOCTYPE html>
<html lang="vi">
<head>
   @include('user.layout.head')
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
</head>
<body>
   @include('user.layout.header')
   
  <section id="sliderSection">
      @include('user.layout.slide')
  </section>
<div class="container-fluid">
  <section id="contentSection">
    <div class="row">
       @yield('content')
       @include('user.layout.r_category')
    </div>
  </section>
  @include('user.layout.footer')
</div>
 @include('user.layout.script')
 <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
      
    </script>
</body>
</html>

