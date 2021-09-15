
@extends('admin.layout.layout')
@section('content')
<style type="text/css">
  input.cf{
    /*border: none;
    background: none;*/
    margin: 0 auto;
  }
  .img-slide {
    display: inline-flex;
    margin: 3em 0;
}
.div-slide{
  flex: 0 0 25%;
    max-width: 25%;
    padding-right: 7.5px; 
    padding-left: 7.5px;
    width: 25%;
}
.img-slide img, .logo img{
  vertical-align: middle;
    border-style: none;
    width: 100%;
    height: 150px;
    object-fit: cover;
    object-position: center;
}
</style>
  <!-- /.row -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        @if (session('message'))
          <marquee>{{session('message')}}</marquee>
        @endif
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Chỉnh sửa cài đặt hệ thống</h3>
              <div class="card-header">
            
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form method="post" action="{{route('save.config')}}">
                  @csrf()
                  <span>Tiêu đề trang web</span>
                  <input type="text" class="form-control cf" name="title" placeholder="Nhập ..." value="{{ setting('config.title','') }}">
                  <div>
                      @if($errors->has('title'))
                          <span class="error">{{ $errors->first('title') }}</span>
                      @endif
                  </div>
                  <span>Câu Lời Chúa</span>
                  <input type="text" class="form-control cf" name="loichua" placeholder="Nhập ..." value="{{ setting('config.loichua','') }}">
                  <div>
                      @if($errors->has('loichua'))
                          <span class="error">{{ $errors->first('loichua') }}</span>
                      @endif
                  </div>
                  <span>Thời gian cho phép điểm danh lại (Tiếng):</span>
                  <input type="number" class="col-lg-5 form-control cf" name="timediemdanhlai" placeholder="Nhập ..." value="{{ setting('config.timediemdanhlai','') }}">
                  <div>
                      @if($errors->has('timediemdanhlai'))
                          <span class="error">{{ $errors->first('timediemdanhlai') }}</span>
                      @endif
                  </div>
                  <span>Tỉ lệ vắng không quá (Buổi):</span>
                  <input type="number" class="col-lg-5 form-control cf" name="tilevang" placeholder="Nhập ..." value="{{ setting('config.tilevang','') }}">
                  <div>
                      @if($errors->has('tilevang'))
                          <span class="error">{{ $errors->first('tilevang') }}</span>
                      @endif
                  </div>
                  <span>Mức điểm qua năm (Điểm)</span>
                  <input type="number" class="col-lg-5 form-control cf" name="diemxetquanam" placeholder="Nhập ..." value="{{ setting('config.diemxetquanam','') }}">
                  <div>
                      @if($errors->has('diemxetquanam'))
                          <span class="error">{{ $errors->first('diemxetquanam') }}</span>
                      @endif
                  </div>
                  <span>Tuổi thi ĐCV không quá</span>
                  <input type="number" class="col-lg-5 form-control cf" name="tuoithidcv" placeholder="Nhập ..." value="{{ setting('config.tuoithidcv','') }}">
                  <div>
                      @if($errors->has('tuoithidcv'))
                          <span class="error">{{ $errors->first('tuoithidcv') }}</span>
                      @endif
                  </div>
                  <div class="img-slide">
                  <div class="" style="margin-right: 7.5px;">
                    <span>Chọn logo</span>
                    <div class="fake-link divAvatarImg">
                      <img id="preview" src="{{ setting('config.logo','') }}"  alt="Chọn ảnh đại diện">
                       <input type="text" value="{{ setting('config.logo','') }}" name="logo" id="slc_anh"  style="display: none;">
                    </div>
                    <div>
                      @if($errors->has('logo'))
                          <span class="error">{{ $errors->first('logo') }}</span>
                      @endif
                  </div>
                  </div>
                    <div class="">
                    <span>Chọn favicon</span>
                    <div class="fake-link divAvatarImg">
                      <img id="preview" src="{{ setting('config.favicon','') }}"  alt="Chọn ảnh đại diện">
                       <input type="text" value="{{ setting('config.favicon','') }}" name="favicon" id="slc_anh"  style="display: none;">
                    </div>
                    <div>
                      @if($errors->has('favicon'))
                          <span class="error">{{ $errors->first('favicon') }}</span>
                      @endif
                  </div>
                  </div>
                  </div>
                  <div class="img-slide">
                  <div class="div-slide">
                    <span>Ảnh slide 1</span>
                    <div class="fake-link divAvatarImg">
                      <img id="preview" src="{{ setting('config.slide1','') }}"  alt="Chọn ảnh đại diện">
                       <input type="text" value="{{ setting('config.slide1','') }}" name="slide1" id="slc_anh"  style="display: none;">
                    </div>
                     <div>
                      @if($errors->has('slide1'))
                          <span class="error">{{ $errors->first('slide1') }}</span>
                      @endif
                  </div>
                  </div>
                  <div class="div-slide">
                    <span>Ảnh slide 1</span>
                    <div class="fake-link divAvatarImg">
                      <img id="preview" src="{{ setting('config.slide2','') }}"  alt="Chọn ảnh đại diện">
                       <input type="text" value="{{ setting('config.slide2','') }}" name="slide2" id="slc_anh"  style="display: none;">
                    </div>
                    <div>
                      @if($errors->has('slide2'))
                          <span class="error">{{ $errors->first('slide2') }}</span>
                      @endif
                  </div>
                  </div>
                  <div class="div-slide">
                    <span>Ảnh slide 3</span>
                    <div class="fake-link divAvatarImg">
                      <img id="preview" src="{{ setting('config.slide3','') }}"  alt="Chọn ảnh đại diện">
                       <input type="text" value="{{ setting('config.slide3','') }}" name="slide3" id="slc_anh"  style="display: none;">
                    </div>
                    <div>
                      @if($errors->has('slide3'))
                          <span class="error">{{ $errors->first('slide3') }}</span>
                      @endif
                  </div>
                  </div>
                  <div class="div-slide">
                     <span>Ảnh slide 4</span>
                    <div class="fake-link divAvatarImg">
                      <img id="preview" src="{{ setting('config.slide4','') }}"  alt="Chọn ảnh đại diện">
                       <input type="text" value="{{ setting('config.slide4','') }}" name="slide4" id="slc_anh"  style="display: none;">
                    </div>
                    <div>
                      @if($errors->has('slide4'))
                          <span class="error">{{ $errors->first('slide4') }}</span>
                      @endif
                  </div>
                  </div>
                  </div>
                  
                  
                  <div>
                   <span>Chân trang</span>
                   <input type="text" class="form-control cf" name="footer" placeholder="Nhập ..." value="{{ setting('config.footer','') }}">
                   <div>
                    @if($errors->has('footer'))
                    <span class="error">{{ $errors->first('footer') }}</span>
                    @endif
                  </div>
                </div>
                 
                  <span>Màu background</span>
                  <input type="color" class="form-control cf" name="backgroundcolor" placeholder="Nhập ..." value="{{ setting('config.backgroundcolor','') }}">
                  <div>
                      @if($errors->has('backgroundcolor'))
                          <span class="error">{{ $errors->first('backgroundcolor') }}</span>
                      @endif
                  </div>
                  <span>Màu thanh ngang</span>
                  <input type="color" class="form-control cf" name="barcolor" placeholder="Nhập ..." value="{{ setting('config.barcolor','') }}">
                  <div>
                      @if($errors->has('barcolor'))
                          <span class="error">{{ $errors->first('barcolor') }}</span>
                      @endif
                  </div>
                  <button>Submit</button>
                </form>

              </div>
              <!-- /.card-body -->
         
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       </div>
     </section>
 
<script type="text/javascript">
  $(".divAvatarImg").click(function () {
    var nay = $(this);
    CKFinder.popup( {
     chooseFiles: true,
     onInit: function( finder ) {
       finder.on( 'files:choose', function( evt ) {
         var file = evt.data.files.first();
         nay.find('#preview' ).attr("src",file.getUrl());
         nay.find('#slc_anh').val(file.getUrl());
       } );
       finder.on( 'file:choose:resizedImage', function( evt ) {
         nay.find('#preview' ).attr("src",evt.data.resizedUrl);
         nay.find('#slc_anh').value = evt.data.resizedUrl;
       } );
     }
   } ); 
  });
</script>
@endsection
