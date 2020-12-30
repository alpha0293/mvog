@extends('admin.layout.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Trang chủ quản trị</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Dự tu đang sinh hoạt</p>
              </div>
              <div class="icon">
                <i class="ion-android-contacts"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53</h3>
                <!-- phần trăm : <sup style="font-size: 20px"></sup> -->

                <p>Chờ duyệt</p>
              </div>
              <div class="icon">
                <i class="ion-android-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Trưởng các nhóm</p>
              </div>
              <div class="icon">
                <i class="ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Số lượng nhóm</p>
              </div>
              <div class="icon">
                <i class="ion-card"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Số lượng thành viên nhóm</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Tỷ lệ thành viên giữa các nhóm</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>	
              <div class="card-body">
              	<div class="chart">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            	</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- right col -->
        </div>
        <br/>
        <div class="row">
          <section class="col-lg-12 connectedSortable">
          	<div class="card-header">
                <h3 class="card-title" style="text-align: center; float: none; font-weight: 800; font-size:18pt; color: red;">Danh sách thành viên dự tu</h3>
              </div>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên thành viên(s)</th>
                    <th>Ngày sinh</th>
                    <th>Trường học</th>
                    <th>Ngành học</th>
                    <th>Giáo xứ</th>
                    <th>Năm dự tu</th>
                    <th>Nhóm</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                          @foreach ($iddt as $i)
                          <tr>
                            <td id="stt">{{$index++}}</td>
                            <td id="ma">{{$i->holyname}}</td>
                            <td id="ten">{{$i->name}}</td>
                            <td id=ns>{{$i->dob}}</td>
                            <td id="truong">{{$i->school}}</td>
                            <td id="nganh">{{$i->majors}}</td>
                            <td id="xu">{{$i->parish}}</td>
                            <td id="nam">{{$i->nameyear->name}}</td>
                            <td id="nhom">{{$i->namezone->name}}</td>
                            <td id="trangthai"><small class="badge badge-primary">{{$i->namestatus->name}}</small></td>
                            <td>
                              <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{url('dutu',$i->id)}}"></a>
                <a class="fa fa-trash-alt" style="color:green; padding-right: 10%" href="{{url('dutu/delete',$i->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Dự tu này không?');" title="Xóa"></a>
                              <i class="fas fa-edit" style="color:red"></i>
                            </td>
                          </tr>
                        @endforeach
                    </tr>
                  </tbody>
                </table>
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
@endsection
