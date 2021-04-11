
<!DOCTYPE html>
<html lang="vi">
<head>
   @include('user.layout.head')
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
   @include('user.layout.script')
   <style type="text/css">
     .notep{
      min-width: 63px; 
      width: 100%;
      white-space: normal;
      word-wrap: break-word;
     }
     .at_td{
      min-width: 10px; 
     }
     .float-left{
      float: left;
     }
     .float-right{
      float: right;
     }
     .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #555 !important;
        cursor: default !important;
        background-color: #fff !important;
        border: 1px solid #ddd !important;
        border-bottom-color: transparent !important;
    }
        .nav-tabs>li {
        float: left !important;
        margin-bottom: -1px !important;
        width: auto !important;
    }
        .nav>li {
        position: relative !important;
        display: block !important; 
      }
      .nav-tabs {
      border-bottom: 1px solid #ddd !important;
      background-color: #f7f7f700 !important;
      }
      .nav {
      padding-left: 0 !important;
      margin-bottom: 0 !important;
      list-style: none !important;
      }
      .nav-tabs>li>a {
          padding: 10px 15px !important;
          color: #3680bf !important;
          font-size: 15px !important;
      }
   </style>
</head>

<body>
   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->
<div class="container">
   @include('user.layout.header')
   @include('user.layout.menu')
   @include('user.layout.chuchay')
    <section id="sliderSection">
    </section> <!-- kết thúc sliderSection -->
  <section id="contentSection">
    <div class="row">
    <section class="col-lg-9 col-md-9 col-sm-9">
    <div class="left_content">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div style="text-align: center; margin-bottom: 5%;" class="col-sm-12">
              <h1>THÔNG TIN CÁ NHÂN</h1>
              <h2 style="text-transform: uppercase; color: #67a6ff;">{{$dutu->holyname}} {{$dutu->fullname}} {{$dutu->name}}</h2>
              <hr  width="100%" align="center" />
            </div>
            <div class="col-sm-9" style="display:none">
              <ol class="breadcrumb float-sm-right">
                <div class="alert alert-danger print-error-msg" style="display:none"></div>
                <div class="success alert alert-success"></div>
              </ol>
            </div>
          </div>  
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
  <!-- tab -->
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#info">Thông tin</a></li>
      <li><a data-toggle="tab" href="#attend">Điểm danh</a></li>
      <li><a data-toggle="tab" href="#score">Điểm thi</a></li>
      <li><a data-toggle="tab" href="#papers">Giấy tờ</a></li>
    </ul>
    <div class="tab-content">
      <div id="info" class="tab-pane fade in active">
          <!-- info -->
          <section class="content">
          <div class="container-fluid">
            <div style="min-height: 100%;" class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center" >
                  <form id="frmupdate">
                            {{ csrf_field() }}
                    <!-- imgprofile và tên -->
                    <div class="text-center" style="margin-left: 26px;">
                           @if (!File::exists(public_path("file/profileimg/".$dutu->profileimg))|| $dutu->profileimg==null )
                              <img id="preview" class="profile-user-img img-fluid img-circle" src="{{asset('file/profileimg/noavatar.png')}}" alt="User profile picture" style="margin-right: -100px;" />
                              @else 
                              <img id="preview" class="profile-user-img img-fluid img-circle" src="{{ asset('file/profileimg/' . $dutu->profileimg) }}" alt="User profile picture" style="margin-right: -100px;" />
                              
                          @endif
                      <label id="c_image" class="btn fa fa-camera" for="my-file-selector"> 
                      <input name="profileimg" id="my-file-selector" type="file" style="display:none">
                      </label>
                      <span class='label label-info' id="upload-file-info" style="display: none;" ></span>
                    </div>
                    <div class="row text-center" style="margin-bottom: 15px;">
                      <div class="col-sm-6 text-center" style="width: 100%">
                        <input name="holyname" type="text" class="form-control profile-username thongtinten" value="{{$dutu->holyname}}" disabled placeholder="Chưa có"> 
                        <input name="name" type="text" class="form-control profile-username thongtinten" value="{{$dutu->fullname}} {{$dutu->name}}" disabled placeholder="Chưa có">
                      </div>
                    </div>
                    <!-- ket thuc imgprofile và tên  -->

                    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                      <div class="row">
                        <div class="card-body table-responsive p-0">
                          <table class="table table-hover text-nowrap table-bordered">
                            <tbody>
                             <tr>
                              <td style="width:50%">
                                <a class="float-left" >Giáo xứ</a> <b class="float-right"><input name="parish" type="text" class="form-control thongtin" disabled value="{{$dutu->parish}}" placeholder="Chưa có"> </b> 
                              </td>
                              <td style="width:50%">
                                <a class="float-left">Nhóm</a> <b class="float-right">
                                  <select id="idzone" type="text" class="form-control thongtin @error('idzone') is-invalid @enderror" name="idzone" value="{{$dutu->namezone->name}}" autocomplete="idzone" autofocus   style="width: 100%;" disabled required>
                                  @foreach($zone as $z)
                                  <option value="{{$z->id}}" @if($dutu->idzone == $z->id) selected @endif >{{$z->name}}</option>
                                  @endforeach
                                      
                                  </select>
                                 </b> 
                              </td>
                             </tr>
                             <tr>
                              <td style="width:50%">
                                <a class="float-left">Email</a> <b class="float-right"><input style="max-width: 195px;" name="email" type="text" class="form-control thongtin" disabled value="{{$dutu->getuser->email}}" placeholder="Chưa có"></b> 
                              </td>
                              <td style="width:50%">
                                <a class="float-left">Ngày sinh</a> <b class="float-right"><input name="dob" type="text" onmouseover="(this.type='date')" onmouseout="(this.type='text')" id="example-date-input dob" class="form-control thongtin" disabled value="{{$dutu->dob}}" placeholder="Chưa có"></b> 
                              </td>
                             </tr>
                             <tr>
                              <td style="width:50%">
                                <a class="float-left">Trường học</a> <b class="float-right"><input name="school" type="text" class="form-control thongtin" disabled value="Bôn Ba" placeholder="Chưa có"></b> 
                              </td>
                              <td style="width:50%">
                                <a class="float-left">Ngành học</a> <b class="float-right"><input name="majors" type="text" class="form-control thongtin" disabled value="{{$dutu->majors}}" placeholder="Chưa có"></b> 
                              </td>
                             </tr>
                             <tr>
                              <td style="width:50%">
                               <a class="float-left">Trạng thái</a> 
                                    @if(Auth::user()->hasRole('superadministrator|administrator')) 
                                      <input name="idstatus" @if($dutu->idstatus == 1) checked @endif style="float: right; width: 24px;" class="form-control thongtin" type='checkbox' disabled id='checkboxSuccess3'>
                                    @else
                                      @if($dutu->idstatus==1) <p style="float: right;color: blue;">Đang sinh hoạt</p>  @else <p style="float: right;color: red;">Chờ duyệt</p>  @endif
                                    @endif
                              </td>
                              <td style="width:50%">
                                <a class="float-left">Năm dự tu</a> 
                                @if(Auth::user()->hasRole('superadministrator|administrator'))
                                  <select  id="idyear" disabled type="text" class="form-control thongtin @error('idyear') is-invalid @enderror" name="idyear" value="{{$dutu->nameyear->name}}" autocomplete="idyear" autofocus style="width: 100%; float: right;" required>
                                    @foreach($year as $y)
                                      <option value="{{$y->id}}" @if($dutu->idyear == $y->id) selected @endif>{{$y->name}}</option>
                                    @endforeach
                                  </select>
                                @else
                                  <p style="float: right;">{{$dutu->nameyear->name}}</p>
                                @endif
                              </td>
                             </tr>
                             <tr>
                               <td>
                                 <a class="float-left">Số điện thoại</a> <b class="float-right"><input name="phonenumber" type="text" class="form-control thongtin" disabled  placeholder="Chưa có" value="{{$dutu->phonenumber}}"></b> 
                               </td>
                               <td></td>
                             </tr>
                          </tbody></table>
                        </div>
                        <button type="submit" value="submit" style="float: right; margin-left: 2%" name="btnsave" id="btnsave" class="btn btn-primary">Lưu</button>
                        <a style="float: right" id="btnedit" class="btn btn-primary">Chỉnh sửa</a>
                      </div> <!-- đóng div row -->
                    </div> <!-- đóng div col-12 -->
                  </form>
                </div>
              </div> <!-- đóng div card-body box-profile -->
            </div>
          </div>
        </section>
          <!-- end info -->
      </div>
      <div id="attend" class="tab-pane fade">
          <!--   điểm danh -->
                 <?php 
                    $nh ;
                    $thang = date("m",strtotime(now()));
                    $nam = date("Y",strtotime(now()));
                    if ($thang<9) {
                      $nh = ($nam-1).'-'.$nam;
                    } else {
                      $nh = $nam.'-'.($nam+1);
                    }
                  ?>
        <div class="col-sm-12">
          <div class="row">
            <div class="card" style="min-width: 100%">
              <div class="card-header">
                <h3 class="card-title">Thông tin điểm danh năm học {{$nh}}</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100%;display: flex;">
                    <p>Tỷ lệ vắng: </p>
                    <p style="    padding-left: 25px;color: #ff0202;font-weight: 900;" id="tyle_vang"></p>
                  </div>
                </div>
              </div> <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table style="text-align: center;" class="table table-hover text-nowrap table-bordered">
                  <thead>
                    <tr>
                      @for($i=9;$i<=20; $i++)
                      <th>T @if($i>12) {{$i-12}} @else {{$i}} @endif</th>
                      @endfor
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="at_tr">
                      @for($k=1;$k<=12;$k++)
                      <td class="at_td"></td>
                      @endfor
                    </tr>
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div> <!-- card -->
          </div> <!-- row -->
        </div>
  <!-- kết thúc điểm danh -->
      </div>
      <div id="score" class="tab-pane fade">
          <!-- điểm -->
        <div class="col-sm-12">
          <div class="row">
            <div class="card" style="min-width: 100%">
              <div class="card-header">
                <h3 class="card-title">Thông tin điểm thi</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100%;display: flex;">
                    <p>Điểm trung bình: </p>
                    <p style="    padding-left: 25px;color: #ff0202;font-weight: 900;" id="diemtb"> {{$dutu->getdiem->avg('diem')}}</p>
                  </div>
                </div>
              </div> <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table style="text-align: center;" class="table table-hover text-nowrap table-bordered">
                  <thead>
                  </thead>
                  <tbody>
                    <tr >
                      <td >Điểm năm 1
                      </td>   
                      <td>@if($dutu->getdiem->where('idnam',1)->first()) 
                        {{$dutu->getdiem->where('idnam',1)->first()->diem }}
                        @else Chưa có điểm @endif
                      </td>       
                    </tr>
                    <tr >
                      <td >Điểm năm 2
                      </td>   
                      <td>@if($dutu->getdiem->where('idnam',2)->first()) 
                            {{$dutu->getdiem->where('idnam',2)->first()->diem}}
                            @else Chưa có điểm @endif
                      </td>       
                    </tr>
                    <tr >
                      <td >Điểm năm 3
                      </td>   
                      <td>
                        @if($dutu->getdiem->where('idnam',3)->first()) 
                          {{$dutu->getdiem->where('idnam',3)->first()->diem }}
                          @else Chưa có điểm @endif
                      </td>       
                    </tr>
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div>
          </div>
        </div>
  <!-- kết thúc điểm -->
      </div>
      <div id="papers" class="tab-pane fade">
  <!-- / giấy tờ -->
        <div class="col-sm-12">
        <div class="row">
          <div class="card" style="min-width: 100%">
            <div class="card-header">
              <h3 class="card-title">Thông tin giấy tờ</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="hidden" value="{{$ind=0}}">
                  @if(Auth::user()->hasRole('superadministrator|administrator')) 
                  <button  id="ppedit" class="btn btn-primary" onclick="edithien()">Chỉnh sửa</button>
                  <button style="margin-left: 2%" type="submit" value="submit"  name="ppsave" id="ppsave" disabled class="btn btn-primary">Lưu
                  </button>
                  @endif
                </div>
              </div>
            </div> <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table">
                <tbody>
                  @foreach($lstpaper as $paper)
                  <tr>
                    <th style="width:30%">{{$paper->name}}</th>
                    <td>
                      <input class="chk_pp" style="width:auto;height: auto;" name="{{$paper->id}}" type='checkbox' disabled id='checkboxSuccess3 chk_pp'
                      @if($paper->getpaper->where('iddutu',$dutu->id)->first())
                      @if($paper->getpaper->where('iddutu',$dutu->id)->first()->status == 1) checked {{$ind+=1}} @endif @endif>
                    </td>
                          <!-- <th style="width:50%">Chứng thư rửa tội:</th>
                          <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td>  -->
                  </tr>
                  @endforeach
                  @if($lstpaper->count()>$ind)
                  <tr style="background-color: red;color: floralwhite;border-style: solid;">
                    <th style="width:50%">Còn thiếu: </th>
                    <td>{{($lstpaper->count())-$ind}} loại giấy tờ CHƯA NỘP</td>
                  </tr>
                  @endif

                </tbody>
              </table>
            </div> <!-- /.card-body -->
          </div>
        </div>
        </div>
          <!-- /kết thúc giấy tờ -->
      </div>
    </div>
      <script>
      $(document).ready(function(){
        $(".nav-tabs a").click(function(){
          $(this).tab('show');
        });
      });
      </script>

