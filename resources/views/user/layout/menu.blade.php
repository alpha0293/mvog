<style>
#navArea{
  position: fixed;
    width: 100%;
    height: 109px;
    z-index: 30;
    background: transparent;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
}
  .logo{
    position: absolute;
    top: 50%;
    left: 25px;
    width: 288px;
    height: 66px;
    text-decoration: none;
    transform: translate(0, -50%);
    perspective: 1000px;
    -moz-transform: translate(0, -50%);
    -moz-perspective: 1000;
    -webkit-transform: translate(0, -50%);
    -webkit-perspective: 1000;
    -o-transform: translate(0, -50%);
    -o-perspective: 1000;
    -ms-transform: translate(0, -50%);
    -ms-perspective: 1000;
  }
  .logo img{
    position: absolute;
    top: 0;
    left: 0;
    width: 230px;
    height: 66px;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
  }
.navbar.navbar-inverse{
  position: absolute;
    top: 52px;
    right: 75px;
    filter: alpha(opacity=100);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    -moz-opacity: 1;
    -khtml-opacity: 1;
    opacity: 1;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    background-color: transparent;
}
.header_top_right{
  position: absolute;
    top: 20px;
    right: 100px;
    filter: alpha(opacity=100);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    -moz-opacity: 1;
    -khtml-opacity: 1;
    opacity: 1;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
}
#search-container{
  position: absolute;
    top: 0;
    right: 35px;
    width: 40px;
    height: 100%;
    outline: none;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    }
    #search-container.open {
    width: 600px;
}

