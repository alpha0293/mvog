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
  #tbid_filter label {
    float: right;
    display: inline-flex;
  }
  #tbid_filter label input.form-control.form-control-sm {
    margin-left: 8px;
  }
</style>
 <section class="content">
  <div class="container-fluid">
   <div class="row">
    <!-- het thu --> 
    <div class="col-md-12" id="danhsach_nhom">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title" id="addnhom_title">Danh sách ứng sinh đã đăng ký dự thi chủng viện</h3>
          <h4 id="addnhom_title">năm tuyển sinh: {{now()->year}}</h4>
          @if(session('message'))
          <h4>{{session('message')}}</h4>                  
          @endif
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <a href="#" style="float: right;margin-bottom: 5px;" role="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm ứng sinh</a>
          <?php
          $getyear = 1;
          $index = 1;
          $sbd = 1;
          ?>
          @if ($getyear==0) <!-- sua lai danh sach ->count()==0 -->
          <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
          @else
          <div class="card-body table-responsive p-0">
            <table id="tbid" class="table text-nowrap table-bordered table-striped">
             <thead>
              <tr>
                <th>STT</th>
                <th>Số Báo Danh</th>
                <th >Tên thánh - Họ và tên</th>
                <th >Ngày sinh</th>
                <th hidden="true">Email</th>
                <th >SĐT</th>
                <th >Giáo xứ</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>

              @foreach($tuyensinhs as $tuyensinh)
              <tr>
                <td>{{$index++}}</td>
                <td>@if($sbd<10)
                  00{{$sbd++}}
                  @elseif($sbd<100||$sbd<9)
                  0{{$sbd++}}
                  @else {{$sbd++}}
                  @endif
                </td>
                <td id="name{{$tuyensinh->id}}" name="{{$tuyensinh->holyname.' '.$tuyensinh->fullname.' '.$tuyensinh->name}}">{{$tuyensinh->holyname.' '.$tuyensinh->fullname.' '.$tuyensinh->name}}</td>
                <td id="dob{{$tuyensinh->id}}" dob="{{$tuyensinh->dob}}">{{$tuyensinh->dob}}</td>
                <td id="email{{$tuyensinh->id}}" email="{{$tuyensinh->email}}" hidden="true" >{{$tuyensinh->email}}</td>
                <td id="phone{{$tuyensinh->id}}" phonenumber="{{$tuyensinh->phonenumber}}">{{$tuyensinh->phonenumber}}</td>
                <td id="parish{{$tuyensinh->id}}" parish="{{$tuyensinh->parish}}">{{$tuyensinh->parish}}</td>
                <td>
                  <span id="{{$tuyensinh->id}}" class="fa fa-eye" style="color:green; padding-right: 10%" onclick="editungsinh(this.id);"></span>  
                  <a class="fas fa-trash-alt" style="color:red; padding-right: 10%" href="#"></a>                 
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        @endif
      </div>
      <!-- /.card-body -->

    </div>
  </div>
  <!-- show chinh sua ung sinh -->

  <div class="modal fade" id="editungsinh" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <form action="" method="post">
          @csrf
          <div class="modal-header">
            <h4 class="modal-title">Chỉnh sửa ứng sinh</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <input id="txtname" name="name" type="text" class="form-control" placeholder="Nhập tên thánh và họ tên ...">
                    </div>

                    <div class="form-group">
                      <input id="txtdob" name="dob" type="text" value=""  class="form_datetime form-control " placeholder="Ngày sinh ..." autocomplete="off" >
                    </div>
                    <div class="form-group">
                      <input id="txtemail" name="email" type="text" disabled class="form-control" placeholder="Nhập email ...">
                    </div>
                  </div>

                  <div class="col-sm-6">

                    <div class="form-group">
                      <input id="txtphonenumber" name="phonenumber" type="text" class="form-control" placeholder="Nhập Số điện thoại ..." >
                    </div>
                    <div class="form-group">
                      <input id="txtparish" name="parish" type="text" class="form-control" placeholder="Nhập giáo xứ ...">
                    </div>
                    <div class="form-group">
                      <input id="txtyear" name="year" hidden="true" type="text" class="form-control" placeholder="Nhập năm ..." value="{{now()->year}}">
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="float: right;"> Lưu </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div> 
        </form>
      </div>    
    </div>
  </div>
  <!-- het show chinh sua ung sinh -->
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
<script>
  $(function () {
    $("#tbid").DataTable({
      "autoWidth": false,
      "autoFill": true,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      "pageLength": 25,
      language: {
        search: "Tìm kiếm",
        lengthMenu: "Số lượng bản ghi _MENU_ ",
        info: "Từ _START_ đến _END_ trong _TOTAL_ bản ghi",
        infoEmpty: "Không có dữ liệu ",
        zeroRecords: "Tìm kiếm không trùng",
        emptyTable: "Không có dữ liệu",
        paginate: {
          first: "Trang đầu",
          previous: "Trang trước",
          next: "Trang sau",
          last: "Trang cuối"
        },
      },
    });
  });
</script>
<script type="text/javascript">
 function editungsinh(id) {
  $('#txtname').val($('#name'+id).attr("name"));
  $('#txtdob').val($('#dob'+id).attr("dob"));
  $('#txtemail').val($('#email'+id).attr("email"));
  $('#txtphonenumber').val($('#phonenumber'+id).attr("phonenumber"));
  $('#txtparish').val($('#parish'+id).attr("parish"));
  $('#txtyear').val({{now()->year}});
   $("#editungsinh").modal({backdrop: false});
 }
</script>
@endsection