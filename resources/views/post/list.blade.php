
@extends('admin.layout.layout')
@section('content')
	<!-- /.row -->
	 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách bài viết</h3>
              <div class="card-header">
                
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Tiêu đề</th>
                      <th>Thể loại</th>
                      <th>Ảnh nổi bật</th>
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
    </div>
@endsection