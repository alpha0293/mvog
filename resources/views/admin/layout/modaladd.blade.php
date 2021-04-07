<!--  Togle thêm  -->
  <nav style="z-index: auto;" class="navbar main-header navbar-expand-xl navbar-dark bg-dark ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContentXL" aria-controls="navbarSupportedContentXL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContentXL">
     <ul class="navbar-nav">
            <li class="nav-item">
                <button id="zone" class="btn btn-link nav-link">Thêm Nhóm Mới <i style="color: blue;" class="fa fa-plus-circle"></i></button> 
            </li>
            <li class="nav-item">
                 <button id="cate" class="btn btn-link nav-link">Thêm Thể Loại <i style="color: blue;" class="fa fa-plus-circle"></i></button>
            </li>
            <li class="nav-item">
                <button id="paper" class="btn btn-link nav-link">Thêm Loại Giấy Tờ <i style="color: blue;" class="fa fa-plus-circle"></i></button> 
            </li>
            <li class="nav-item">
                <button id="noti" class="btn btn-link nav-link">Thêm Thông Báo <i style="color: blue;" class="fa fa-plus-circle"></i></button> 
            </li>
            
            
        </ul>
    </div>
  </nav>
    <!-- Modal add zone -->
  <div class="modal fade" id="AddZone" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm nhóm mới</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>
        <div class="modal-body">
          <form action="{{route('save.zone')}}" method="POST">
          	@csrf
            <div class="fomrgroup">
              <input type="text" class="form-control txtmodal" placeholder="Nhập tên nhóm ..." name="name">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- end Modal add zone -->
  <!-- Modal add Cate -->
  <div class="modal fade" id="AddCate" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm thể loại bài viết</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>
        <div class="modal-body">
          <form action="{{route('save.category')}}" method="POST">
          	@csrf
            <div class="fomrgroup">
              <input type="text" class="form-control txtmodal" placeholder="Nhập thể loại bài viết ..." name="name">
              <input type="checkbox" name="status" value="1" style="display: none;">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- end Modal add cate -->
  <!-- Modal add paper -->
  <div class="modal fade" id="AddPaper" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm loại giấy tờ</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
           
        </div>
        <div class="modal-body">
          <form action="{{route('save.paper')}}" method="POST">
          	@csrf
            <div class="fomrgroup">
              <input type="text" class="form-control txtmodal" placeholder="Nhập loại giấy tờ ..." name="name">
            </div>
            <div class="fomrgroup">
              <input readonly type="text"  class="form-control txtmodal"  placeholder="Click để chọn file mẫu ..." name="url" id="url-Paper-create" />
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- end Modal add paper -->
  <!-- Modal add noti -->
  <div class="modal fade" id="AddNoti" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm thông báo</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>
        <div class="modal-body">
          <form action="{{route('save.notifi')}}" method="POST">
          	@csrf
            <div class="fomrgroup">
              <input type="text" class="form-control txtmodal" placeholder="Nhập tiêu đề thông báo ..." name="title">
              <textarea name="content" rows="6" placeholder="Nhập nội dung thông báo ..." class="form-control" cols="30"></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- show modal -->
  <script>
    $("#zone").click(function(){
     $("#AddZone").modal({backdrop: false});
    });
    $("#cate").click(function(){
     $("#AddCate").modal({backdrop: false});
    });
    $("#paper").click(function(){
     $("#AddPaper").modal({backdrop: false});
    });
    $("#noti").click(function(){
     $("#AddNoti").modal({backdrop: false});
    });
    </script>
  <!-- end show modal -->
  <!-- ckfinder select file paper create -->
   <script type="text/javascript">
    $('#url-Paper-create').click(function(){
        CKFinder.modal( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {
          finder.on( 'files:choose', function( evt ) {
            var file = evt.data.files.first();
             document.getElementById( 'url-Paper-create' ).value = file.getUrl();
          } );
        }
      } );

        })
  </script>