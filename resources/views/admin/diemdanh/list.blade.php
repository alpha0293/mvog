 <!-- Content Wrapper. Contains page content -->

  @extends('admin.layout.layout')
  @section('content')
  
  <!--------------------------------------------------------->

    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <!-- thu nhe -->

        <div class="container">
 
 
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Nội dung form đăng nhập -->
        <div class="modal-content" style="width: 40%">
            <form action="#">
                <span class="close">&times;</span>
                <h2 id="tieude_add">Thêm nhóm mới</h2>
                
                
                <div class="fomrgroup">
                    <span>Mã nhóm:</span>
                    <input class="form-control" placeholder="Mã nhóm ..." disabled="" name="manhom">
                </div>
                <div class="fomrgroup">
                    <span>Tên nhóm:</span>
                    <input type="text" class="form-control" placeholder="Nhập tên nhóm ..." name="tennhom">
                </div>
                 </form>
                 <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm nhóm</button>
                
                 </div>
           
        </div>
    </div>
</div>
        

        <!-- het thu --> 
        <div class="col-md-12" id="danhsach_nhom">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title" id="addnhom_title">Danh sách thành viên dự tu</h3>

                @if(session('message'))
                <h4>{{session('message')}}</h4>                  
                @endif





              </div>

              

              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5" >
                    <button type="button" class="btn btn-outline-primary fa fa-plus-square" id="myBtn">  Thêm thành viên</button>
                    <button type="button" class="btn btn-outline-warning fas fa-file-word" id="xxx">  Xuất file</button>
                  </div>
                  <div class="col-md-7" >
                    <div class="row">
                    <div class="form-group col-md-3">
                       <select  id="sl_xu" class="select2bs4" data-placeholder="  Giáo xứ" 
                          style="width: 100%;">
                         <option value="">Giáo xứ</option>
                         <option>Khe Gát</option>
                         <option>Đồng Trooc</option>
                         <option>Văn Hạnh</option>
                         <option>Trại Lê</option>
                         <option>Chân Thành</option>
                         <option>Kinh Nhuận</option>
                         <option>Sen Bàng</option>
                       </select>
                    </div>
                    <div class="form-group col-md-3">
                       <select id="sl_nhom" class="select2bs4" data-placeholder="  Nhóm sinh hoạt"
                          style="width: 100%;">
                         <option value="">Nhóm sinh hoạt</option>
                         <option>Vinh</option>
                         <option>Huế</option>
                         <option>Sài Gòn</option>
                         <option>Đà Nẵng</option>
                         <option>Hà Nội</option>
                       </select>
                    </div>
                    <div class="form-group col-md-3">
                       <select id="sl_nam" class="select2bs4" data-placeholder="  Năm sinh hoạt"
                          style="width: 100%;">
                         <option value="">Năm sinh hoạt</option>
                         <option>Năm 1</option>
                         <option>Năm 2</option>
                         <option>Năm 3</option>
                         <option>Đã hoàn thành</option>
                       </select>
                    </div>
                    <div class="form-group col-md-3">
                       <button type="button" id="loc" class="btn btn-primary"><i class='fas fa-filter'></i>   Lọc</button>
                    </div>
                   <select aria-label="Năm" name="year" id="year" title="Năm" class="sl_at">
                      <option value="0">Năm học</option>
                      @for($i=2016; $i<=date("Y"); $i++)
                      @if(date("m")<9)
                      <option @if($i==date("Y")) selected @endif value="{{$i-1}}-{{$i}}">{{$i-1}}-{{$i}}</option>
                      @else
                      <option @if($i==date("Y")) selected @endif value="{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>
                      @endif
                      @endfor
                    </select>
                    </div>
                    
                  </div>
                </div>
               
                @if (is_null($izone->first->attend))
                  <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
                @else
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                      <th>STT</th>
                      <th>Tên thành viên</th>
                      @for($i=9;$i<=20; $i++)
                        <th>T @if($i>12) {{$i-12}} @else {{$i}} @endif</th>
                      @endfor           
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($iddt as $i)
                        <tr>
                          <td id="stt">{{$index++}}</td>
                          <td id="ten">{{$i->name}}</td>
                                  @for($k=1;$k<=12;$k++)
                            <td></td>
                                  @endfor

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
    $('#year').change(function(){
      
    //const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    //let sum = 0;
    //numbers.forEach(function(element){ 
    //});
    var nam =$('#year').val();
      $.get("{{ route('gety') }}",{year: nam},function(data){
        console.log(nam);
      var uncheck = "<input type='checkbox' disabled id='checkboxSuccess3'>";
      var hacheck = "<input type='checkbox' checked disabled id='checkboxSuccess3'>";
      var tero = $('tr');
      var tero1=$("tr");
      for (var i = 0; i < data[0].length; i++){
         for (var h = 2; h <= 14; h++) {
          tero1.find("td").eq(h).children().remove();
          
          }   
          tero1 = tero1.next();
      }
      const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12];
      data[0].forEach(function(i){ 
        //console.log(data[1]);
        data[1].forEach(function(j){
          if (i.id == j.iddutu && j.year == nam ) {
            numbers.forEach(function(k) {
               if (j.month==k) {
                if (j.month >= 9) {
                  k=k-7;
                }
                if(j.month < 9){
                  k=k+12-7;
                }
                if (j.status==1) {
                    tero.find("td").eq(k).append(hacheck);
                   }
                if (j.status==0) {
                    tero.find("td").eq(k).append(uncheck);
                   }
               }  
            })
          } 
        });
        tero = tero.next();
      });
      })
    })
    
    $(document).ready(function(){
      var nam =$('#year').val();
      $.get("{{ route('gety') }}",{year: nam},function(data){
      var uncheck = "<input type='checkbox' disabled id='checkboxSuccess3'>";
      var hacheck = "<input type='checkbox' checked disabled id='checkboxSuccess3'>";
      var tero = $('tr');      
      const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12];
      data[0].forEach(function(i){ 
        //console.log(data[1]);
        data[1].forEach(function(j){
          if (i.id == j.iddutu && j.year == nam ) {
            numbers.forEach(function(k) {
               if (j.month==k) {
                if (j.month >= 9) {
                  k=k-7;
                }
                if(j.month < 9){
                  k=k+12-7;
                }
                if (j.status==1) {
                    tero.find("td").eq(k).append(hacheck);
                   }
                if (j.status==0) {
                    tero.find("td").eq(k).append(uncheck);
                   }
               }  
            })
          } 
        });
        tero = tero.next();
      });
      })
    })
  </script>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  @endsection

  