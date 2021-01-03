<div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          
          @foreach($postslide as $post)
          <div class="single_iteam"> <a href="{{route('show.post',$post->id)}}"> <img src="{{$post->thumbimg}}" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="{{route('show.post',$post->id)}}">{{$post->title}}</a></h2>

             <!--  <p>{!!substr( strip_tags($post->content) ,0,200)!!} ...</p> -->
            </div>
          </div>
          @endforeach
        </div>
      </div>