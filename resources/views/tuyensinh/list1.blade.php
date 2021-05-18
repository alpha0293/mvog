 <!-- Content Wrapper. Contains page content -->

  @extends('admin.layout.layout')
  @section('content')
  <!--------------------------------------------------------->

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
                        <a class="fa fa-eye" style="color:green; padding-right: 10%" href="#"></a>                   
                      </td>
                  </tr>
                  @endfor
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