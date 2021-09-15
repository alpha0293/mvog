<style type="text/css">
header {
	overflow: hidden;
	position: relative;
}
.hero-text .hero {
	position: relative;
}

.hero .hero-slide img {
	width: 100%;
	height: 700px;
	object-fit: cover;
	object-position: top center;
}

.slick-dots {
	position: absolute;
	bottom: 10px;
	display: block;
	width: 100%;
	padding: 0;
	list-style: none;
	text-align: center;
}

.slick-dots li {
	position: relative;
	display: inline-block;
	width: 20px;
	height: 20px;
	margin: 0 5px;
	padding: 0;
	cursor: pointer;
}

.slick-dots li button {
	font-size: 0;
	line-height: 0;
	display: block;
	width: 20px;
	height: 20px;
	padding: 5px;
	cursor: pointer;
	border-radius: 50%;
	border: 0;
	outline: none;
}

.slick-dots li button::before {
	font-size: 18px;
	color: #fff;
	opacity: 1;
}

.slick-active button {
	background: #d60e96;
}

/** Text Animation **/

@-webkit-keyframes fadeInUpSD {
	0% {
		opacity: 0;
		-webkit-transform: translateY(100px);
		transform: translateY(100px);
	}

	100% {
		opacity: 1;
		-webkit-transform: none;
		transform: none;
	}
}

@keyframes fadeInUpSD {
	0% {
		opacity: 0;
		-webkit-transform: translateY(100px);
		transform: translateY(100px);
	}

	100% {
		opacity: 1;
		-webkit-transform: none;
		transform: none;
	}
}

.fadeInUpSD {
	-webkit-animation-name: fadeInUpSD;
	animation-name: fadeInUpSD;
}
/* Media Queries */

@media (max-width: 768px) {

}
@-webkit-keyframes fadeInUpSD {
	0% {
		opacity: 0;
		-webkit-transform: translateY(100px);
		transform: translateY(100px);
	}

	100% {
		opacity: 1;
		-webkit-transform: none;
		transform: none;
	}
}

@keyframes fadeInUpSD {
	0% {
		opacity: 0;
		-webkit-transform: translateY(100px);
		transform: translateY(100px);
	}

	100% {
		opacity: 1;
		-webkit-transform: none;
		transform: none;
	}
}

.fadeInUpSD {
	-webkit-animation-name: fadeInUpSD;
	animation-name: fadeInUpSD;
}
.overlay1 {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: #000;
	filter:alpha(opacity=50);
	-moz-opacity:0.5;
	-khtml-opacity: 0.5;
	opacity: 0.5;
}
div#homepage-slider {
    position: absolute;
    bottom: 5%;
    left: 0;
    z-index: 1;
    left: 30px;
    right: 30px;
    color: #fb0d0d;
}
#homepage-slider .slider-hero .single-slide {
    padding: 0 40px;
    overflow: hidden;
    background: #0000001c;
    height: 160px;
    display: flex;
    flex-direction: column;
    border-bottom: 2px solid #101d42;
    border-radius: 20px;
    -webkit-transition: background 0.75s ease-in-out; /* For Safari 3.0 to 6.0 */
        transition: background 0.75s ease-in-out; /* For modern browsers */
}
#homepage-slider .slider-hero .single-slide:hover{
	background: #101d42d9;
}
#homepage-slider .slider-hero .single-slide .thumb-img {
    width: 50px;
    height: 50px;
    margin: 0 auto;
    flex-shrink: 0;
}
#homepage-slider .slider-hero .single-slide .thumb-img img {
    width: 50px;
    height: 100%;
    border-radius: 50px;
    object-fit: cover;
    object-position: center top;
}
#homepage-slider .slider-hero .single-slide .post-title {
    margin-top: auto;
    margin-bottom: auto;
    flex-shrink: 1;
}
#homepage-slider .slider-hero .single-slide .post-title a {
    color: white;
}

</style>
<header class="hero-text">
	<div class="hero" data-arrows="true" data-autoplay="true">
		<!--.hero-slide-->
		<div class="hero-slide">
			<img alt="Mars Image" class="img-responsive cover" src="{{ setting('config.slide1') }}">
		</div>
		<!--.hero-slide-->
		<div class="hero-slide">
			<img alt="Mars Image" class="img-responsive cover" src="{{ setting('config.slide2') }}">
		</div>
		<!--.hero-slide-->
		<div class="hero-slide">
			<img alt="Mars Image" class="img-responsive cover" src="{{ setting('config.slide3') }}">
		</div>
		<!--.hero-slide-->
		<div class="hero-slide">
			<img alt="Mars Image" class="img-responsive cover" src="{{ setting('config.slide4') }}">
		</div>
	</div><!--.hero-->
	<div class="overlay1"></div>
	<div id="homepage-slider">
		<div class="row slider-hero">
			@foreach($postslide as $post)
			<!-- Single Slide -->
			<div class="col-md-12">
				<div class="single-slide">
					<div class="thumb-img">
						<img src="{{$post->thumbimg}}">
					</div>
					<div class="post-title">
						<a href="{{route('show.post',$post->id)}}">{{$post->title}}</a>
					</div>
				</div>
			</div>
			
			@endforeach
		</div>
	</div>

</header>