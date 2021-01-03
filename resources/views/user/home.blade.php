@extends('user.layout.layout')
@section('content')
<section class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          @foreach($lstcat as $cat)
            <p style="display:none">{{$i++}}</p>



            @if($i%3 == 1)            
            <div class="single_post_content">
            <h2><span>{{$cat->name}}</span></h2>

            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="{{route('show.post',$cat->getpost[0]->id)}}" class="featured_img"> <img style="max-height: 200px" alt="" src="{{$cat->getpost[0]->thumbimg}}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{route('show.post',$cat->getpost[0]->id)}}">{{$cat->getpost[0]->title}}</a> </figcaption>
                    <p>{!!strlen($cat->getpost[0]->content) > 200 ? substr($cat->getpost[0]->content,0,200) : $cat->getpost[0]->content!!} ...</p>
                  </figure>
                </li>
              </ul>
            </div>

            <div class="single_post_content_right">
              <ul class="spost_nav">
                @foreach($cat->getpost->take(-($cat->getpost->count()-1))->take(4) as $post)

                <li>
                  <div class="media wow fadeInDown"> <a href="{{route('show.post',$post->id)}}" class="media-left"> <img alt="" src="{{$post->thumbimg}}"> </a>
                    <div class="media-body"> <a href="{{route('show.post',$post->id)}}" class="catg_title"> {{ substr($post->title,0,80)}}</a> </div>
                  </div>
                </li>
                @endforeach
                
              </ul>
            </div>
          </div>
         


 @elseif($i%3 == 2)
          <div class="fashion_technology_area">
           
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>{{$cat->name}}</span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="{{route('show.post',$cat->getpost[0]->id)}}" class="featured_img"> <img alt="" src="{{$cat->getpost[0]->thumbimg}}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{{route('show.post',$cat->getpost[0]->id)}}">{{$cat->getpost[0]->title}}</a> </figcaption>
                      <p>{!!strlen($cat->getpost[0]->content) > 200 ? substr($cat->getpost[0]->content,0,200) : $cat->getpost[0]->content!!} ...</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  @foreach($cat->getpost->take(-($cat->getpost->count()-1))->take(4) as $post)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route('show.post',$post->id)}}" class="media-left"> <img alt="" src="{{$post->thumbimg}}"> </a>
                      <div class="media-body"> <a href="{{route('show.post',$post->id)}}" class="catg_title"> {{strlen($post->title) > 80 ? substr($post->title,0,80) : $post->title}}...</a> </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            

  @elseif($i%3 == 0)
            <div class="technology">
              <div class="single_post_content">
                <h2><span>{{$cat->name}}</span></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="{{route('show.post',$cat->getpost[0]->id)}}" class="featured_img"> <img alt="" src="{{$cat->getpost[0]->thumbimg}}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{{route('show.post',$cat->getpost[0]->id)}}">{{$cat->getpost[0]->title}}</a> </figcaption>
                      <p>{!!strlen($cat->getpost[0]->content) > 200 ? substr($cat->getpost[0]->content,0,200) : $cat->getpost[0]->content!!} ...</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  @foreach($cat->getpost->take(-($cat->getpost->count()-1))->take(4) as $post)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route('show.post',$post->id)}}" class="media-left"> <img alt="" src="{{$post->thumbimg}}"> </a>
                      <div class="media-body"> <a href="{{route('show.post',$post->id)}}" class="catg_title"> {{strlen($post->title) > 80 ? substr($post->title,0,80) : $post->title}}...</a> </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div> 

          </div>
       
  @endif






         <!--  <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> <img src="images/photograph_img2.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_post_content">
            <h2><span>Games</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="pages/single_page.html"> <img src="images/featured_img1.jpg" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div> -->
          @endforeach
            <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> <img src="images/photograph_img2.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
@endsection