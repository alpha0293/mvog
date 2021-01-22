
@extends('admin.layout.layout')
@section('content')
<style type="text/css">
  label:not(.form-check-label):not(.custom-file-label) {
    float: right;
}
</style>
  <!-- /.row -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">ĐIỂM THI</h3>
              <div class="card-header">
            
              </div>
              <?php 
              $index = 1; ?>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên</th>
					  <th>Giáo xứ</th>
					  <th>Nhóm SH</th>
					  <th>Năm SH</th>
                      <th>Điểm</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstdutu as $dutu)
                    <tr>
                      <td>{{$index++}}</td>
                      <td>{{$dutu->name}}</td>
                      <td>{{$dutu->parish}}</td>
                      <td>{{$dutu->namezone->name}}</td>
                      <td>{{$dutu->nameyear->name}}</td>
                      <td>@if($dutu->getdiem->first()) {{$dutu->getdiem->first()->diem}} @else Chưa có thông tin @endif</td>
                    </tr>
                    @endforeach
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
