</style>
<section class="col-lg-12 col-md-12 col-sm-12">
        <div class="slick_slider" style="border-top: 2px solid #55a0ff; border-radius: 10px;">
          @foreach($postslide as $post)
          <div class="single_iteam"> <a href="{{route('show.post',$post->id)}}"> <img style="border-radius: 11px;" src="{{$post->thumbimg}}" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="{{route('show.post',$post->id)}}">{{$post->title}}</a></h2>
             <!--  <p>{!!substr( strip_tags($post->content) ,0,200)!!} ...</p> -->
            </div>
          </div>
          @endforeach
        </div>
      </section>