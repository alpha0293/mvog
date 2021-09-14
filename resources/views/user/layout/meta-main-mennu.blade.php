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