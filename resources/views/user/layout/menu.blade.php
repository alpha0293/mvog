<section id="navArea">
    <nav class="navbar navbar-inverse" id="color-bar" data-spy="affix" data-offset-top="197" role="navigation"> 
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      </div>
      <div  class="navbar-collapse collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-righ ">
          <li class="active"><a href="index.html"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Trang chủ</span></a></li>
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