<!-- endtab -->         
   </div><!-- /.left container -->
  </section>
  <!-- thieu div container day -->
 <!--  hết phần bên trái -->
 <!--  Phần bên phải -->
      <section class="col-lg-3 col-md-3 col-sm-3">
        <aside class="right_content">
          <div class="latest_post">
          <h2><span>Thông báo</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              
              <li>
                <div class="media"> <a href="#" class="media-left">  </a>
                  <div class="media-body"> <a href="#" class="catg_title"> ssss</a> </div>
                  <div class="media-body"> <a href="#" class="catg_title"> sssss</a> </div>
                </div>
              </li>
              
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
        </aside>
      </section>
    </div>
  </section>
  @include('user.layout.footer')
</div>
<script type="text/javascript">
//checkbox su kien status name
    $("#customSwitch3").click( function(){
       if( $(this).is(':checked') ){
        $('#statusname').text("Đang Sinh Hoạt");
       }
       else{
        $('#statusname').text("Đang Chờ Duyệt");
       }
    });

    $('#btnedit').click(function(){
      $('.thongtin').removeAttr("disabled");
      $('.thongtinten').removeAttr("disabled");
      $('#c_image').css("visibility","visible")
      $('.thongtin').css("border","solid #007bff 1px");
      $('.thongtinten').css("border","solid #007bff 1px");
})
</script>
<script type="text/javascript">
  // ẩn hiện chỉnh sửa giấy tờ
  function edithien(){
    $(".chk_pp").removeAttr("disabled");
    $("#ppsave").removeAttr("disabled");
  }
