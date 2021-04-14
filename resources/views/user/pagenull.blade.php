
<!DOCTYPE html>
<html lang="vi">
<head>
   @include('user.layout.head')
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
    
</head>

<body>
    <!-- ***** Preloader End ***** -->
 
<div class="container">
   @include('user.layout.header')
   @include('user.layout.menu')
  <section id="sliderSection">
    <div class="row">
      
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
       <section class="col-lg-8 col-md-8 col-sm-8">
       		<article>
			    <h1>Chúng tôi sẽ trở lại sớm!</h1>
			    <div>
			        <p>Xin lỗi vì sự bất tiện này. Chúng tôi đang thực hiện một số bảo trì.
			        	Chúng tôi sẽ sớm trở lại. Nguyện Thiên Chúa ban muôn phúc lành trên quý vị!
			     	</p>
			        <p>--- Ban MVOG Giáo phận Hà Tĩnh</p>
			    </div>
			</article>
       </section>
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

