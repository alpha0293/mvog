@extends('user.layout.layout')
@section('content')

	<style type="text/css">
		.leftthumb{
			display: table-cell;
            vertical-align: top;
            padding-right: 10px;
		}
		.thumbimg{
			width: 100%;
		    height: 100%;
		    max-width: 100%;
		    opacity: 1 !important;
		    transition: opacity 0.3s;
		    transition-timing-function: cubic-bezier(0.39, 0.76, 0.51, 0.56);
		    display: block;
		}
		.borpost{
			padding-bottom: 40px;
            position: relative;
		}
		.postbody{
			margin-left: 174px;
            min-height: 150px;
		}
		.title_post{
			font-size: 22px;
		    line-height: 28px;
		    margin-bottom: 5px;
		    margin: 0 0 6px 0;
		}
		.borthumb{
			position: absolute;
		    left: 0;
		    top: 0;
		        margin-bottom: 13px;
		}

	</style>

<section class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li href="active">{{$cat->name}}</li>
            </ol>
            <h1 style="margin-top: 35px; margin-bottom: 55px; background: none repeat scroll 0 0 #2452d2a3; color: #fff;">{{$cat->name}}</h1>           
     		
              @foreach($lstpost as $post)


             	<div class="borpost">
             		<div class="borthumb"> 
             			<a href="{{route('show.post',$post->id)}}" style="width: 150px; height: 150px;" class="leftthumb"> <img class="thumbimg" alt="" src="{{$post->thumbimg}}"> </a>
             		</div>
                    <figure class="postbody"> 
	                  	<h3 class="title_post"></h3>
	                  	<a href="{{route('show.post',$post->id)}}" style=" word-wrap: break-word;" class="catg_title">{{strlen($post->title) > 80 ? substr($post->title,0,80) : $post->title}}...</a> 
	                  	<h6 style="font-style: italic;"><i style="font-size: 18px; color: red;" class="fa fa-clock-o"></i> {{date_format($post->created_at,"d/m/Y")}}</h6>
	                  	<p style="word-wrap: break-word;">{{substr(html_entity_decode(strip_tags($post->content)),0,200)}}...</p>
                  	</figure>
             	</div>
              @endforeach

           
            {{$lstpost->links()}}
          </div>
        </div>

      </section>
@endsection