#search-container #site-search {
    position: absolute;
    top: 50%;
    right: 0;
    z-index: 2;
    width: 100%;
    height: 40px;
    transform: translate(0, -50%);
    perspective: 1000px;
    -moz-transform: translate(0, -50%);
    -moz-perspective: 1000;
    -webkit-transform: translate(0, -50%);
    -webkit-perspective: 1000;
    -o-transform: translate(0, -50%);
    -o-perspective: 1000;
    -ms-transform: translate(0, -50%);
    -ms-perspective: 1000;
    
}
#search-container.open #site-search {
    right: 4em !important;
}
#search-container #site-search label {
    position: absolute;
    top: 50%;
    left: 5em;
    color: #B9BDC8;
    font-weight: 600;
    opacity: 0;
    visibility: hidden;
    transform: translate(0, -50%);
    perspective: 1000px;
    -moz-transform: translate(0, -50%);
    -moz-perspective: 1000;
    -webkit-transform: translate(0, -50%);
    -webkit-perspective: 1000;
    -o-transform: translate(0, -50%);
    -o-perspective: 1000;
    -ms-transform: translate(0, -50%);
    -ms-perspective: 1000;
   
  }
  #search-container.open #site-search button, header #search-container.open #site-search label {
    opacity: 1;
    visibility: visible;
    z-index: 3;
}
  #search-container #site-search input {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    text-indent: 45px;
    font-size: 16px;
    line-height: 40px;
    background-color: transparent;
    border: 2px solid rgba(255, 255, 255, 0.5);
    outline: none;
    border-radius: 100px;
    -moz-border-radius: 100px;
    -webkit-border-radius: 100px;
    -o-border-radius: 100px;
    -ms-border-radius: 100px;
    -moz-background-clip: padding-box;
    -webkit-background-clip: padding-box;
    -o-background-clip: padding-box;
    -ms-background-clip: padding-box;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    
}
#search-container.open #site-search input {
    color: #FFF;
    background-color: transparent !important;
    border-color: rgba(255, 255, 255, 0.5) !important;
    outline: none;
    -moz-font-smoothing: antialiased;
    -webkit-font-smoothing: antialiased;
    -o-font-smoothing: antialiased;
    -ms-font-smoothing: antialiased;
}
#search-container.open #search-text {
    width: calc(100% - 3.8em);
    padding-left: 3.8em;
}
button, .button, .cart-button {
    display: inline-block;
    padding: .6em 2.5em;
    line-height: 1;
    color: #0A51C5 !important;
    text-decoration: none !important;
    font-weight: 600;
    cursor: pointer;
    border: 2px solid #0A51C5;
    border-radius: 100px;
    -moz-border-radius: 100px;
    -webkit-border-radius: 100px;
    -o-border-radius: 100px;
    -ms-border-radius: 100px;
    -moz-background-clip: padding-box;
    -webkit-background-clip: padding-box;
    -o-background-clip: padding-box;
    -ms-background-clip: padding-box;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
}
button.blue, .button.blue, .blue.cart-button {
    background-color: #0A51C5 !important;
    color: #FFF !important;
}
#search-container #site-search button {
    position: absolute;
    top: .15em;
    right: .1em;
    padding: 0.5em 1.5em;
    font-size: .89em;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
}
#search-container.open #site-search button, header #search-container.open #site-search label {
    opacity: 1;
    visibility: visible;
    z-index: 3;
}
button.blue:hover, button.blue:focus, .button.blue:hover, .blue.cart-button:hover, .button.blue:focus, .blue.cart-button:focus {
    background-color: transparent !important;
    color: #0A51C5 !important;
}
header #search-container #site-search:hover input {
    cursor: pointer;
    background: #0A51C5;
    border-color: #0A51C5;
}
#search-container #site-search .icon-search {
    cursor: pointer;
    position: absolute;
    top: 28%;
    left: 12px;
    z-index: 3;
    color: #FFF;
    -moz-font-smoothing: antialiased;
    -webkit-font-smoothing: antialiased;
    -o-font-smoothing: antialiased;
    -ms-font-smoothing: antialiased;
}
.open #site-search .icon-search{
  left: 70px !important;
}
#search-container .icon-close {
  cursor: pointer;
    position: absolute;
    top: 37px;
    right: 2px;
    width: 40px;
    height: 40px;
    line-height: 42px;
    text-align: center;
    background: #0A51C5;
    z-index: -1;
    color: #FFF;
    font-size: .75em;
    filter: alpha(opacity=0);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    -moz-opacity: 0;
    -khtml-opacity: 0;
    opacity: 0;
    -moz-font-smoothing: antialiased;
    -webkit-font-smoothing: antialiased;
    -o-font-smoothing: antialiased;
    -ms-font-smoothing: antialiased;
    border-radius: 100%;
    -moz-border-radius: 100%;
    -webkit-border-radius: 100%;
    -o-border-radius: 100%;
    -ms-border-radius: 100%;
    -moz-background-clip: padding-box;
    -webkit-background-clip: padding-box;
    -o-background-clip: padding-box;
    -ms-background-clip: padding-box;
    transition: opacity 0.5s ease-in-out;
    -moz-transition: opacity 0.5s ease-in-out;
    -webkit-transition: opacity 0.5s ease-in-out;
    -o-transition: opacity 0.5s ease-in-out;
    -ms-transition: opacity 0.5s ease-in-out;
}
#search-container.open .icon-close {
    z-index: 4;
    filter: alpha(opacity=100);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    -moz-opacity: 1;
    -khtml-opacity: 1;
    opacity: 1;
}
header .header_top_right.fade {
    z-index: -1;
    filter: alpha(opacity=0);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    -moz-opacity: 0;
    -khtml-opacity: 0;
    opacity: 0;
}
header .navbar.fade {
    z-index: -1;
    filter: alpha(opacity=0);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    -moz-opacity: 0;
    -khtml-opacity: 0;
    opacity: 0;
}
/*/////*/
#mobile-nav {
    display: none;
    position: fixed;
    z-index: 30;
    width: 100%;
    height: 70px;
    background: #101D42;
    box-shadow: 0 3px 20px 0 rgb(0 0 0 / 20%);
    -moz-box-shadow: 0 3px 20px 0 rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 3px 20px 0 rgb(0 0 0 / 20%);
    -o-box-shadow: 0 3px 20px 0 rgba(0, 0, 0, 0.2);
    -ms-box-shadow: 0 3px 20px 0 rgba(0, 0, 0, 0.2);
}
#mobile-nav img {
    position: absolute;
    top: 6px;
    left: 10px;
    height: 55px;
}
#mobile-nav .fa-bars, #mobile-nav .fa-times {
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 0;
    width: 70px;
    height: 70px;
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    color: #FFF;
    text-align: center;
    font-size: 1.4em;
    line-height: 60px;
    text-transform: uppercase;
    -moz-font-smoothing: antialiased;
    -webkit-font-smoothing: antialiased;
    -o-font-smoothing: antialiased;
    -ms-font-smoothing: antialiased;
}
#mobile-nav .menu-text {
    position: absolute;
    top: 45px;
    right: 22px;
    font-size: .55em;
    font-weight: 800;
    text-transform: uppercase;
    color: #FFF;
    -moz-font-smoothing: antialiased;
    -webkit-font-smoothing: antialiased;
    -o-font-smoothing: antialiased;
    -ms-font-smoothing: antialiased;
}
#mobile-shelf {
    display: none;
    overflow-y: scroll;
    position: fixed;
    z-index: 31;
    top: 70px;
    width: 100%;
    height: calc(100% - 70px);
    padding-bottom: 70px;
    background: #FFF;
    -webkit-overflow-scrolling: touch;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
}
#mobile-shelf #mobile-search {
    position: relative;
    display: block;
    width: 100%;
    margin-top: 1em;
    margin-bottom: 1em;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
}
#mobile-shelf #mobile-search #mobile-search-container {
    position: relative;
}
#mobile-shelf #mobile-search input {
    width: 100%;
    height: 40px;
    border: 1px solid #D8D8D8;
    text-indent: 40px;
    font-weight: 800;
    font-size: 1.1em;
    background: #F2F3F4;
    border-radius: 100px;
    -moz-border-radius: 100px;
    -webkit-border-radius: 100px;
    -o-border-radius: 100px;
    -ms-border-radius: 100px;
    -moz-background-clip: padding-box;
    -webkit-background-clip: padding-box;
    -o-background-clip: padding-box;
    -ms-background-clip: padding-box;
}
#mobile-shelf #mobile-search button {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0;
    height: 100%;
    width: 23%;
}
#mobile-shelf #mobile-search .icon-search {
    position: absolute;
    top: 12px;
    left: 14px;
    color: #B9BDC8;
}
#mobile-shelf .navbar-righ {
    list-style-type: none;
    margin-bottom: 1em;
}
#mobile-shelf .navbar-righ a {
    display: block;
    position: relative;
    margin: 0 33px;
    padding: 14px 0;
    font-family: 'Taviraj', serif;
    font-size: 1em;
    font-weight: 700;
    color: #101D42;
    text-decoration: none;
    border-bottom: 1px solid #D8D8D8;
    background: #FFF;
}
#mobile-shelf .minor {
    list-style-type: none;
}
#mobile-shelf .minor a {
    display: block;
    position: relative;
    padding: 10px 20px;
    font-size: .83em;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-decoration: none;
    color: #B9BDC8;
}
#mobile-shelf .contact-info {
    padding: 20px;
    font-size: .8em;
}
@media only screen and (max-width: 1020px){
  #mobile-nav {
    display: block;
}
#navArea{
  display: none;
}
#search-container{
  display: none;
}
}

