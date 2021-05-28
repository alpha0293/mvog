<style type="text/css">
  .menu-mobi{
    display: none;
  }
  .menu-mobi li{
    border-bottom: 1px solid;
  }
  .ribbon {
     display: inline-block;
   }

  @media only screen and (max-width: 767px)  {
   .menu-mobi {
    display: inline-block;
  }
   .ribbon {
     display: none;
   }
 } 
 
</style>
<section id="navArea">
  <nav class="navbar navbar-inverse" id="color-bar" style="background-image: url('{{ asset('user_asset/images/go.jpg')}}'); background-blend-mode: luminosity; border-top: 2px solid #55a0ff; border-radius: 10px;" data-spy="affix" data-offset-top="197" role="navigation"> 
  <div class="navbar-header">
   <button style="color: #ffffffc4; border-color: white;" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" value="Chính anh em là ánh sáng cho trần gian (Mt 5,14)">
   
    <span class="fa fa-bars"></span>

  </button>
</div>
<div  class="navbar-collapse collapse" id="myNavbar">
  <!-- hiển thị menu cho déktop -->
  <div class="ribbon">
    <a style="border-left: 1px solid;" href="#"><span><i class="fa fa-home"></i></span></a>
    <a href="#"><span>Giấy tờ</span></a>
    <i>✞</i>
    
    <a href="#"><span>Thông tin</span></a>
    <a href="#"><span>Liên hệ</span></a>
    @auth
    @if(Auth::user()->roleid == 2 || Auth::user()->roleid == 3 )
    <a href="{{route('show.dutu',Auth::user()->id)}}"><span>Cá nhân</span></a>
    @endif
    @endauth
  </div>
  <!-- hiển thị menu cho mobile -->
  <ul class="nav navbar-nav navbar-righ menu-mobi" style="width: 100%;">
    <li><a href="index.html">Trang chủ</a></li>
    <li><a href="#">Giấy tờ</a></li>
    <li><a href="#">Thông tin</a></li>
    <li><a href="pages/contact.html">Liên hệ</a></li>
    @auth
    @if(Auth::user()->roleid == 2 || Auth::user()->roleid == 3 )
    <li><a href="{{route('show.dutu',Auth::user()->id)}}">Cá nhân</a></li>
    @endif
    @endauth
          <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Merchandise</a></li>
            <li><a href="#">Extras</a></li>
            <li><a href="#">Media</a></li> 
          </ul>
        </li> -->
      </ul>
    </div>
  </nav>
</section>




