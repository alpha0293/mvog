
<!DOCTYPE html>
<html lang="vi">
   @include('user.layout.head')
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
    <style type="text/css">
    	.tt_seminarian{
    		background-color: none; 
    		margin-left: 7px; 
    		margin-bottom: 35px;
    		width: 24%; 
    		float: left; 
    		height: 200px;
    	}
    	.imgsemir{
    		height: 87%;
		    object-fit: cover;
		    border: 3px solid #fffdfd;
		    width: 90%;
		    border-radius: 25%;

    	}
      .fake-link {
         cursor: pointer;
      }
    </style>
    <style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prevs, .nexts {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.nexts {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prevs:hover, .nexts:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
@media only screen and (max-width: 1024px) {
    .tt_seminarian {
     margin-left: 0 !important; 
    width: 31% !important;
    
  }
@media only screen and (max-width: 450px) {
    .tt_seminarian {
     margin-left: 0 !important; 
    width: 50% !important;
    height: 180px !important;
    }
    .imgsemir {
    height: 75% !important;
    }
  }
@media only screen and (max-width: 300px) {
    .tt_seminarian {
     margin-left: 0 !important; 
    width: 100% !important;
    height: 180px !important;
    }
    .imgsemir {
    height: 75% !important;
    }
  }

</style>
   @include('user.layout.script')
<body>
   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->
<div class="container">
   @include('user.layout.header')
   @include('user.layout.menu')
   @include('user.layout.chuchay')
   
  <section id="contentSection">
    <div class="row">
    <section class="col-lg-9 col-md-9 col-sm-9">
    <div class="left_content">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div style="text-align: center; margin-bottom: 5%;" class="col-sm-12">
              <h1>THÔNG TIN CHỦNG SINH</h1>
              <h2 style="text-transform: uppercase; color: #67a6ff;">Khoá: ?</h2>
              <button class="btn btn-success" style="width: auto;float: right; margin: 1px 1px 5px 1px;"><i class="fa fa-plus"></i> Thêm Khoá</button>
              <hr  width="100%" align="center" />
              <div class="loc">
                     <button id="addSemina" class="btn btn-danger" style="width: auto;float: right; margin: 1px 1px 5px 1px;"><i class="fa fa-plus"></i> Thêm chủng sinh</button>
                  <select style="width: auto;float: right;margin-right: 15px" aria-label="Năm" name="year" id="year" title="Năm" class="form-control">
                    <option value="0">Chọn chủng sinh khoá</option>
                    @for($i=1; $i<=17; $i++)
                    <option @if($i==17) selected @endif value="{{$i}}">Khoá {{$i}}</option>
                    @endfor
                  </select>
              </div>
             

            </div>
          </div>  
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
          <section class="content" style="margin-top: 15px;">
          <div class="container-fluid">
          	<div class="col-md-12">
          		<div class="row divthongtin" >
          			@for($i=0;$i<12;$i++)
          			
          			<div class="tt_seminarian">
          				<span id="{{$i}}" idsemina="{{$i}}" class="fake-link" onclick="showSeminarian(this.id)">
          					<img class="imgsemir" src="{{asset('file/profileimg/medium_cong_vo.jpg')}}">
                    <h4 style="text-align: center;">Antôn Võ Thành Công</h4>
          				</span>
          			</div>
          			@endfor
          		</div>
          	</div>
           
          </div>
        </section> <!-- content -->
         
      </div> <!-- /.left container -->
     </section><!-- /.col-lg-9 -->

 <!--  hết phần bên trái -->
 <!--  Phần bên phải -->
      <section class="col-lg-3 col-md-3 col-sm-3">
        <aside class="right_content">
          <div class="latest_post">
          <h2><span>Thông báo</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              
              <li>
                <div class="media"> <a href="#" class="media-left">  </a>
                  <div class="media-body"> <a href="#" class="catg_title"> ssss</a> </div>
                  <div class="media-body"> <a href="#" class="catg_title"> sssss</a> </div>
                </div>
              </li>
              
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
        </aside>
      </section>
    </div>
  </section>

  @include('chungsinh.show')
  @include('chungsinh.create')
  @include('user.layout.footer')
</div>

 <script type="text/javascript">
    $("[id='addSemina']").click(function(){
      $("#createSemina").modal({backdrop: false});
    });
    $("[id='showSeminas']").click(function(){
     $("#viewSemina").modal({backdrop: false});
    });
  </script>
  <script>
    var slideIndex = 1;
    function showSeminarian(id){
      slideIndex = Number(id);
      showSlides(slideIndex);
      $("#viewSemina").modal({backdrop: false});
    }


function plusSlides(n) {
  showSlides(Number(slideIndex += n));
}

function currentSlide(n) {
  showSlides(number(slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
 
  slides[slideIndex-1].style.display = "block";  
  
}

</script>

</body>
</html>


 
