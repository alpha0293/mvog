
@extends('admin.layout.layout')
@section('content')
<style type="text/css">
  input.cf{
    /*border: none;
    background: none;*/
    margin: 0 auto;
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
                  <span>Thời gian cho phép điểm danh lại:</span>
                  <input type="number" class="col-lg-5 form-control cf" name="timediemdanhlai" placeholder="Nhập ..." value="{{ setting('config.timediemdanhlai','') }}">
                  <div>
                      @if($errors->has('timediemdanhlai'))
                          <span class="error">{{ $errors->first('timediemdanhlai') }}</span>
                      @endif
                  </div>
                  <span>Tỉ lệ vắng không quá:</span>
                  <input type="number" class="col-lg-5 form-control cf" name="tilevang" placeholder="Nhập ..." value="{{ setting('config.tilevang','') }}">
                  <div>
                      @if($errors->has('tilevang'))
                          <span class="error">{{ $errors->first('tilevang') }}</span>
                      @endif
                  </div>
                  <span>Mức điểm qua năm</span>
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
                  <span>Chọn logo</span>
                  <input type="text" class="form-control cf" name="logo" placeholder="Nhập ..." value="{{ setting('config.logo','') }}">
                  <div>
                      @if($errors->has('logo'))
                          <span class="error">{{ $errors->first('logo') }}</span>
                      @endif
                  </div>
                  <span>Chọn banner</span>
                  <input type="text" class="form-control cf" name="banner" placeholder="Nhập ..." value="{{ setting('config.banner','') }}">
                  <div>
                      @if($errors->has('banner'))
                          <span class="error">{{ $errors->first('banner') }}</span>
                      @endif
                  </div>
                  <span>Chân trang</span>
                  <input type="text" class="form-control cf" name="footer" placeholder="Nhập ..." value="{{ setting('config.footer','') }}">
                  <div>
                      @if($errors->has('footer'))
                          <span class="error">{{ $errors->first('footer') }}</span>
                      @endif
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
 

@endsection
