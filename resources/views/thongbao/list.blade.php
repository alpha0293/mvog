
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
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Thông báo</h3>
            @if (session('message'))
				<marquee>{{session('message')}}</marquee>	
		        <div class="alert alert-info"></div>
		    @endif
              <div class="card-header">
                <h5> <a href="{{route('create.notifi')}}">Tạo mới</a></h5>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
					<th>Tiêu Đề</th>
					<th>Nội dung</th>
					<th>Trạng thái</th>
					<th>Chức năng</th>
					@foreach($lstnoti as $noti)
					<tr>
						<td>{{$noti->title}}</td>
						<td>{{$noti->content}}</td>
						<td>{{$noti->status}}</td>
						<td><a href="{{route('delete.notifi',$noti->id)}}">Delete</a>
							<a href="{{route('show.notifi',$noti->id)}}">View</a>
							<a href="{{route('getupdate.notifi',$noti->id)}}">Edit</a>
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