</style>
<div id="mobile-nav">
      <a href="" title="" class="logo"><img src="{{asset('user_asset/images/logo.jpg')}}" alt="MVOG - Hà Tĩnh" class="white"></a>
      <span class="fa fa-bars" aria-hidden="true"></span>
      <p class="menu-text">Menu</p>
</div>
<div id="mobile-shelf" style="display: none;">
      <form id="mobile-search" name="mobile_search" action="{{route('search')}}" method="post">
        <div id="mobile-search-container">
          <input type="text" id="mobile-search-text" name="search" placeholder="Search">
          <button type="submit">Submit</button>
          <span class="icon-search"></span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-righ" style="width: 100%;">
        @include('user.layout.meta-main-mennu')
      </ul>
      <ul class="minor">
        <li><a href="new-to-the-faith" title="">New to the Faith</a></li>
        <li><a href="catholic-charities" title="">Catholic Charities</a></li>
        <li><a href="offices/catholic-community-foundation" title="">Ways to Give</a></li>
        <li><a href="offices/clergy-religious/directory" title="">Clergy Directory</a></li>
        <li><a href="contact" title="">Contact</a></li>
      </ul>
      <div class="contact-info">
        <p><strong>Phone:</strong> <a href="tel:2166966525" title="">216-696-6525</a></p>
        <p><strong>Toll Free:</strong> <a href="tel:18008696525" title="">1-800-869-6525</a></p>
        <p><strong>Address:</strong> <a href="https://www.google.com/maps/place/1404+E+9th+St,+Cleveland,+OH+44114/data=!4m2!3m1!1s0x8830fa7f0cd93393:0xb8aab14abd92a034?sa=X&amp;ved=2ahUKEwjJ49Pa1NbdAhUPSN8KHQXoD4AQ8gEwAHoECAAQAQ" title="">1404 East 9th Street, Cleveland, OH 44114</a></p>
      </div>
    </div>
<div id="navArea" style="background-color: #318fa2;">
   <a class="logo_area logo" href="index.html" ><img src="{{asset('user_asset/images/logo.jpg')}}" alt="MVOG - Hà Tĩnh"></a>
   <div class="header_top_right">
    @auth
    <ul class="top_nav" style="">
      <li style="float: right; "><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
      <li class="nav-item dropdown" style="float: right;">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          {{ Auth::user()->name }} 
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route('show.dutu',Auth::user()->id)}}">Thông tin cá nhân</a>
          <a class="dropdown-item" href="{{route('getchange.password')}}">Đổi mật khẩu</a>
        </div>
      </li>
    </ul>
    @endauth
    @guest
    <ul class="top_nav" style="">
      <li style="float: right; "><a href="{{ route('register') }}">Đăng Ký</a></li>
      <li style="float: right; "><a href="{{ route('login') }}">Đăng nhập</a></li>
    </ul>

    @endguest
  </div>
  <nav class="navbar navbar-inverse" role="navigation"> 
  <div class="navbar-header">
</div>
<div  class="navbar-collapse collapse" id="myNavbar">
  <!-- hiển thị menu cho déktop -->
  <!-- hiển thị menu cho mobile -->
  <ul class="nav navbar-nav navbar-righ" style="width: 100%;">
    @include('user.layout.meta-main-mennu')
      </ul>
    </div>
  </nav>
  <div id="search-container" tabindex="1" class>
        <form id="site-search" name="site-search" action="{{route('search')}}" method="post">
          @csrf()
          <label for="search-text">Search:</label>
          <input type="text" id="search-text" name="search" autocomplete="false" autofocus="false">
          <button type="submit" class="blue">Submit</button>
          <span class="icon-search fa fa-search"></span>
        </form>
        <span id="close-search" class="icon-close fa fa-times"></span>
      </div>
  </div>




