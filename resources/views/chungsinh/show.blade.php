
<div class="modal fade" id="viewSemina" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thông tin</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>

      </div>
      
      <div class="modal-body">

        <div class="slideshow-container">
          <?php $index=1; ?>
          @foreach($chungsinhs as $chungsinh)
          <?php $index++; ?>
          <div class="mySlides">
            <!-- anh khong link -->
            <div class="n-link{{$chungsinh->id}} col-sm-4 div-anh" id="{{$chungsinh->id}}">
              <img src="{{$chungsinh->profileimg}}" class="avatarImg" id="preview{{$chungsinh->id}}" style="height: 100%;"   >
            </div>
            @if(Auth::check() && Auth::user()->hasRole('superadministrator|administrator'))
            <!-- anh co link -->
            <div class="f-link{{$chungsinh->id}} col-sm-4 fake-link div-anh" id="{{$chungsinh->id}}" style="display: none;" onclick="chonanh(this.id);">
              <img src="{{$chungsinh->profileimg}}" class="avatarImg" id="preview{{$chungsinh->id}}" style="height: 100%;"   >

            </div>
            @endif
            

            <div class="col-sm-8 div-thongtin" id="tt{{$chungsinh->id}}" >
              <p>Tên: {{$chungsinh->tenthanh}} {{$chungsinh->ho}} {{$chungsinh->tengoi}}</p>
              <p>Ngày sinh: {{$chungsinh->ngaysinh}}</p>
              <p>Giáo xứ: {{$chungsinh->giaoxu}}</p>
              <p>Ngày vào đại chủng viện: {{$chungsinh->ngayvaodcv}}</p>
              <p>Khoá: {{$chungsinh->khoa}}</p>
              <p>Niên khoá: {{$chungsinh->nienkhoa}}</p>
            </div>
            @if(Auth::check() && Auth::user()->hasRole('superadministrator|administrator'))
            <form action="{{route('update.chungsinh',$chungsinh->id)}}" method="POST">
              @csrf
              <div class="col-sm-8 div-thongtin sua-thongtin" id="sua{{$chungsinh->id}}" style="display: none;">
                <div class="formgroup ">
                  <input type="text" style="display: none;" id="slc_anh{{$chungsinh->id}}" name="profileimg" value="{{$chungsinh->profileimg}}">
                  <input type="text" value="{{$chungsinh->tenthanh}} {{$chungsinh->ho}} {{$chungsinh->tengoi}}" class="form-control txtmodal" placeholder="Nhập Thánh và họ tên ..." name="name" required>
                </div>
                <div class="formgroup">
                  <input type="text" id="dob" value="{{$chungsinh->ngaysinh}}"  class="form_datetime form-control " required placeholder="Ngày sinh" autofocus autocomplete="off" name="ngaysinh" >
                </div>
                <div class="formgroup">
                  <input type="text" value="{{$chungsinh->giaoxu}}" class="form-control txtmodal" placeholder="Nhập Giáo xứ ..." required name="giaoxu">
                </div>
                <div class="formgroup">
                  <input type="text" id="ngayvaodcv" autocomplete="off" value="{{$chungsinh->ngayvaodcv}}"  class="form_datetime form-control " required placeholder="Ngày vào chủng viện" autofocus  name="ngayvaodcv" >
                </div>
                <div class="formgroup">
                  @if(!empty($nienkhoas))
                  <select id="khoa" type="text" class="form-control custom-select browser-default " name="idkhoa" value="" autocomplete="khoa" autofocus   style="width: 100%;" required>
                    <option value="0">Chọn khoá </option>
                    @foreach($nienkhoas as $lstnienkhoa)
                    <option value="{{$lstnienkhoa->id}}" @if($lstnienkhoa->id == $chungsinh->idkhoa) selected @endif > Khoá {{$lstnienkhoa->khoa}} ({{$lstnienkhoa->nienkhoa}}) </option>
                    @endforeach
                  </select>
                  @endif
                </div>
               
              </div>
               <button type="submit" id="btn-submit{{$chungsinh->id}}" style="float: right;margin-right: -28px; display: none;" class="btn btn-primary">Lưu</button>
               </form>

             

            <button style="height: 28px;border-radius: 50px;padding: 0;margin-top: 3px;background: none;color: #d43f3a;float: right;margin-top: 10px;margin-right: -28px;" type="button" class="btn-edit{{$chungsinh->id}} btn btn-danger" id="{{$chungsinh->id}}" onclick="chinhsua(this.id)">Chỉnh sửa</button>
            @endif
             
          </div>
          @endforeach



        </div>



        <a class="prevs" onclick="plusSlides(-1)">❮</a>
        <a class="nexts" onclick="plusSlides(1)">❯</a>

      </div>

      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

     </div> 
   </div>    
 </div>
</div>
<script type="text/javascript">
    // Instantiate the Bootstrap carousel
    $('.multi-item-carousel').carousel({
      interval: false
    });
// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
</script>
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
@if(Auth::check() && Auth::user()->hasRole('superadministrator|administrator'))
<script type="text/javascript">
  function chinhsua(id){
    $(".n-link"+id).css({"display":"none"});
    $(".f-link"+id).css({"display":""});
    $("#btn-submit"+id).css({"display":""});
    $("#tt"+id).css({"display":"none"});
    $("#sua"+id).css({"display":""});
    $(".btn-edit"+id).css({"display":"none"});
  }

</script>

<script type="text/javascript">
  function chonanh(id){
    CKFinder.popup( {
     chooseFiles: true,
     onInit: function( finder ) {
       finder.on( 'files:choose', function( evt ) {
         var file = evt.data.files.first();
         $('#preview'+id ).attr("src",file.getUrl());
         $('#slc_anh'+id).val(file.getUrl());
       } );
       finder.on( 'file:choose:resizedImage', function( evt ) {
         $('#preview'+id ).attr("src",evt.data.resizedUrl);
         document.getElementById('slc_anh'+id).value = evt.data.resizedUrl;
       } );
     }
   } ); 
  }
</script>
@endif
  <!-- end Modal view chung sinh -->