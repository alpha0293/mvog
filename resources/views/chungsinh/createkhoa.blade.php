<div class="modal fade" id="createKhoa" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content col-sm-6">
        <div class="modal-header">
          <h4 class="modal-title">Thêm mới khoá chủng viện</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
      <form action="{{route('save.chungsinh')}}" method="POST">
            @csrf
        <div class="modal-body" style="height: auto;">
              <div class="formgroup ">
                <input type="number" class="form-control txtmodal" placeholder="Khoá bao nhiêu ..." name="khoa">
              </div>
             
              <div class="formgroup">
                <input type="text" class="form-control txtmodal" placeholder="Nhập niên khoá của khoá..." name="nienkhoa">
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