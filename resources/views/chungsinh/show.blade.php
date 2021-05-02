<!-- Modal view chung sinh -->
<link rel="stylesheet" href="{{asset('admin_asset/dist/css/bootstrap-datetimepicker.css')}} " rel="stylesheet" media="screen">
 <link rel="stylesheet" href="{{asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
<style type="text/css">
  .multi-item-carousel{
  .carousel-inner{
    > .item{
      transition: 500ms ease-in-out left;
    }
    .active{
      &.left{
        left:-33%;
      }
      &.right{
        left:33%;
      }
    }
    .next{
      left: 33%;
    }
    .prev{
      left: -33%;
    }
    @media all and (transform-3d), (-webkit-transform-3d) {
      > .item{
        // use your favourite prefixer here
        transition: 500ms ease-in-out left;
        transition: 500ms ease-in-out all;
        backface-visibility: visible;
        transform: none!important;
      }
    }
  }
  .carouse-control{
    &.left, &.right{
      background-image: none;
    }
  }
}
.carousel-inner{
  height: 50px;
}
img.img-responsive {
    object-fit: cover;
    object-position: 20% 10%;
    height: 100px;
}
.mySlides{
  padding: 30px;
  height: 250px;
}
.showimg{
  height: 150px;
  width: 33%;
}
.showtt{
  height: 150px;
  width: 67%;
}
p{
  margin: 0;
  text-align: initial;
}
.div-anh{
  height: 100%;
}
.div-thongtin{
  height: 100%;
}
@media only screen and (max-width: 767px) {
    .mySlides{
      height: auto;
    }
    .div-anh{
      height: 150px;
    }
    .div-thongtin{
      height: 100%;
      margin-top: 10px;
    }
  }
@media only screen and (max-width: 450px) {
    .mySlides{
      height: auto;
    }
    .div-anh{
      height: 150px;
    }
    .div-thongtin{
      height: 100%;
      margin-top: 10px;
    }
  }
@media only screen and (max-width: 300px) {
    .mySlides{
      height: auto;
    }
    .div-anh{
      height: 150px;
    }
    .div-thongtin{
      height: 100%;
      margin-top: 10px;
    }
  }
  .btn+.btn{
    margin-bottom: 5px !important;
  }
  .datetimepicker{
    background-color: #fffcfc !important;
  }
  td{
    cursor: pointer;
  }
</style>
  <div class="modal fade" id="viewSemina" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thông tin</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>
      
        <div class="modal-body">
          
<div class="slideshow-container">

<div class="mySlides">
      <div class="col-sm-4 div-anh">
        <img src="{{asset('file/profileimg/medium_cong_vo.jpg')}}" style="height: 100%;">
      </div>
      <div class="col-sm-8" id="div-thongtin" >
        <p>Tên: Nguyễn Anh Tuấn</p>
        <p>Ngày sinh: 09/9/1996</p>
        <p>Giáo xứ: Khe Gát</p>
        <p>Ngày vào đại chủng viện: 09/9/1996</p>
        <p>Khoá: XIIII</p>
        <p>Niên khoá: 2021 - 2022</p>
      </div>
      <div class="col-sm-8 div-thongtin" id="sua-thongtin" style="display: none;">
        <div class="formgroup ">
                <input type="text" class="form-control txtmodal" placeholder="Nhập Thánh và họ tên ..." name="name">
              </div>
             <div class="formgroup">
              <input type="text" id="dob" value=""  class="form_datetime form-control " required placeholder="Ngày sinh" autofocus autocomplete="off" name="dob" >
            </div>
              <div class="formgroup">
                <input type="text" class="form-control txtmodal" placeholder="Nhập Giáo xứ ..." name="name">
              </div>
              <div class="formgroup">
              <input type="text" id="ngayvaodcv" autocomplete="off" value=""  class="form_datetime form-control " required placeholder="Ngày vào chủng viện" autofocus  name="ngayvaodcv" >
            </div>
              <div class="formgroup">
                <select id="khoa" type="text" class="form-control custom-select browser-default " name="khoa" value="" autocomplete="khoa" autofocus   style="width: 100%;" required>
                        <option value="">Chọn khoá</option>
                        <option value="1">Khoá 1 (2012-2013)</option>
                        <option value="2">Khoá 2 (2013-2014)</option>
                        
              </select>
              </div>
      </div>
</div>
<div class="mySlides">
  <q>I love you the more ittttttttn that I believe you had liked me for my own sake and for nothing else</q>
  <p class="author">- John Keats</p>
</div>
<div class="mySlides">
  <q>I love you the more uuuuuuin that I believe you had liked me for my own sake and for nothing else</q>
  <p class="author">- John Keats</p>
</div>
<div class="mySlides">
  <q>I love you the more ppppppin that I believe you had liked me for my own sake and for nothing else</q>
  <p class="author">- John Keats</p>
</div>
   
    
 </div>
  


<a class="prevs" onclick="plusSlides(-1)">❮</a>
<a class="nexts" onclick="plusSlides(1)">❯</a>

</div>

        <div class="modal-footer">
          <button type="submit" id="btn-submit" class="btn btn-primary" style="display: none;">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="btn-edit">Chỉnh sửa</button>
        </div> 
        </div>    
    </div>
  </div>
  <script type="text/javascript">
    // Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: false
});


// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
  </script>
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
    <script type="text/javascript">
      $("#btn-edit").click(function(){
        $("#btn-submit").css({"display":""});
        $("#div-thongtin").css({"display":"none"});
        $("#sua-thongtin").css({"display":""});
      })
    </script>
  <!-- end Modal view chung sinh -->