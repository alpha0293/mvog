
@extends('admin.layout.layout')
@section('content')
<style type="text/css">
  label:not(.form-check-label):not(.custom-file-label) {
    float: right;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
  <!-- /.row -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
             <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách những dự tu KHÔNG đủ điều kiện lên lớp</h3>
            <h5 style="text-align: center;">(Điều kiện lên lớp: vắng không quá 30% - điểm thi trên trung bình)</h5>
              <div  class="card-header">
                <button class="btn btn-danger" onclick="lenlopall()">Cho lên lớp tất cả</button>
              </div>
              
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0">

                <table id="table-post" class="table table-bordered table-hover">

                 <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên thành viên</th>
                    <th>Ngày sinh</th>
                    <th>Giáo xứ</th>
                    <th>Nhóm</th>
                    <th>Năm dự tu</th>
                    <th>Số lần vắng</th>
                    <th>Điểm</th>
                    <th>Điểm TB</th>
                    <th>Lên lớp</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                          @foreach ($lstdutu2 as $i)
                          <tr>
                            <td id="stt">{{$index++}}</td>
                            <td id="ten">{{$i['holyname'].' '.$i['fullname'].' '.$i['name']}}</td>
                            <td id=ns>{{$i['dob']}}</td>
                            <td id="xu">{{$i['parish']}}</td>
                            <td id="nhom">{{$i['namezone']['name']}}</td>
                            <td id="nhom">{{$i['nameyear']['name']}}</td>
                            <td id="tylevang">{{$i['vang']}}/{{$i['tongdiemdanh']}}<small class="badge badge-primary"></small></td>
                            <td>@if($i['getdiem']!=null) {{$i['getdiem'][0]['diem']}} @endif</td>
                            <td>{{$i['diemtb']}}</td>
                            <td> 
                              <div style="display: inline-grid;" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="{{$i['id']}}" onclick="lenlop({{$i['id']}},this.checked);">
                                <label class="custom-control-label" for="{{$i['id']}}"></label>
                        </div>
                            </td>
                          </tr>
                        @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
         
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       </div>
     </section>
     <!-- Bootstrap Switch -->
   

     <script type="text/javascript">
      
       function lenlop(id, value) {
        console.log(value);
        $.post('{{ route('lenlop') }}',
                {'_token': "{{ csrf_token() }}",
                'id': id,
                'value': value } 
                ,function(data){
                  console.log(data);
               //    toastr.success('Thành công!!!','THÔNG BÁO');
               // console.log(JSON.stringify(data));
              });
      }
      function lenlopall(){
        // console.log(value);
        $.post('{{ route('lenlopall') }}',
                {'_token': "{{ csrf_token() }}",
                } 
                ,function(data){
                  console.log(data);
               //    toastr.success('Thành công!!!','THÔNG BÁO');
               // console.log(JSON.stringify(data));
              });
        
      }
     </script>
      

@endsection