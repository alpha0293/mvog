@extends('user.layout.layout-noSlide')
@section('content')
<section class="col-lg-8 col-md-8 col-sm-8">
  <div class="card-header">
                <h4>Kết quả tìm kiếm cho: {{$k}} <span>- có {{$posts->count()}} bài viết</span></h4>
              </div>
	<div class="left_content">
              @foreach($posts as $post)
              <article class="post post__horizontal mb-40 clearfix">
       <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
        <!-- Post Thumbnail -->
        <div class="post-thumbnail">
            <img src="{{$post->thumbimg}}" alt="">
        </div>
        <!-- Post Content -->
        <div class="post-content">
            <a href="{{route('show.post',$post->id)}}" class="headline">
                <h5>{{strlen($post->title) > 1000 ? Str::substr($post->title,0,1000) : $post->title}}...</h5>
            </a>
            <!-- Post Meta -->
            <div class="post-meta">
                <p><a href="#" class="post-author">Cập nhật ngày: </a> <a href="#" class="post-date">{{date_format($post->created_at, 'd - m - Y') }}</a></p>
            </div>
        </div>
    </div>
</article>
              @endforeach
	</div>
</section>

@endsection