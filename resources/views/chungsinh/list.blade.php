
<!DOCTYPE html>
<html lang="vi">
@include('user.layout.head')
@include('chungsinh.style')
@include('user.layout.script')
<!-- ckfinder setup -->
@include('ckfinder::setup')
<!-- toastr option -->
<body>
 @include('user.layout.loader')
 <!-- ***** Preloader End ***** -->
 <div class="container">
   @include('user.layout.header')
   @include('user.layout.menu')
   @include('user.layout.chuchay')
   
   <section id="contentSection">
    <div class="row">
      <section class="col-lg-9 col-md-9 col-sm-9">
        <div class="left_content">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div style="text-align: center; margin-bottom: 5%;" class="col-sm-12">
                  <h1>THÔNG TIN CHỦNG SINH</h1>
                  <h2 style="text-transform: uppercase; color: #67a6ff;">Khoá: ?</h2>
                  @if(Auth::check() && Auth::user()->hasRole('superadministrator|administrator'))
                  <button class="btn btn-success" id="addKhoa" style="width: auto;float: right; margin: 1px 1px 5px 1px;"><i class="fa fa-plus"></i> Thêm Khoá</button>
                  @endif
                  <hr  width="100%" align="center" />
                  <div class="loc">
                    @if(Auth::check() && Auth::user()->hasRole('superadministrator|administrator'))
                    <button id="addSemina" class="btn btn-danger" style="width: auto;float: right; margin: 1px 1px 5px 1px;"><i class="fa fa-plus"></i> Thêm chủng sinh</button>
                    @endif
                    @if(!empty($nienkhoas))
                    <select style="width: auto;float: right;margin-right: 15px" aria-label="Khoá" name="year" id="year" title="Khó" class="form-control">
                      <option value="0">Chọn chủng sinh khoá </option>
                      @foreach($nienkhoas as $lstnienkhoa)
                      <option value="{{$lstnienkhoa->id}}"> Khoá {{$lstnienkhoa->khoa}} ({{$lstnienkhoa->nienkhoa}}) </option>
                      @endforeach
                    </select>
                    @endif
                  </div>
                  

                </div>
              </div>  
            </div><!-- /.container-fluid -->
          </section>
          <!-- Main content -->
          <section class="content" style="margin-top: 15px;">
            <div class="container-fluid">
             <div class="col-md-12">
              <div class="row divthongtin" >
                <?php $index=0; ?>
                @foreach($chungsinhs as $lstchungsinh)
                <?php $index++; ?>
                <div class="tt_seminarian">
                  <span id="{{$index}}" idsemina="{{$lstchungsinh->id}}" class="fake-link" onclick="showSeminarian(this.id)">
                   <img class="imgsemir" src="{{$lstchungsinh->profileimg}}">
                   <h4 style="text-align: center;">{{$lstchungsinh->tenthanh}} {{$lstchungsinh->ho}} {{$lstchungsinh->tengoi}}</h4>
                 </span>
               </div>
               @endforeach
             </div>
           </div>
           
         </div>
       </section> <!-- content -->
       
     </div> <!-- /.left container -->
   </section><!-- /.col-lg-9 -->

   <!--  hết phần bên trái -->
   <!--  Phần bên phải -->
   <section class="col-lg-3 col-md-3 col-sm-3">
    <aside class="right_content">
      <div class="latest_post">
        <h2><span>Thông báo</span></h2>
        <div class="latest_post_container">
          <div id="prev-button"><i class="fa fa-chevron-up"></i></div>

          <ul class="latest_postnav">
            @foreach($lstnoti as $noti)
            <li style="margin-top: -25px">
              <div class="media" style="margin-top: -5px;"> <a href="#" class="media-left">  </a>
                <div style="margin-bottom: 5px;" class="thongbao "> <a href="#" class="catg_title cap"> {{$noti->title}}</a>
                  <h6 style="font-family: initial; font-style: italic; display: unset;"> ({{date_format($noti->updated_at,"d/m/Y")}})</h6>
                  @if(now()->diffInDays($noti->updated_at) <= 7)
                  <img class="new" src="{{asset('user_asset/images/new.gif')}}" alt="(New)">
                  @endif
                </div>
                <div class="media-body"> <a href="#" class="catg_title cont"> {{$noti->content}}</a> </div>
              </div>
              <hr style="border: 1px solid red;">
            </li>
            @endforeach
          </ul>
          <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
        </div>
      </div>
    </aside>
  </section>
</div>
</section>

@include('chungsinh.show')
@include('chungsinh.create')
@include('chungsinh.createKhoa')
@include('user.layout.footer')
</div>

<script type="text/javascript">
  $("[id='addSemina']").click(function(){
    $("#createSemina").modal({backdrop: false});
  });
  $("[id='showSeminas']").click(function(){
   $("#viewSemina").modal({backdrop: false});
 });
  $("[id='addKhoa']").click(function(){
    $("#createKhoa").modal({backdrop: false});
  });
</script>
<script>
  var slideIndex = 1;
  function showSeminarian(id){
    slideIndex = Number(id);
    showSlides(slideIndex);
    $("#viewSemina").modal({backdrop: false});
  }


  function plusSlides(n) {
    showSlides(Number(slideIndex += n));
  }

  function currentSlide(n) {
    showSlides(number(slideIndex = n));
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        
        slides[slideIndex-1].style.display = "block";  
        
      }

    </script>
    
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
      CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

      } );
    </script>

  </body>
  </html>


  
