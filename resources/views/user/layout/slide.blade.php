<div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @foreach($postslide as $post)
          <div class="single_iteam"> <a href="pages/single_page.html"> <img src="{{$post->thumbimg}}" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html">{{$post->title}}</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>