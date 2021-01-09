
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
                      <th style="width: 40%;">Tiêu đề</th>
                      <th style="width: 15%;">Thể loại</th>
                      <th style="width: 16%;">Ảnh nổi bật</th>
                      <th style="width: 16%;">Hiển thị</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($lstpost as $post)
                    <tr>
                      <td>{!!$post->title!!}</td>
                      <td>{!!$post->namecategory->name!!}</td>
                      <td><img src="{!!$post->thumbimg!!}" alt="" style="width: 100px; height: 100px;"></td>
                      <td>
                        <input type="checkbox" class="form-control" @if($post->status==1) checked="checked" @endif onclick="offpost({{$post->id}},this.checked);">
                      </td>
                      <td>
                            <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{route('show.post',$post->id)}}"></a>
              <a class="fa fa-trash-alt" style="color:green; padding-right: 10%" href="{{route('delete.post',$post->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');" title="Xóa"></a>
                            <a href="{{route('getupdate.post',$post->id)}}"><i class="fas fa-edit" style="color:red"></i></a>
                          </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$lstpost->links()}}
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
      
       function offpost(postid, value) {
        console.log(value);
        $.post('{{ route('offpost') }}',
                {'_token': "{{ csrf_token() }}",
                'postid': postid,
                'value': value } 
                ,function(data){
                  console.log(data);
               //    toastr.success('Thành công!!!','THÔNG BÁO');
               // console.log(JSON.stringify(data));
              });
      }

        
     </script>

@endsection