@extends('user.layout.layout')
@section('content')
<head>
	<style type="text/css">
		.divpost p img{
			max-width: 90%;
			display: block;
      margin: 5px auto 5px auto;
      object-fit: contain;
      max-height: 427px;
      height: auto !important;
      width: auto !important;
		}
		.single_page > h1 {
		    color: #333;
		    font-family: 'Cuprum', sans-serif;
		    font-size: 30px;
		    line-height: 38px;
		    margin: 10px 0 -10px;
		    padding: 0 0 4px;
		    text-transform: uppercase;
		    font-weight: 600;
		}
    .setMenu{
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 3%;
    left: 95%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
    z-index: 999;
    border-radius: 50%;
    background: #ff000000;
    border-style: none;
    }
  .fadeInDown:hover .featured_img {
    opacity: 0.3;
  }

  .fadeInDown:hover .setMenu {
    opacity: 1;
  }

  .showSet {
    display: none;
    position: absolute;
    background-color: rgb(187 243 167 / 71%);
    width: auto;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  .showSet li{
    display: block;
    width: 100%;
    text-align: center;
  }
  .showSet a:hover {background-color: #ddd;}

  .show {display: block;}
   
  .media.wow.fadeInDown.animated {
    display: inline-flex;
    font-size: 17px;
    line-height: 1;
  }
  .small-post li{
    margin-bottom: 20px;
  }
	</style>
</head>
<section class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb" id="color-bar">
              <li><a href="{{route('home')}}">Trang chủ</a></li>
              <li><a href="#">{{$post->namecategory->name}}</a></li>
            
            </ol>
            <h1>{{$post->title}}</h1>

            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Admin</a> 
                 @if(Auth::check() && Auth::user()->hasPermission('posts-update')) 
                  <a style="color:blue; float: right;font-size: larger;padding: 3px;" class="fa fa-edit" href="{{route('getupdate.post',$post->id)}}"></a>
                  @endif
            </div>
           
            <div class="single_page_content">
            @if($post->thumbimg != null)
            <img style="display: block; width: 90%; max-height: 430px; object-fit: contain;     margin-bottom: 30px;height: auto;" class="img-center" src="{{$post->thumbimg}}" alt="">
            @endif
              <div class="divpost" >{!!$post->content!!}</div>
            </div>
           <!--  <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div> -->
            
          </div>
        </div>

      </section>
@endsection