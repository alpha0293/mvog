
@extends('admin.layout.layout')
@section('content')
<style type="text/css">
  label:not(.form-check-label):not(.custom-file-label) {
    float: right;
}
</style>
 @include('ckfinder::setup')
  <!-- /.row -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách Giấy tờ</h3>
              <div class="card-header">
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 40%;">Tên giấy tờ</th>
                      <th style="width: 15%; max-width: 300px;">Link liên kết</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstpaper as $paper)
                    <tr>
                      <td>{{$paper->name}}</td>
                      <td style="word-wrap: break-word; width: 15%; max-width: 300px;">{{$paper->url}}</td>
                      <td>
                            <a class="fa fa-eye" style="color:green; padding-right: 10%"  href="{{route('show.paper',$paper->id)}}"></a>
              <a class="fa fa-trash-alt" style="color:green; padding-right: 10%" href="{{route('delete.paper',$paper->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');" title="Xóa"></a>
                            <a url_paper="{{$paper->url}}" name_paper="{{$paper->name}}" id_paper="{{$paper->id}}" id="edit_paper"><i class="fas fa-edit" style="color:red"></i></a>
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
     @include('paper.edit')
     <!-- ckfinder select file -->
   <script type="text/javascript">
    $('#url-Paper-edit').click(function(){
        CKFinder.modal( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {
          finder.on( 'files:choose', function( evt ) {
            var file = evt.data.files.first();
             document.getElementById( 'url-Paper-edit' ).value = file.getUrl();
          } );
        }
      } );

        })
  </script>
    
@endsection

