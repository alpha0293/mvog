<section class="col-lg-4 col-md-4 col-sm-4">
          @include('user.layout.notif-noSlide')
          <aside class="right_content">
          <div class="single_sidebar">
            <h2 id="color-bar"><span>Bài viết ngẫu nhiên</span></h2>
            <ul class="spost_nav">
              @foreach($lstpopularpost as $post)
              <li>
                <div class="media wow fadeInDown">
                  @if(Auth::check() && Auth::user()->hasPermission('posts-update|posts-delete')) 
                      <button class="fa fa-ellipsis-v setMenu"
                      onclick="setPopular({{$post->id}});"></button> 
                      <ul class="showSet" id="popular{{$post->id}}">
                        <li><a style="color:blue; float: none;" class="fa fa-edit" href="{{route('getupdate.post',$post->id)}}"></a></li>
                        <li><a style="color:red; float: none;" class="fa fa-trash-o" href="{{route('delete.post',$post->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');" title="Xóa"></a></li>
                    </ul> 
                    @endif
                  <a href="{{route('show.post',$post->id)}}" class="media-left"> <img alt="" src="{{$post->thumbimg}}"> </a>
                  <div class="media-body"> <a href="{{route('show.post',$post->id)}}" class="catg_title">{{strlen($post->title) > 80 ? Str::substr($post->title,0,70) : $post->title}}...</a> 
                    <br/><h6 style="font-family: initial; font-style: italic; display: unset;"> -- {{date_format($post->updated_at,"d/m/Y")}}</h6>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- popular -->
          <!-- tab -->
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  @foreach($lstcat as $cat)
                  <li class="cat-item"><a href="{{route('show.category',$cat->id)}}">{{$cat->name}}</a></li>
                  @endforeach
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                 
                </ul>
              </div>
            </div>
            <!-- end tab content -->
          </div>
          <!-- end tab -->
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Trang web liên kết</span></h2>
            <ul>
              <li><a href="https://giaophanhatinh.com/">> Giáo phận Hà Tĩnh</a></li>
              <li><a href="http://gpvinh.com/">> Giáo phận Vinh</a></li>
              <li><a href="https://dcvphanxicoxavie.com/">> Đại chủng viện F.x</a></li>
              <li><a href="https://hdgmvietnam.com/">> HĐGM Việt Nam</a></li>
            </ul>
          </div>
        </aside>
  </section>