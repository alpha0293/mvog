 <!-- Content Wrapper. Contains page content -->

	@extends('admin.layout.layout')
	@section('content')
  
  <!--------------------------------------------------------->
   <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <!-- thu nhe -->        

        <!-- het thu --> 
        <div class="col-md-12" id="danhsach_nhom">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title" id="addnhom_title">Danh sách thành viên dự tu</h3>
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
                      <option value="0">Năm</option>
                      @for($i=2019; $i<=date("Y"); $i++)
                      <option @if($i==date("Y")) selected @endif value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                    </div>
                    
                  </div>
                </div>
               
                

				@if (is_null($iddt->first->getattend))
					<h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
				@else
					<table id="example1" class="table table-bordered table-striped">
					  <thead>
					  <tr>
						<th>STT</th>
						<th>Tên thành viên</th>
						@for($i=1;$i<=12; $i++)
							<th>T {{$i}}</th>
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
  </div>

  <script type="text/javascript">
    $('#year').change(function(){
    var nam =$('#year').val();
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
        console.log(data[0]);
        data[1].forEach(function(j){
          if (i.id == j.iddutu && j.year == nam ) {
            numbers.forEach(function(k) {
               if (j.month==k) {
                if (j.status==1) {
                    tero.find("td").eq(k+1).append(hacheck);
                   }
                if (j.status==0) {
                    tero.find("td").eq(k+1).append(uncheck);
                   }
               }  
            })
          } 
        });
        tero = tero.next();
      });
    })
    
    $(document).ready(function(){
      var nam =$('#year').val();
      var uncheck = "<input type='checkbox' disabled id='checkboxSuccess3'>";
      var hacheck = "<input type='checkbox' checked disabled id='checkboxSuccess3'>";
      var tero = $('tr');      
      const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12];
      var data1 = {{$iddt}};
      var data2 = {{$izone}};
      data1.forEach(function(i){ 
        console.log(data1);
        data2.forEach(function(j){
          if (i.id == j.iddutu && j.year == nam ) {
            numbers.forEach(function(k) {
               if (j.month==k) {
                if (j.status==1) {
                    tero.find("td").eq(k+1).append(hacheck);
                   }
                if (j.status==0) {
                    tero.find("td").eq(k+1).append(uncheck);
                   }
               }  
            })
          } 
        });
        tero = tero.next();
      });
      
    })
  </script>


  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  @endsection

  