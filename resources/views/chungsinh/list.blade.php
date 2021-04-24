
<!DOCTYPE html>
<html lang="vi">
<head>
   @include('user.layout.head')
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
   @include('user.layout.script')
   <style type="text/css">
     .notep{
      min-width: 63px; 
      width: 100%;
      white-space: normal;
      word-wrap: break-word;
     }
     .at_td{
      min-width: 10px; 
     }
     .float-left{
      float: left;
     }
     .float-right{
      float: right;
     }
     .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #555 !important;
        cursor: default !important;
        background-color: #fff !important;
        border: 1px solid #ddd !important;
        border-bottom-color: transparent !important;
    }
        .nav-tabs>li {
        float: left !important;
        margin-bottom: -1px !important;
        width: auto !important;
    }
        .nav>li {
        position: relative !important;
        display: block !important; 
      }
      .nav-tabs {
      border-bottom: 1px solid #ddd !important;
      background-color: #f7f7f700 !important;
      }
      .nav {
      padding-left: 0 !important;
      margin-bottom: 0 !important;
      list-style: none !important;
      }
      .nav-tabs>li>a {
          padding: 10px 15px !important;
          color: #3680bf !important;
          font-size: 15px !important;
      }
   </style>
</head>

<body>
   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->
<div class="container">
   @include('user.layout.header')
   @include('user.layout.menu')
   @include('user.layout.chuchay')
    <section id="sliderSection">
    </section> <!-- kết thúc sliderSection -->
  <section id="contentSection">
    <div class="row">
    <section class="col-lg-9 col-md-9 col-sm-9">
    <div class="left_content">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div style="text-align: center; margin-bottom: 5%;" class="col-sm-12">
              <h1>THÔNG TIN CHỦNG SINH</h1>
              <h2 style="text-transform: uppercase; color: #67a6ff;"></h2>
              <hr  width="100%" align="center" />
            </div>
            <div class="col-sm-9" style="display:none">
              <ol class="breadcrumb float-sm-right">
                <div class="alert alert-danger print-error-msg" style="display:none"></div>
                <div class="success alert alert-success"></div>
              </ol>
            </div>
          </div>  
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
  <!-- tab -->
			   <a href="{{route('create.chungsinh')}}">Tạo mới</a>
				<table>
					<th>Tên</th>
					<th>Thông tin</th>
					<th>Chức Năng</th>
					@foreach($chungsinhs as $chungsinh)
					<tr>
						<td>{{$chungsinh->tenthanh}} {{$chungsinh->ho}} {{$chungsinh->tengoi}}</td>
						<td></td>
						<td><a href="{{route('delete.chungsinh',$chungsinh->id)}}">Delete</a>
							<a href="{{route('edit.chungsinh',$chungsinh->id)}}">Edit</a>
						</td>
					</tr>
						
					@endforeach
				</table>

<!-- endtab -->         
   </div><!-- /.left container -->
  </section>
  <!-- thieu div container day -->
 <!--  hết phần bên trái -->
 <!--  Phần bên phải -->
      <section class="col-lg-3 col-md-3 col-sm-3">
        <aside class="right_content">
          <div class="latest_post">
          <h2><span>Thông báo</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              
              <li>
                <div class="media"> <a href="#" class="media-left">  </a>
                  <div class="media-body"> <a href="#" class="catg_title"> ssss</a> </div>
                  <div class="media-body"> <a href="#" class="catg_title"> sssss</a> </div>
                </div>
              </li>
              
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
        </aside>
      </section>
    </div>
  </section>
  @include('user.layout.footer')
</div>

</body>
</html>


