  <style>
  /* hide mobile version by default */
  .mobile {
      display: inline !important;
      width: 66% !important;

  }
  /* when screen is less than 600px wide
     show mobile version and hide desktop */
  @media only screen and (max-width: 1000px) {
    .mobile {
      display: none !important; 
    }
    .logo{
      text-align: center;
    }
  }



</style>
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12" >
        <div class="header_top" id="color-bar" style="border-top: 2px solid #55a0ff; border-radius: 10px;">
          <!-- <div class="header_top_left">
          </div> -->

          <div class="header_top_right" style="float: right; width: 100%; background-color: #f3aa30f5;">
            <div class="rb" style="height: 23px;margin-top: 5px;border-bottom: 1.5px dashed #925210;border-top: 1px dashed #925210;">
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
          </div>

        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12" >
        <div class="header_bottom" style="margin-bottom: 6px;">
          <div class="logo_area logo"><a href="index.html" ><img src="{{asset('user_asset/images/logo.jpg')}}" alt="MVOG - Hà Tĩnh"></a></div>
          <div class="add_banner logo mobile" style="float: left; height: 68px"><a href="#"><img src="{{asset('user_asset/images/banner_1.jpg')}}" alt=""></a></div>
        </div>
      </div>

    </div>
  </header>
  

