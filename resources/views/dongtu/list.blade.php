
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
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách dòng tu trong giáo phận</h3>
              <div class="card-header">
                <h5> <a href="{{route('create.dongtu')}}">Tạo mới</a></h5>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table>
					<th>Tên</th>
					<th>Thông tin</th>
          <th>Địa chỉ web</th>
					@foreach($lstdongtu as $dongtu)
					<tr>
						<td>{{$dongtu->name}}</td>
						<td>{{$dongtu->information}}</td>
            <td>{{$dongtu->url}}</td>
						<td><a href="{{route('delete.dongtu',$dongtu->id)}}">Delete</a>
							<a href="{{route('show.dongtu',$dongtu->id)}}">View</a>
							<a href="{{route('getupdate.dongtu',$dongtu->id)}}">Edit</a>
						</td>
					</tr>
						
					@endforeach
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





