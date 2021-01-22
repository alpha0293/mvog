
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
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách thành viên nhóm {{$zone->name}}</h3>
              <div class="card-header">
                <?php $index = 1; ?>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                    <th>STT</th>
                    <th>Tên Thánh</th>
                    <th>Tên thành viên</th>
                    <th>Ngày sinh</th>
                    <th>Trường học</th>
                    <th>Ngành học</th>
                    <th>Giáo xứ</th>
                    <th>Năm dự tu</th>
                    <th>Chức năng</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($zone->dutu->where('idstatus',1) as $i)
                    <tr>
                          <td id="stt">{{$index++}}</td>
                          <td id="ma">{{$i->holyname}}</td>
                          <td id="ten">{{$i->name}}</td>
                          <td id=ns>{{$i->dob}}</td>
                          <td id="truong">{{$i->school}}</td>
                          <td id="nganh">{{$i->majors}}</td>
                          <td id="xu">{{$i->parish}}</td>
                          <td id="nam">{{$i->nameyear->name}}</td>
                          <td>
                            <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{url('dutu',$i->id)}}"></a>
							<a class="fa fa-trash-alt" style="color:red; padding-right: 10%" href="{{url('dutu/delete',$i->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Dự tu này không?');" title="Xóa"></a>
       
                          </td>
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