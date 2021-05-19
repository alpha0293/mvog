<link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
    <style type="text/css">
    	.tt_seminarian{
    		background-color: none; 
    		margin-left: 7px; 
    		margin-bottom: 35px;
    		width: 24%; 
    		float: left; 
    		height: 200px;
    	}
    	.imgsemir{
    		height: 87%;
		    object-fit: cover;
		    border: 3px solid #fffdfd;
		    width: 90%;
		    border-radius: 25%;
    	}
      .fake-link {
         cursor: pointer;
      }
      .fake-link-img{
      	cursor: pointer;
      }
    </style>
    <style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prevs, .nexts {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.nexts {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prevs:hover, .nexts:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
@media only screen and (max-width: 1024px) {
    .tt_seminarian {
     margin-left: 0 !important; 
    width: 31% !important;
    
  }
@media only screen and (max-width: 450px) {
    .tt_seminarian {
     margin-left: 0 !important; 
    width: 50% !important;
    height: 180px !important;
    }
    .imgsemir {
    height: 75% !important;
    }
  }
@media only screen and (max-width: 300px) {
    .tt_seminarian {
     margin-left: 0 !important; 
    width: 100% !important;
    height: 180px !important;
    }
    .imgsemir {
    height: 75% !important;
    }
  }

</style>
<style type="text/css">
	 .multi-item-carousel{
  .carousel-inner{
    > .item{
      transition: 500ms ease-in-out left;
    }
    .active{
      &.left{
        left:-33%;
      }
      &.right{
        left:33%;
      }
    }
    .next{
      left: 33%;
    }
    .prev{
      left: -33%;
    }
    @media all and (transform-3d), (-webkit-transform-3d) {
      > .item{
        /* use your favourite prefixer here*/
        transition: 500ms ease-in-out left;
        transition: 500ms ease-in-out all;
        backface-visibility: visible;
        transform: none!important;
      }
    }
  }
  .carouse-control{
    &.left, &.right{
      background-image: none;
    }
  }
}
.carousel-inner{
  height: 50px;
}
img.img-responsive {
    object-fit: cover;
    object-position: 20% 10%;
    height: 100px;
}
.mySlides{
  padding: 30px;
  height: 250px;
}

p{
  margin: 0;
  text-align: initial;
}
.div-anh{
  height: 100%;
  max-width: 155px;
  margin: 0 auto;
}
.div-thongtin{
  height: 100%;
}
.btn+.btn{
    margin-bottom: 5px !important;
  }
  td{
    cursor: pointer;
  }
  .div-anh{
    border: 2px dotted #ff0000;
      height: 100%;
      border-radius: 25px;
      padding: 5px;
      
  }
  .avatarImg{
    width: 100%;
      border-radius: 25%;
      height: 100%;
      object-fit: cover;
      object-position: 20% 10%;
      text-align: center;
      font-family: 'FontAwesome';
  }
  .datetimepicker{
    background-color: #fffcfc !important;
  }
  td{
    cursor: pointer;
  }
  .formgroup{
    margin: 5px;
  }
@media only screen and (max-width: 767px) {
    .mySlides{
      height: auto;
    }
    .div-anh{
      height: 150px;
    }
    .div-thongtin{
      height: 100%;
      margin-top: 10px;
    }
  }
@media only screen and (max-width: 450px) {
    .mySlides{
      height: auto;
    }
    .div-anh{
      height: 150px;
    }
    .div-thongtin{
      height: 100%;
      margin-top: 10px;
    }
  }
@media only screen and (max-width: 300px) {
    .mySlides{
      height: auto;
    }
    .div-anh{
      height: 150px;
    }
    .div-thongtin{
      height: 100%;
      margin-top: 10px;
    }
  }
  
</style>
 <link rel="stylesheet" href="{{asset('admin_asset/dist/css/bootstrap-datetimepicker.css')}} " rel="stylesheet" media="screen">
 <link rel="stylesheet" href="{{asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">