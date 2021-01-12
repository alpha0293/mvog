
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
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách những dự tu đủ điều kiện lên lớp </h3>
              <div  class="card-header">
                <button class="btn btn-primary" onclick="lenlopall()">Cho lên lớp tất cả</button>
              </div>
              
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0">

                <table id="table-post" class="table table-bordered table-hover">

                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên thánh</th>
                    <th>Tên thành viên(s)</th>
                    <th>Ngày sinh</th>
                    <th>Trường học</th>
                    <th>Ngành học</th>
                    <th>Giáo xứ</th>
                    <th>Năm dự tu</th>
                    <th>Nhóm</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                          @foreach ($lstlenlop as $i)
                          
                          <tr>
                            <input type="hidden" id="iddutu" name="iddutu" value="{{$i->id}}">
                            <td id="stt">{{$index++}}</td>
                            <td id="holyname">{{$i->holyname}}</td>
                            <td id="ten">{{$i->name}}</td>
                            <td id="ns">{{$i->dob}}</td>
                            <td id="truong">{{$i->school}}</td>
                            <td id="nganh">{{$i->majors}}</td>
                            <td id="xu">{{$i->parish}}</td>
                            <td id="nam">{{$i->nameyear->name}}</td>
                            <td id="nhom">{{$i->namezone->name}}</td>
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
       <script src="{{asset('admin_asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

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
