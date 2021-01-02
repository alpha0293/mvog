<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Thông báo</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              @foreach($lstnoti as $noti)
              <li>
                <div class="media"> <a href="#" class="media-left">  </a>
                  <div class="media-body"> <a href="#" class="catg_title"> {{$noti->title}}</a> </div>
                  <div class="media-body"> <a href="#" class="catg_title"> {{$noti->content}}</a> </div>
                </div>
              </li>
              @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>