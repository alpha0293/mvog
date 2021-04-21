
@extends('admin.layout.layout')
@section('content')
  <!-- /.row -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách Liên Kết</h3>
              <div class="card-header">
                <h5> <a href="{{route('create.link')}}">Tạo mới</a></h5>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 40%;">Tên</th>
                      <th style="width: 15%; max-width: 300px;">Link liên kết</th>
                      <th>Status</th>
                      <th>Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($links as $link)
                    <tr>
                      <td>{{$link->name}}</td>
                      <td style="word-wrap: break-word; width: 15%; max-width: 300px;">{{$link->url}}</td>
                      <td>{{$link->status}}</td>
                      <td>
                        <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{route('edit.link',$link->id)}}"></a>
                <a class="fa fa-trash-alt" style="color:green; padding-right: 10%" href="{{route('delete.link',$link->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Liên Kết này không?');" title="Xóa"></a>
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

