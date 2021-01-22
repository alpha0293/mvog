@extends('user.layout.layout')
@section('content')
<head>
	<style type="text/css">
		img{
			max-width: 90%;
			display: block;
            margin: auto;
            margin-top: 5px;
            margin-bottom: 5px;
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
		
	</style>
</head>
<section class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Trang chủ</a></li>
              <li><a href="#">{{$post->namecategory->name}}</a></li>
            
            </ol>
            <h1>{{$post->title}}</h1>

            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Admin</a>  </div>
           
            <div class="single_page_content">
            @if($post->thumbimg =! null)
            <img style="width: 500px; height: auto;" class="img-center" src="{{$post->thumbimg}}" alt="">
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