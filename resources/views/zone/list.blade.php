
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
       	@if (session('message'))
		<marquee>{{session('message')}}</marquee>	
        <div class="alert alert-info"></div>
        @endif
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách nhóm sinh hoạt</h3>
              <div class="card-header">
            
              </div>
              
              <!-- /.card-header -->
              <?php 
              $index = 1; ?>
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10%;">STT</th>
                      <th style="width: 15%;">Tên nhóm</th>
                      <th>Số thành viên</th>
                      <th>Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstzone as $zone)
                    <tr>
                      <td>{{$index++}}</td>
                      <td>{{$zone->name}}</td>
                      <td>{{$zone->dutu->where('idstatus',1)->count()}}</td>
                      <td>
                            <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{route('show.zone',$zone->id)}}"></a>
              <a class="fa fa-trash-alt" style="color:green; padding-right: 10%" href="{{route('delete.zone',$zone->id)}} " onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');" title="Xóa"></a>
                            <a href="{{route('getupdate.zone',$zone->id)}}"><i class="fas fa-edit" style="color:red"></i></a>
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
