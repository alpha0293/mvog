<!-- Modal view chung sinh -->
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

<div class="mySlides" style="height: 200px">
      <div class="col-sm-4" style="height: 100%; ">
        <img src="{{asset('file/profileimg/medium_cong_vo.jpg')}}" style="height: 100%;">
      </div>
      <div class="col-sm-8" style=" height: 100%;">
        <p>Tên: </p>
        <p>Ngày sinh: </p>
        <p>Giáo xứ: </p>
        <p>Ngày vào đại chủng viện: </p>
        <p>Khoá: </p>
        <p>Niên khoá: </p>
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
          <button type="submit" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
  <!-- end Modal view chung sinh -->