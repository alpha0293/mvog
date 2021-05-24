 <!-- Content Wrapper. Contains page content -->

 @extends('admin.layout.layout')
 @section('content')
 <!--------------------------------------------------------->
 <style type="text/css">
  .form-control{
    width: auto;
  }
  .fa-chevron-right, .fa-chevron-left, .switch, .day{
    cursor: pointer;
  }
</style>
<section class="content">
  <div class="container-fluid">
   <div class="row">
    <!-- het thu --> 
    <div class="col-md-12" id="danhsach_nhom">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title" id="addnhom_title">Thêm ứng sinh đăng ký dự thi chủng viện</h3>
          <h4 id="addnhom_title">năm tuyển sinh: {{now()->year}}</h4>
          <h6 style="text-align: center;">(Đã hoàn thành năm dự tu và Không quá {{setting('config.tuoithidcv','')}} tuổi)</h6>
          @if(session('message'))
          <h4>{{session('message')}}</h4>                  
          @endif
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row" style="margin-bottom: 5px;">
            <a href="#" role="button" class="btn btn-primary"><i class="fas fa-list"></i> Danh sách ứng sinh</a>
          </div>


          <div class="card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-plus"></i>
                Nhập ứng sinh bằng tay
              </h3>
            </div>
            <div class="card-body">
              <form action="{{route('save.tuyensinh')}}" method="post">
                @csrf
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên thánh và họ tên ...">
                      </div>

                      <div class="form-group">
                        <input name="dob" type="text" value=""  class="form_datetime form-control " placeholder="Ngày sinh ..." autocomplete="off" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="Nhập email ...">
                      </div>

                      <div class="form-group">
                        <input name="phonenumber" type="text" class="form-control" placeholder="Nhập Số điện thoại ..." >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <input name="parish" type="text" class="form-control" placeholder="Nhập giáo xứ ...">
                      </div>
                       <div class="form-group">
                        <input name="year" hidden="true" type="text" class="form-control" placeholder="Nhập năm ..." value="{{now()->year}}">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="text-muted mt-3">
                  <button type="submit" class="btn btn-primary" style="float: right;"> Thêm vào danh sách</button>
                </div>
              </form>
            </div>
          </div>  
          <!-- card nhap bang tay  -->
          <div class="card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-plus"></i>
                Từ danh sách dự tu
              </h3>
            </div>
            <div class="card-body">
              <?php
              $getyear = 1;
              $index = 1;
              $sbd = 1;
              ?>
              @if (1==0) <!-- sua lai danh sach ->count()==0 -->
              <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
              @else
              <h3 class="card-title" id="addnhom_title" style="color: #007bff;margin-bottom: 2%">Danh sách dự tu đủ điều kiện thi vào chủng viện</h3>
              <div class="card-body table-responsive p-0">
                <table id="tableid" class="table text-nowrap table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>STT</th>
                    <th >Tên</th>
                    <th >Ngày sinh</th>
                    <th >Email</th>
                    <th >SĐT</th>
                    <th >Giáo xứ</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dutus as $dutu)
                  <tr>
                    <td>{{$index++}}</td>
                    <td id="name{{$dutu->id}}" name="{{$dutu->holyname.' '.$dutu->fullname.' '.$dutu->name}}">{{$dutu->holyname.' '.$dutu->fullname.' '.$dutu->name}}</td>
                    <td id="dob{{$dutu->id}}" dob="{{$dutu->dob}}">{{$dutu->dob}}</td>
                    <td id="email{{$dutu->id}}" email="{{$dutu->getuser->email}}">{{$dutu->getuser->email}}</td>
                    <td id="phone{{$dutu->id}}" phonenumber="{{$dutu->phonenumber}}">{{$dutu->phonenumber}}</td>
                    <td id="parish{{$dutu->id}}" parish="{{$dutu->parish}}">{{$dutu->parish}}</td>

                    <td>
                      <div style="display: inline-grid;" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="{{$dutu->id}}" onclick="addungsinh({{$dutu->id}}, this.checked);">
                                <label class="custom-control-label" for="{{$dutu->id}}"></label>
                            </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif

            <div class="text-muted mt-3">

            </div>
          </div>
        </div>  
        <!-- Them tu du tu  -->

      </div>
      <!-- /.card-body -->

    </div>
  </div>
</div>
</div>
</section>
<script src="{{asset('js/datetime_picker/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript">
  $(".form_datetime").datetimepicker({
    format: 'yyyy-mm-dd',
    language:  'vi',
    weekStart: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });
</script> 

<script type="text/javascript">
      
       function addungsinh(id, value) {

        $.post('{{route('save.tuyensinh')}}',
                {'_token': "{{ csrf_token() }}",
                'value': value,
                'name':$('#name'+id).attr("name"),
                'dob':$('#dob'+id).attr("dob"),
                'email':$('#email'+id).attr("email"),
                'phonenumber':$('#phone'+id).attr("phonenumber"),
                'parish':$('#parish'+id).attr("parish"),
                'year': {{now()->year}}
              },
               function(data){
                  toastr.success('Thành công!!!','THÔNG BÁO');
               console.log(data);
              }).fail(function(data) {
                console.log(data);
                var response = JSON.parse(data.responseText);
                var errorString = '';
                $.each( response.errors, function( key, value) {
                    errorString += '' + value + '</br>';
                });
                toastr.error(errorString,'THÔNG BÁO');
                
                });
      }        
     </script>
@endsection

