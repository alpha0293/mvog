<!DOCTYPE html>
<html>
@include('admin.layout.head')
@include('admin.layout.js')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
@include('admin.layout.header')
 <!-- Content Wrapper. Contains page content -->
@include('ckfinder::setup')
 <div class="content-wrapper">  
  <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-control" style="width: 80%; height: 200px; border: groove 2px #187de8;">
              <img src="{{$post->thumbimg}}" style="padding: 2px; width: 100%; height: 100%;" alt="Hình nổi bật" id="imgnb">
            </div>
           <input type="hidden" value="{{$post->thumbimg}}"  class="form-control col-sm-3" name="url" id="url" /> 
           <button style="margin-top: 4px;" id="sl_imgnb" class="btn btn-info" >Đổi ảnh nổi bật</button>
          </div><!-- /.col -->
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-4"> 
                <div class="form-group">
                  <div class="form-group">
                 <label>Tiêu đề bài viết</label>
                  <input id="title" name="title" type="text" class="form-control" value="{{$post->title}}" placeholder="Nhập tiêu đề ...">
                  </div>
                  <div class="form-group">
                    <label>Thể loại bài viết</label>
                  <select class="form-control select2" style="width: 100%;" name="idcategory">
                    @foreach($lstcategory as $category)
                    <option @if($post->idcategory == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                  </div>
                   
                </div>
              </div>
              <!-- col-3-->
              <div class="col-sm-3"> 
                <div class="form-group">
                  <div class="form-group">
                   
                   <button style="margin-top: 33px;" id="preview" name="preview" type="button" class="form-control btn btn-block btn-outline-primary"><i class="fa fa-eye">Xem trước</i></button>
                  </div>
                  <div class="form-group">
                 
                   <button style="margin-top: 46px;" id="save" name="save" type="button" class="form-control btn btn-block btn-outline-primary"><i class="fa fa-save">Lưu nháp</i></button>
                  </div>
                   
                </div>
              </div>
              <!-- col-3-->
              <div class="col-sm-3"> 
                <div class="form-group">
                   <button type="submit" value="Submit" onclick="Save()" style="margin-top: 33px;" id="publish" name="publish" type="button" class="form-control btn btn-block btn-success"><i class="fa fa-upload">Xuất bản</i></button>                  
                </div>
              </div>
              <!-- col-3-->
              
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <section class="content">
   <div class="container-fluid">
     
     <textarea name=text class="form-control" id="text" cols="300" rows="100">{{$post->content}}</textarea>
   </div>
  </section>
</div>
</div>
 <!-- /.content-wrapper -->
  @include('admin.layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
     <script>
        $('#sl_imgnb').click(function(){
          CKFinder.popup( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();
                         document.getElementById( 'url' ).value = file.getUrl();
                         $('#imgnb' ).attr("src",file.getUrl());
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {
                         $('#url' ).val() = evt.data.resizedUrl;
                         $('#imgnb' ).attr("src",evt.data.resizedUrl);
                     } );
                 }
             } );     
        })

         // function openPopup() {
         //     CKFinder.popup( {
         //         chooseFiles: true,
         //         onInit: function( finder ) {
         //             finder.on( 'files:choose', function( evt ) {
         //                 var file = evt.data.files.first();
         //                 document.getElementById( 'url' ).value = file.getUrl();
         //             } );
         //             finder.on( 'file:choose:resizedImage', function( evt ) {
         //                 $('#url' ).val() = evt.data.resizedUrl;
         //                  document.getElementById( 'imgnb' ).prop('src') = evt.data.resizedUrl;;
         //             } );
         //         }
         //     } );            
         // }
     </script>
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    </script>
    <script>
        function Save()
        {
            var data = CKEDITOR.instances.text.getData();
            // alert(data);
            $.post('{{route('update.post',$post->id)}}',{
                '_token': "{{ csrf_token() }}",
                'thumbimg': jQuery('[name=url]').val(), 
                'title': $('#title').val(),
                'content': data,
                'status': 1,
                'idcategory': jQuery('[name=idcategory]').val()
            }, function(data){
                console.log(data);
                toastr.success('Thành công!!!','THÔNG BÁO');
                toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-center",
                      "preventDuplicates": true,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                }
                // location.reload(); 

            }).fail(function(data)
            {
                console.log(data.responseText);
                toastr.error('Không thàng công!!!','THÔNG BÁO');
                toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-center",
                      "preventDuplicates": true,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                }
                // console.log(data.responseText);
            })
        }
        

        // Your code to save "data", usually through Ajax.
    </script>
  <script type="text/javascript">
    // preview
    $('#preview').click(function(){
      
    })
  </script>

</body>
</html>
