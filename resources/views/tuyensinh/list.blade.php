 <!-- Content Wrapper. Contains page content -->

  @extends('admin.layout.layout')
  @section('content')
  <!--------------------------------------------------------->
<style type="text/css">
  .form-control{
    width: auto;
  }

</style>
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <!-- het thu --> 
        <div class="col-md-12" id="danhsach_nhom">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title" id="addnhom_title">Danh sách ứng sinh đăng ký dự thi chủng viện</h3>
                <h4 id="addnhom_title">năm tuyển sinh: ?</h4>
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
                <table id="tableID" class="table table-bordered table-striped">
                   <thead>
		            <tr>
		                <th>STT</th>
		                <th>SBD</th>
		                <th >Tên</th>
		                <th >Ngày sinh</th>
		                <th >Giáo xứ</th>
		                <th hidden="true" ></th>
		                <th >Email</th>
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
                    <td>{{$tuyensinh->holyname.' '.$tuyensinh->fullname.' '.$tuyensinh->name}}</td>
                    <td>{{$tuyensinh->dob}}</td>
                    <td>{{$tuyensinh->parish}}</td>
                    <td hidden="true"></td>
                    <td >{{$tuyensinh->email}}</td>
                    <td>
                      <a class="fa fa-eye" style="color:green; padding-right: 10%" href="#"></a>                   
                    </td>
                  </tr>
              @endforeach
             </tbody>
                </table>
                @endif
              </div>
              <!-- /.card-body -->
              
            </div>
        </div>
       </div>
      </div>
   </section>
 @endsection