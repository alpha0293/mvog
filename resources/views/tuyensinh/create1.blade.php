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
          <h3 class="card-title" id="addnhom_title">Thêm ứng sinh đăng ký dự thi chủng viện</h3>
          <h4 id="addnhom_title">năm tuyển sinh: ?</h4>
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
              <form></form>
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
                      <input name="numberphone" type="text" class="form-control" placeholder="Nhập Số điện thoại ..." >
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <!-- textarea -->
                    <div class="form-group">
                      <input name="parish" type="text" class="form-control" placeholder="Nhập giáo xứ ...">
                    </div>
                  </div>
                </div>

              </div>
              <div class="text-muted mt-3">
                <button type="submit" class="btn btn-primary" style="float: right;"> Thêm vào danh sách</button>
              </div>
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
              @if (1==0) <!-- sua lai danh sach ->count()==0 -->
              <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
              @else
              <h3 class="card-title" id="addnhom_title" style="color: #007bff;margin-bottom: 2%">Danh sách dự tu đủ điều kiện thi vào chủng viện</h3>
              <div class="card-body table-responsive p-0">
                <table id="tbid" class="table text-nowrap table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>STT</th>
                    <th>SBD</th>
                    <th >Tên</th>
                    <th >Ngày sinh</th>
                    <th >Giáo xứ</th>
                    <th hidden="true" ></th>
                    <th >Email</th>
                    <th> <input style="padding-right: 10%" type="checkbox" id="checkboxPrimary1" >  </th>
                  </tr>
                </thead>
                <tbody>
                  @for($i=0;$i<11;$i++)
                  <tr>
                    <td>{{$i+1}}</td>
                    <td>00{{$i+1}} </td>
                    <td>Giuse Nguyễn Anh Tuấn</td>
                    <td>09/9/1996</td>
                    <td>Khe Gát</td>
                    <td hidden="true"></td>
                    <td >tuanna.it96@gmail.com</td>
                    <td>
                      <input style="padding-right: 10%" type="checkbox" id="checkboxPrimary1" >                  
                    </td>
                  </tr>
                  @endfor
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
 
</script>
@endsection

