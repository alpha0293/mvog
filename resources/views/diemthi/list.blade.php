 <!-- Content Wrapper. Contains page content -->

 @extends('admin.layout.layout')
 @section('content')

 <!--------------------------------------------------------->
 <style type="text/css">
  .form-control{
    width: auto;
  }

</style>
<section class="content">
  <div class="container-fluid">
   <div class="row">
    <!-- het thu --> 
    <div class="col-md-12" id="danhsach_nhom">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title" id="addnhom_title">Danh sách điểm thi dự tu</h3>
          @if(isset($_GET['year'])) <h6 style="text-align: center;">Năm sinh hoạt: {{$_GET['year']}} </h6> @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12" >
              <div class="row">
               <?php
               if(isset($_GET['year'])){
                $getyear = $_GET['year'];
              }
              ?>
              <form onsubmit="return check()" class="form-group col-md-12" method="get" action="{{route('diemthi')}}" style="display: inline-flex;">
                <div class="form-group" style="margin-right: 5px;">

                  <div class="input-group mb-3"><!-- /btn-group -->
                    @if(isset($_GET['year']))
                    <select style="padding: 4px; border-color: red; color: red;" class="sl_at form-control" aria-label="Năm" name="year" id="year" title="Năm" onmousedown="oldsl()" onchange="locdata(this.value);" >
                      <option value="0">Năm học</option>
                      @for($i=2016; $i<=date("Y"); $i++)
                      @if(date("m")<9)
                      {{$a = ($i-1). "-" .$i}}
                      <option @if($a==$_GET['year']) selected @endif value="{{$a}}">{{$a}}</option>
                      @else
                      {{$a = ($i). "-" .($i+1)}}
                      <option @if($a==$_GET['year']) selected @endif value="{{$a}}">{{$a}}</option>
                      @endif
                      @endfor  
                    </select>
                    @else
                    <select style="border-color: red; color: red;" class="form-control" aria-label="Năm" name="year" id="year" title="Năm" class="sl_at" onmousedown="oldsl()" onchange="locdata(this.value);">
                      <option value="0" >Năm học</option>
                      @for($i=2016; $i<=date("Y"); $i++)
                      @if(date("m")<9)
                      {{$a = ($i-1). "-" .$i}}
                      <option @if($i==date("Y")) selected @endif value="{{$a}}">{{$a}}</option>
                      @else
                      {{$a = ($i). "-" .($i+1)}}
                      <option @if($i==date("Y")) selected @endif value="{{$a}}">{{$a}}</option>
                      @endif
                      @endfor
                    </select>
                    @endif
                    
                  </div>
                </div>

                <div class="form-group" style="width: auto; margin-right: 5px;">

                  <div class="input-group"><!-- /btn-group -->
                    <select class="sl_at form-control" aria-label="Vùng sinh hoạt" name="zone" id="sl_zone" title="Vùng sinh hoạt" onmousedown="oldsl()" onchange="locdata();">
                      <option value="0">Chọn vùng sinh hoạt</option>
                      @foreach($lstzone as $zone)
                      <option @if(isset($_GET['zone'])&& $zone->id == $_GET['zone']) selected @endif  value="{{$zone->id}}"> {{$zone->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group" style="width: auto; margin-right: 5px;">
                  <div class="input-group "><!-- /btn-group -->
                    <select class="form-control" aria-label="Năm sinh hoạt" name="yearsh" id="sl_yearsh" title="Năm sinh hoạt" class="sl_at" onmousedown="oldsl()" onchange="locdata();">
                      <option value="0">Chọn năm sinh hoạt</option>
                      @foreach($lstyear as $year)
                      <option @if(isset($_GET['yearsh']) && $year->id == $_GET['yearsh']) selected @endif value="{{$year->id}}">{{$year->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group " style="width: auto; margin-right: 5px;">
                  <div class="input-group "><!-- /btn-group -->
                    <button  id="btnloc" type="submit" class="btn btn-primary">Lọc</button>
                  </div>
                </div>
              </form>
              @if ($lstdutu->count()!=0)
              <button style="display: none; margin: 10px;" type="submit" class="form-control col-md-2 btn btn-success" id="btnsubmit" > Gửi điểm thi</buton>

               @endif
             </div>

           </div>
         </div>

         @if ($lstdutu->count()==0)
         <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
         @else
         <table id="tableID" class="table table-bordered table-striped">
           <thead>
            <tr>
              <th>STT</th>
              <th >Tên</th>
              <th >Giáo xứ</th>
              <th hidden="true" ></th>
              <th hidden="true" ></th>
              <th >Nhóm</th>
              <th >Năm dự tu</th>
              <th>Điểm Thi</th>
              <th style="display: none;" ></th>
              <th><button type="button" class="form-control btn btn-warning" id="showedit"> <i class="fas fa-edit" ></i></buton></th>
              </tr>
            </thead>
            <tbody>
              @foreach($lstdutu as $dutu)
              <tr>
                <td>{{$index++}}</td>
                <td name ="{{$dutu->id}}">{{$dutu->holyname}} {{$dutu->fullname}} {{$dutu->name}}</td>
                <td>{{$dutu->parish}}</td>
                <td hidden="true">{{$dutu->namezone->id}}</td>
                <td hidden="true">{{$dutu->nameyear->id}}</td>
                <td>{{$dutu->namezone->name}}</td>
                <td id="namdutu">{{$dutu->nameyear->name}}</td>
                <td class="showdiem">@if($dutu->getdiem->first()) {{$dutu->getdiem->first()->diem}} @else Chưa có thông tin @endif</td>
                <td style="display: none;" class="editdiem">@if($dutu->getdiem->first()) 
                  <input onmousedown="oldval(this.value, this.id)" onchange="newval(this.value, this.id)" type="number" min="0" name="{{$dutu->id}}" class="textdiem" namdutu="{{$dutu->nameyear->id}}" id="{{$dutu->id}}" value="{{$dutu->getdiem->first()->diem}}"> @else Chưa có thông tin @endif
                </td>
                <td>
                  <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{route('show.dutu',$dutu->id)}}"></a>                        
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

          @endif



          <!-- test thống kê điểm danh-->


          <!-- Kết thúc test-->

        </div>
        <!-- /.card-body -->

      </div>
    </div>
  </div>
</div>
</section>

<script type="text/javascript">
  var valold = [];
  var valnew = [];
  var oldzone;
  var oldyyearsh;

    // $("").ready(function(){
    //   var num1 = jQuery('input[type=number]');
    //      for(z=0;z < num1.length;z++) {
    //        numval.push(jQuery(num1[z]).val());
    //      }
    // })
    function oldval(val, idd){
      var obj1 = [];
      var ct=0;
      if(valold.length===0){
        obj1.id = idd;
        obj1.va = Number(val);
        valold.push(obj1);
      }
      else{
        for (var i = 0; i < valold.length; i++) {
          if(valold[i].id == idd){
           ct+=1;
           break;
         }

       }
       if (ct===0) {
         obj1.id = idd;
         obj1.va = Number(val);
         valold.push(obj1);
       }
     }
     console.log(valold); 
   }



   function newval(val, idd){
    var obj2 = [];
    var trung =0;
    if(valnew.length===0){
      obj2.id = idd;
      obj2.va = Number(val);
      valnew.push(obj2);
    }
    else{
      for (var i = 0; i < valnew.length; i++) {
        if(valnew[i].id === idd){
         valnew[i].id = idd;
         valnew[i].va = Number(val);
         trung+=1;
         break;
       }               
     }
     if(trung===0){
      obj2.id = idd;
      obj2.va = Number(val);
      valnew.push(obj2);
    }
  }
  console.log(valnew);
}
var SlVal;
function oldsl() {
  oldzone = $('#sl_zone').val(); 
  oldyear = $('#year').val(); 
  oldyearsh = $('#sl_yearsh').val(); 

}
function check() {
  var slz, sly, table, tr, td, i, slValue;
  slz = $('#sl_zone').val();
  sly = $('#sl_yearsh').val();
          // console.log(filter);
          table = $("#tableID");
          tr = $("tr");
          t = 0;
          for (var i = 0; i < valnew.length; i++) {
            for (var j = 0; j < valold.length; j++) {
              if (valold[j].id === valnew[i].id && Number(valnew[i].va) != Number(valold[j].va)) {
                t+=1;
                break;
              }
            } 

          }
          if(valnew.length>0){
            if(t>0){
              var thongbao = confirm("Bạn chưa lưu điểm vừa nhập, bạn có muốn rời trang?");
              if(thongbao)  {
                this.form.submit();

                return;
              } // thong bao
              else {
                $('#sl_yearsh').val(oldyearsh); //set back
                $('#sl_zone').val(oldzone); //set back
                $('#year').val(oldyear); //set back
                return false;
              }
            } //t>0
            else{
              this.form.submit();
            }
          }//valvew.lenght > 0
           // else if valnew.lenght > 0
           else{
            this.form.submit();
          }                

        }
      </script>
      <script type="text/javascript">
      // click nut chinh sua
      $('#showedit').click(function(){
        $('.showdiem').css('display','none');
        $('.editdiem').css('display','');
        $('#btnsubmit').css('display','');
      })
    </script>
    <script type="text/javascript">
      $("#btnsubmit").click(function(){
        var data = [];
        var ip = jQuery('input[type=number]')
        for(i=0;i < ip.length;i++) {
          if (jQuery(ip[i]).val()!=="") {
            std = {
              'iddutu': jQuery(ip[i]).attr('name'),
              'idnam': jQuery(ip[i]).attr('namdutu'),
              'diem': jQuery(ip[i]).val(),
              'nam': $("#year").val(),}
              data.push(std);
            }


          }
              // console.log(data);
              $.post('{{ route('save.diemthi') }}',
                {'_token': "{{ csrf_token() }}",
                'data': JSON.stringify(data)} 
                ,function(data){
                  toastr.success('Thành công!!!','THÔNG BÁO');
                  console.log(data);
                }).fail(function(data) {
                  console.log(data.responseText);
                });
              });
      

            </script>

            @endsection
