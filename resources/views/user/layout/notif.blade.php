<style type="text/css">
  .media-left, .media-right, .media-body {
    display: revert;
    vertical-align: top;
   }
   .cap{
    color: #55a0ff;
    font-size: 20px;
    font-stretch: condensed;
    font-weight: bold;
    
   }
   .cont{
    font-size: 14px;
    font-style: italic;
    color: black;
   }
   .new{
    width: 37px;
    height: 100%;
    color: red;
    padding-bottom: 5px;
    display: inline;
   }
</style>
<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Thông báo</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav" style="height: 90%;">
              @foreach($lstnoti as $noti)
              <li style="margin-top: -25px">
                <div class="media" style="margin-top: -5px;"> <a href="#" class="media-left">  </a>
                  <div style="margin-bottom: 5px;" class="media-body "> <a href="#" class="catg_title cap"> {{$noti->title}}</a>
                    <h6 style="font-family: initial; font-style: italic; display: unset;"> ({{date_format($noti->updated_at,"d/m/Y")}})</h6>
                    @if(now()->diffInDays($noti->updated_at) <= 7)
                   <img class="new" src="{{asset('user_asset/images/new.gif')}}" alt="(New)">
                    @endif
                  </div>
                  <div class="media-body"> <a href="#" class="catg_title cont"> {{$noti->content}}</a> </div>
                </div>
                 <hr style="border: 1px solid red;">
              </li>

              @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>