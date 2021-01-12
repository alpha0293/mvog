
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
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách bài viết</h3>
              <div class="card-header">
            
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Tên thể loại</th>
					  <th>Số bài viết</th>
					  <th>Hành động</th>
                      <th>Trangj thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstcat as $cat)
                    <tr>
                      <td>{{$cat->name}}</td>
                      <td>{{$cat->getpost->count()}}</td>
                      <td><a href="{{route('delete.category',$cat->id)}}" class="fa fa-trash-alt" style="color:green; padding-right: 10%" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');" title="Xóa" >Delete</a>
							<a href="{{route('show.category',$cat->id)}}" class="fa fa-eye" style="color:green; padding-right: 10%">View</a>
							<a href="{{route('getupdate.category',$cat->id)}}"><i class="fas fa-edit" style="color:red"></i></a>
					  </td>
                      <td>
                        <div style="display: inline-grid;" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input" id="{{$cat->id}}" @if($cat->status==1) checked="checked" @endif onclick="offcat({{$cat->id}},this.checked);">
                          <label class="custom-control-label" for="{{$cat->id}}"></label>
                        </div>
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
     <!-- Bootstrap Switch -->
       <script src="{{asset('admin_asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

     <script type="text/javascript">
      
       function offcat(catid, value) {
        // console.log(catid);
        $.post('{{ route('offcat') }}',
                {'_token': "{{ csrf_token() }}",
                'catid': catid,
                'value': value } 
                ,function(data){
                  console.log(data);
               //    toastr.success('Thành công!!!','THÔNG BÁO');
               // console.log(JSON.stringify(data));
              });
      }

        
     </script>

@endsection
