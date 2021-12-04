 <!-- Content Wrapper. Contains page content -->

 @extends('admin.layout.layout')
 @section('content')

 <!--------------------------------------------------------->
 <style type="text/css">
  #tableID_filter label {
    display: inline-block;
  }
  #tableID_filter label input.form-control.form-control-sm {
    margin-left: 0px; 
  }
</style>
<section class="content">
  <div class="container-fluid">
   <div class="row">
    <!-- het thu --> 
    <div class="col-md-12" id="danhsach_nhom">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title" id="addnhom_title">Danh sách cần xét duyệt vào dự tu</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row"> 
             <button class="btn btn-primary" style="margin: 1%;width: auto;" onclick="xetduyetall()">Chấp nhận tất cả</button>
           </br>
            <div class="col-md-7" >
              <div class="row">

              </div>

            </div>
          </div>

          @if (is_null($lstxetduyet))
          <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
          @else
          <table id="tableID" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Trường học</th>
                <th>Giáo xứ</th>
                <th>Năm dự tu</th>
                <th hidden="true"></th>
                <th>Nhóm</th>
                <th hidden="true"></th>
                <th>Xét duyệt</th>
                <th>Từ chối</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($lstxetduyet as $i)
              <tr>
                <td id="stt">{{$index++}}</td>
                <td id="ma">{{$i->holyname.' '.$i->fullname.' '.$i->name}}</td>
                <td id=ns>{{$i->dob}}</td>
                <td id="truong">{{$i->school}}</td>
                <td id="xu">{{$i->parish}}</td>
                <td id="nam">{{$i->nameyear->name}}</td>
                <td hidden="true">{{$i->namezone->id}}</td>
                <td id="nhom">{{$i->namezone->name}}</td>
                <td hidden="true" id="id" ma="$i->id">{{$i->parish}}</td>
                <td>
                  <div style="display: inline-grid;" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input" id="{{$i->id}}" onclick="xetduyet({{$i->id}},this.checked);">
                    <label class="custom-control-label" style="cursor: pointer;" for="{{$i->id}}"></label>
                  </div>
                </td>
                <td>
                  <a class="fas fa-ban" style="color:red;" href="{{route('delete.post',$post->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');" title="Xóa"></a>
                  <i class="fas fa-ban" style="color: red;font-size: larger;cursor: pointer;" aria-hidden="true"></i>
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
  $('#sl_zone').change( function(){
    var sl, filter, table, tr, td, i, slValue;
    sl = $('#sl_zone');
    filter = sl.val();
    console.log(filter);
    table = $("#tableID");
    tr = $("tr");
    if (filter === '0') {
     $ ('tr').show ();
   }
   else{
    for (i = 1; i < tr.length; i++) {
      td = tr[i].children[7];
      if (td) {
       slValue = td.textContent || td.innerText; 
                     // console.log(slValue);
                     if (slValue.toUpperCase() === filter) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }       
                }
              }

            });

          </script>
          <script type="text/javascript">

           function xetduyet(id, value) {
            console.log(value);
            $.post('{{ route('onxetduyet') }}',
              {'_token': "{{ csrf_token() }}",
              'id': id,
              'value': value } 
              ,function(data){
                console.log(data);
               //    toastr.success('Thành công!!!','THÔNG BÁO');
               // console.log(JSON.stringify(data));
             });
          }
          function xetduyetall(){
        dutuList = $('[id="id"]')
          data = []
          for(i=0;i<dutuList.length;i++) {
          std = {
            'id': jQuery(dutuList[i]).attr('ma')
           }
                data.push(std)
              }
         
        $.post('{{ route('xetduyetall') }}',
                {'_token': "{{ csrf_token() }}",
                'data': JSON.stringify(data)
                } 
                ,function(data){
                  console.log(data);
               //    toastr.success('Thành công!!!','THÔNG BÁO');
               // console.log(JSON.stringify(data));
              });
        
      }


        </script>
        @endsection


