
<!DOCTYPE html>
<html lang="vi">
<head>
   @include('user.layout.head')
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
   @include('user.layout.script')
</head>

<body>


   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->
 
<div class="container">
   @include('user.layout.header')
   @include('user.layout.menu')
   @include('user.layout.chuchay')
  <section id="sliderSection">
    
  </section>
  <section id="contentSection">
    <div class="row">
       <section class="col-lg-9 col-md-9 col-sm-9">
    <div class="left_content">
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Profile</h1>
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
    <section class="content">
      <div class="container-fluid">
   
        <div style="min-height: 100%;" class="card card-primary card-outline">
         
                  <div class="card-body box-profile">
                    <div class="text-center" >
                      <form id="frmupdate">
                        {{ csrf_field() }}
                        <div class="text-center" style="margin-left: 26px;">
                       @if (File::exists(public_path("file/profileimg/".$dutu->profileimg)))
                          <img id="preview" class="profile-user-img img-fluid img-circle" src="{{ asset('file/profileimg/' . $dutu->profileimg) }}" alt="User profile picture" style="margin-right: -100px;" />
                          @else 
                          <img id="preview" class="profile-user-img img-fluid img-circle" src="http://127.0.0.1/mvog/public/file/profileimg/noavatar.png" alt="User profile picture" style="margin-right: -100px;" />
                      @endif
                      <label id="c_image" class="btn fa fa-camera" for="my-file-selector"> 
                      <input name="profileimg" id="my-file-selector" type="file" style="display:none" 
                      >
                      </label>
                      <span class='label label-info' id="upload-file-info" style="display: none;" ></span>
                          
                    </div>
                    
                    <div class="row text-center" style="margin-bottom: 15px;">
                      <div class="col-sm-6 text-center" style="width: 100%">
                        <input name="holyname" type="text" class="form-control profile-username thongtinten" value="{{$dutu->holyname}}" disabled placeholder="Chưa có"> 
                      <input name="name" type="text" class="form-control profile-username thongtinten" value="{{$dutu->name}}" disabled placeholder="Chưa có">
                      </div>
                    </div>
                    <div class="row">
                      <div style="padding:0;" class="col-xs-6 col-md-6">
                      <ul style="padding-right: 5%; padding-left: 2%; border-left: outset #1586ffb5;" class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <a class="float-left">Giáo xứ</a> <b class="float-right"><input name="parish" type="text" class="form-control thongtin" disabled value="{{$dutu->parish}}" placeholder="Chưa có"> </b> 
                      </li>
                      <li class="list-group-item">
                        <a class="float-left">Nhóm</a> <b class="float-right">
                          <select id="idzone" type="text" class="form-control thongtin @error('idzone') is-invalid @enderror" name="idzone" value="{{$dutu->namezone->name}}" autocomplete="idzone" autofocus   style="width: 100%;" required>
                              @foreach($zone as $z)
                              <option value="{{$z->id}}" @if($dutu->idzone == $z->id) selected @endif >{{$z->name}}</option>
                              @endforeach
                                  
                        </select>
                        </b> 
                      </li>
                      <li class="list-group-item">
                        <a class="float-left">Năm dự tu</a> <b class="float-right">
                          <select id="idyear" disabled type="text" class="form-control thongtin @error('idyear') is-invalid @enderror" name="idyear" value="{{$dutu->nameyear->name}}" autocomplete="idyear" autofocus   style="width: 100%;" required>
                            @foreach($year as $y)
                            <option value="{{$y->id}}" @if($dutu->idyear == $y->id) selected @endif>{{$y->name}}</option>
                          @endforeach
                         </select>
                        </b> 
                      </li>
                      <li class="list-group-item">
                        <a class="float-left">Ngày sinh</a> <b class="float-right"><input name="dob" type="text" onmouseover="(this.type='date')" onmouseout="(this.type='text')" id="example-date-input dob" class="form-control thongtin" disabled value="{{$dutu->dob}}" placeholder="Chưa có"></b> 
                      </li>
                    </ul>
                    </div>
                    <div style="padding:0" class="col-xs-6 col-md-6">
                      <ul style="padding-right: 5%; padding-left: 2%; border-left: outset #1586ffb5;" class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <a class="float-left">Email</a> <b class="float-right"><input style="max-width: 195px;" name="email" type="text" class="form-control thongtin" disabled value="{{$user->email}}" placeholder="Chưa có"></b> 
                      </li>
                      <li class="list-group-item">
                        <a class="float-left">Trường học</a> <b class="float-right"><input name="school" type="text" class="form-control thongtin" disabled value="Bôn Ba" placeholder="Chưa có"></b> 
                      </li>
                      <li class="list-group-item">
                        <a class="float-left">Ngành học</a> <b class="float-right"><input name="majors" type="text" class="form-control thongtin" disabled value="{{$dutu->majors}}" placeholder="Chưa có"></b> 
                      </li>
                      <li class="list-group-item">
                        <a class="float-left">Trạng thái</a> <b class="float-right"><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                       @if($dutu->idstatus==1)
                        <input type="checkbox" name="idstatus" checked="checked" disabled class="custom-control-input thongtin" id="customSwitch3">
                        <label style="border: none;" class="form-control thongtin custom-control-label" id="statusname" for="customSwitch3">{{$dutu->namestatus->name}}</label>
                       @else 
                       <input type="checkbox" name="idstatus" disabled class="custom-control-input thongtin" id="customSwitch3">
                        <label  style="border: none;" class="form-control thongtin custom-control-label" id="statusname" for="customSwitch3">{{$dutu->namestatus->name}}</label>
                        @endif
                    </div></b> 


                      </li>
                      
                    </ul>
                    </div>
                    </div>
                    <button type="submit" value="submit" style="float: right; margin-left: 2%" name="btnsave" id="btnsave" class="btn btn-primary">Lưu</button>
                    </form>
                    <button style="float: right" id="btnedit" class="btn btn-primary">Chỉnh sửa</button>
                  </div>
                  <!-- /.card-body -->
                </div>
            

          <div class="col-sm-12">
            <div class="row">
              <div class="card" style="min-width: 100%">
              <div class="card-header">
                <h3 class="card-title">Thông tin điểm danh</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table style="text-align: center;" class="table table-hover text-nowrap table-bordered">
                  <thead>
                    <tr>
                      <th>T1</th>
                      <th>T2</th>
                      <th>T3</th>
                      <th>T4</th>
                      <th>T5</th>
                      <th>T6</th>
                      <th>T7</th>
                      <th>T8</th>
                      <th>T10</th>
                      <th>T11</th>
                      <th>T12</th>
                      <th>T13</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                      <td><input type='checkbox' disabled id='checkboxSuccess3'> <p style="min-width: 63px; width: 100%;white-space: normal;word-break: break-word;">ngủ quên fdsa sadf sdaf sdf sdf sadf sadf sadf sadf ádf</p></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-sm-12">
            <div class="row">
              <div class="card" style="min-width: 100%">
              <div class="card-header">
                <h3 class="card-title">Thông tin giấy tờ</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                    <table class="table">
                      <tbody>
                        <tr>
                        <th style="width:50%">Đơn dự tu:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td>
                        <th style="width:50%">Chứng thư rửa tội:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td> 
                      </tr>
                      <tr>
                        <th style="width:50%">Đơn dự tu:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td>
                        <th style="width:50%">Chứng thư rửa tội:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td> 
                      </tr>
                      <tr>
                        <th style="width:50%">Đơn dự tu:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td>
                        <th style="width:50%">Chứng thư rửa tội:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td> 
                      </tr>
                      <tr>
                        <th style="width:50%">Đơn dự tu:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td>
                        <th style="width:50%">Chứng thư rửa tội:</th>
                        <td><input style="width:auto;height: auto;" type='checkbox' disabled id='checkboxSuccess3'></td> 
                      </tr>
                    </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
  </section>
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
     $(document).ready(function () {
      // set date for textbox date ò birth
      // end setdate
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
      var frm = $('#frmupdate');
 // submit form
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
             
                 complete: function(response) 
                {
                  console.log(response.responseText);
                  //alert();
                  
                    // if($.isEmptyObject(response.responseJSON.error)){
                    //         $('.success').show();
                    //        setTimeout(function(){
                    //        $('.success').hide();
                    //     }, 5000);
                    // }else{
                    //     printErrorMsg(response.responseJSON.error);
                    // }
                }

            });
        });
       function printErrorMsg(msg){
               $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
       }
        
     })
    </script>
       
    </div>
  </section>
  @include('user.layout.footer')
</div>

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


 