</script>
<script type="text/javascript">
     $(document).ready(function () {
      // PHẦN ĐIỂM DANH: gán data cho điểm danh
      var uncheck = "<input type='checkbox' disabled id='checkboxSuccess3'>";
      var hacheck = "<input type='checkbox' checked disabled id='checkboxSuccess3'>";
      var vang = 0, comat=0;
      var tero = $("#at_tr");      
      const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12];
      <?php 
        $n;
        $thang = date("m",strtotime(now()));
        $nam = date("Y",strtotime(now()));
        if ($thang<9) {
          $n = ($nam-1).'-'.$nam;
        } else {
          $n = $nam.'-'.($nam+1);
        }
      ?> ;
      var data = <?php echo $dutu->getattend->where('year',$n) ?>;
      Object.values(data).forEach(function(j){
        var note1 = "<p class='notep';>"+j.note+"</p>";

            numbers.forEach(function(k) {
               if (j.month==k) {
                if (j.month >= 9) {
                  k=k-9;
                }
                if(j.month < 9){
                  k=k+12-9;
                }
                if (j.status==1) {
                    comat+=1;
                    tero.find("td").eq(k).append(hacheck);
                    tero.find("td").eq(k).append(note1);
                   }
                if (j.status==0) {
                    vang+=1;
                    tero.find("td").eq(k).append(uncheck);
                    tero.find("td").eq(k).append(note1);
                   }
               }  
            })
        });
      var phantram;
      if(Object.keys(data).length===0){
        phantram = "Chưa có số liệu điểm danh";
      }
      else{
        phantram = ((vang*100)/Object.keys(data).length).toFixed(2)+"%";
      }
      var tyle_vang = vang+"/"+Object.keys(data).length ;
       $("#tyle_vang").text(tyle_vang+ " ("+phantram+ " )");
  // KẾT THÚC PHẦN ĐIỂM DANH  
    
      // view img
      $('input[type="file"]').change(function(e) {
          var fileName = e.target.files[0].name;
          $("#file").val(fileName);
         //alert($("#upload-file-info").text())
          var reader = new FileReader();
          reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
          };
          // read the image file as a data URL.
          reader.readAsDataURL(this.files[0]);
      });


    // ajax chuyen du lieu
    // FORM CHỈNH SỬA THÔNG TIN SUBMIT
    var frm = $('#frmupdate');
    frm.submit(function (e) {
         $.ajaxSetup({
      headers: {
        'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
        e.preventDefault();

            var fdt = new FormData(this);
            $.ajax({
               type:'POST',
               url: "{{ route('update.dutu',$dutu->id) }}",
               data:fdt,
               cache:false,
               contentType: false,
               processData: false,
                success: function(response) 
                {
                  if(response==="success"){
                    toastr.success('Thành công!','THÔNG BÁO');
                  }
                  else{
                    var er = '';
                    $.each(response, function( index, value ) {
                      er += value[0] + '\n';
                    });
                    toastr.error(er,'THÔNG BÁO');
                  }
                  
                }
               
            });
        });
    // hết FORM CHỈNH SỬA THÔNG TIN SUBMIT
       function printErrorMsg(msg){
               $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
       }

        
     })
 </script>
 <!-- ajax chinh sua giay to -->
 <script type="text/javascript">
   $('#ppsave').click(function(){
      papersList = jQuery('input[class=chk_pp]')
          data = []
          for(i=0;i<papersList.length;i++) {
          std = {
            'idpaper': jQuery(papersList[i]).attr('name'),
            'status': jQuery(papersList[i]).prop('checked')
                }
                data.push(std)
              }
          
              $.post('{{ route('update.paper_dutu') }}',
                {'_token': "{{ csrf_token() }}",
                'iddutu': {{$dutu->id}},
                'data': JSON.stringify(data)} 
                ,function(data){
               console.log(JSON.stringify(data));
              });
   })
 </script>
 <!-- hết ajax chinh sua giay to -->

 <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
      
    </script>
</body>
</html>


 
