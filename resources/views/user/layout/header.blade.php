  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12" >
        <div class="header_top" id="color-bar">
          <!-- <div class="header_top_left">
          </div> -->
          <div class="header_top_right" style="float: right;">
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
      <div class="col-lg-12 col-md-12 col-sm-12" >
        <div class="header_bottom" style="margin-bottom: 6px;">
          <div class="logo_area logo"><a href="index.html" ><img src="{{asset('user_asset/images/logo.jpg')}}" alt="MVOG - Hà Tĩnh"></a></div>
          <div class="add_banner logo" style="float: left; height: 68px; display: inline"><a href="#"><img src="{{asset('user_asset/images/banner_1.jpg')}}" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  

