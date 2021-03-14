
@extends('admin.layout.layout')
@section('content')
<style type="text/css">
  input.form-control{
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
        <div class="alert alert-info"></div>
        @endif
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Chỉnh sửa cài đặt hệ thống</h3>
              <div class="card-header">
            
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table">
                  <thead>
                    <tr>
                      <th style="width: 30%;"></th>
                      <th style="width: 65%;"></th>
                      <th style="width: 5%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiêu đề trang web:</td>
                      <td><input type="text" class="form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Lời Chúa trong ngày:</td>
                      <td><input type="text" class="form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Thời gian cho phép điểm danh lại:</td>
                      <td>
                          <input type="number" class="col-lg-5 form-control" placeholder="Nhập ..."> 
                      </td>
                      <td>
                          Tiếng
                      </td>
                    </tr>
                    <tr>
                      <td>Tỉ lệ vắng được phép:</td>
                      <td><input type="number" class="col-lg-5 form-control" placeholder="Nhập ..."> </td>
                      <td>
                          %
                      </td>
                    </tr>
                    <tr>
                      <td>Điểm tối thiểu:</td>
                      <td><input type="number" class="col-lg-5 form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Tuổi tối đa thi vào chủng viện</td>
                      <td><input type="number" class="col-lg-5 form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Hình logo:</td>
                      <td><input type="text" class="form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Hình baner:</td>
                      <td><input type="text" class="form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Footer:</td>
                      <td><input type="text" class="form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Background color:</td>
                      <td><input type="text" class="form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Bar color</td>
                      <td><input type="text" class="form-control" placeholder="Nhập ..."></td>
                      <td></td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
         
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       </div>
     </section>
 

@endsection
