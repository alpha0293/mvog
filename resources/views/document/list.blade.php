
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
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách Tai Lieu</h3>
              <div class="card-header">
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table-post" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 40%;">Tên giấy tờ</th>
                      <th style="width: 15%; max-width: 300px;">Link liên kết</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($document as $docu)
                    <tr>
                      <td>{{$docu->name}}</td>
                      <td style="word-wrap: break-word; width: 15%; max-width: 300px;">{{$docu->url}}</td>
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

