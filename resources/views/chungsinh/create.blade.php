<!-- Modal Tạo mới chủng sinh -->
@if(Auth::check() && Auth::user()->hasRole('superadministrator|administrator'))
<div class="modal fade" id="createSemina" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm mới chủng sinh</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <form action="{{route('save.chungsinh')}}" method="POST">
        @csrf
        <div class="modal-body" style="height: auto;">
          
          <div class="col-sm-3" style="height: 150px;">
            <div class="fake-link divAvatarImg div-anh">
              <img id="preview" src="" class="avatarImg" alt="Chọn ảnh đại diện">
            </div>
            <input type="text" value="" name="profileimg" id="slc_anh"  style="display: none;">

          </div>
          <div class="col-sm-9" style="height: auto;">
            <div class="formgroup ">
              <input type="text" class="form-control txtmodal" required placeholder="Nhập Thánh và họ tên ..." name="name">
            </div>
            <div class="formgroup">
              <input type="text" id="dob" value=""  class="form_datetime form-control " required placeholder="Ngày sinh" autofocus autocomplete="off" name="ngaysinh" >
            </div>
            <div class="formgroup">
              <input type="text" class="form-control required txtmodal" placeholder="Nhập Giáo xứ ..." name="giaoxu">
            </div>
            <div class="formgroup">
              <input type="text" id="ngayvaodcv" autocomplete="off" value=""  class="form_datetime form-control " required placeholder="Ngày vào chủng viện" autofocus  name="ngayvaodcv" >
            </div>
            <div class="formgroup">
              @if(!empty($nienkhoas))
              <select id="khoa" type="text" class="form-control custom-select browser-default " name="idkhoa" value="" autocomplete="khoa" autofocus   style="width: 100%;" required>
                <option value="0">Chọn khoá </option>
                @foreach($nienkhoas as $lstnienkhoa)
                <option value="{{$lstnienkhoa->id}}"> Khoá {{$lstnienkhoa->khoa}} ({{$lstnienkhoa->nienkhoa}}) </option>
                @endforeach
              </select>
              @endif
            </div>
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
<script src="{{asset('js/datetime_picker/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript">
  $(".form_datetime").datetimepicker({
    format: 'yyyy-mm-dd',
    language:  'vi',
    weekStart: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });
</script> 
<script type="text/javascript">
  $(".divAvatarImg").click(function () {
    CKFinder.popup( {
     chooseFiles: true,
     onInit: function( finder ) {
       finder.on( 'files:choose', function( evt ) {
         var file = evt.data.files.first();
         $('#preview' ).attr("src",file.getUrl());
         $('#slc_anh').val(file.getUrl());
       } );
       finder.on( 'file:choose:resizedImage', function( evt ) {
         $('#preview' ).attr("src",evt.data.resizedUrl);
         document.getElementById('slc_anh').value = evt.data.resizedUrl;
       } );
     }
   } ); 

  });
</script>

<script>
  $('#sl_imgnb').click(function(){

    
  })
  
</script>

<!-- end Modal view chung sinh -->
@endif