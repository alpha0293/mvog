
<!-- Modal edit paper -->
  <div class="modal fade" id="EditPaper" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Chỉnh sửa giấy tờ</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>
        <div class="modal-body">
          <form action="{{route('update.paper',$paper->id)}}" method="POST">
          	@csrf
          	<input type="hidden" id="id_Paper" name="id">
            <div class="fomrgroup">
              <input type="text" class="form-control txtmodal" placeholder="Nhập loại giấy tờ ..."  id="name_Paper" name="name">
            </div>
            <div class="fomrgroup">
              <input readonly type="text" class="form-control txtmodal" placeholder="Click để chọn file mẫu ..."  id="url-Paper-edit" name="url">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <script type="text/javascript">
  	$("[id='edit_paper']").click(function(){
  		$("#name_Paper").val($(this).attr( "name_paper" ));
  		$("#id_Paper").val($(this).attr( "id_paper" ));
  		$("#url-Paper-edit").val($(this).attr( "url_paper" ));
  		$("#EditPaper").modal({backdrop: false});
    });
  </script>
  <!-- end Modal edit paper -->