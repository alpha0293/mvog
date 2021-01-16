 <!-- Content Wrapper. Contains page content -->

  @extends('admin.layout.layout')
  @section('content')
  
  <!--------------------------------------------------------->

    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <!-- het thu --> 
        <div class="col-md-12" id="danhsach_nhom">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title" id="addnhom_title">Danh sách Chọn nhóm trưởng</h3>
                @if(session('message'))
                <h4>{{session('message')}}</h4>                  
                @endif
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12" >
                    <div class="row">
                   
                    <div class="form-group col-md-2">
                        <select style="border-color: red; color: red;" class="form-control" aria-label="Năm" name="year" id="year" title="Năm" class="sl_at" >
					        <option value="0" >Năm học</option>
					                      @for($i=2016; $i<=date("Y"); $i++)
					                      @if(date("m")<9)
					                      <option @if($i==date("Y")) selected @endif value="{{$i-1}}-{{$i}}">{{$i-1}}-{{$i}}</option>
					                      @else
					                      <option @if($i==date("Y")) selected @endif value="{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>
					                      @endif
					                      @endfor
					      </select>

					 </div>
					 <div class="form-group col-md-3">
                        <select class="form-control" aria-label="Vùng sinh hoạt" name="zone" id="sl_zone" title="Vùng sinh hoạt" class="sl_at" onchange="locdata()">
                            <option value="0">Chọn vùng sinh hoạt</option>
                            @foreach($lstzone as $zone)
                              <option value="{{$zone->id}}">{{$zone->name}}</option>
                            @endforeach
                      </select>
					 </div>
					 <div class="form-group col-md-3">
                        <select class="form-control" aria-label="Năm sinh hoạt" name="yearsh" id="sl_yearsh" title="Năm sinh hoạt" class="sl_at" onchange="locdata()">
                            <option value="0">Chọn năm sinh hoạt</option>
                            @foreach($lstyear as $year)
                              <option value="{{$year->id}}">{{$year->name}}</option>
                            @endforeach
                      </select>
					 </div>
					 
                   
                    </div>
                    
                  </div>
                </div>
               
                @if (is_null($lstdutu))
                  <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
                @else
                <table id="tableID" class="table table-bordered table-striped">
                   <thead>
				    <tr>
				    	<th>STT</th>
				    	<th >Tên Thánh</th>
				        <th >Tên</th>
				        <th >Giáo xứ</th>
				        <th hidden="true" ></th>
				        <th hidden="true" ></th>
				        <th >Nhóm</th>
				        <th >Năm dự tu</th>
				        <th>Điểm Thi</th>
				    </tr>
				    </thead>
				   <tbody>
				   		@foreach($lstdutu as $dutu)
					        <tr>
					        	<td>{{$index++}}</td>
					        	<td name ="{{$dutu->id}}">{{$dutu->holyname}}</td>
					            <td>{{$dutu->name}}_{{$dutu->id}}</td>
					            <td>{{$dutu->parish}}</td>
					            <td hidden="true">{{$dutu->namezone->id}}</td>
					            <td hidden="true">{{$dutu->nameyear->id}}</td>
					            <td>{{$dutu->namezone->name}}</td>
					            <td id="namdutu">{{$dutu->nameyear->name}}</td>
					            <td ><input name="{{$dutu->id}}" namdutu="{{$dutu->nameyear->id}}" class="form-control" type="number" ></td>
					        </tr>
				        @endforeach
				     </tbody>
                </table>
                <button type="submit" id="btnsubmit" > submit</buton>
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
      function locdata(){
          var slz, sly, table, tr, td, i, slValue;
          slz = $('#sl_zone').val();
          sly = $('#sl_yearsh').val();
          // console.log(filter);
          table = $("#tableID");
          tr = $("tr");
          if (slz === '0' && sly === '0') {
               $ ('tr').show ();
           }
           else{
           	if(slz === '0'){
           		for (i = 1; i < tr.length; i++) {
                  td = tr[i].children[5];
                  if (td) {
                     slValue = td.textContent || td.innerText; 
                     // console.log(slValue);
                    if (slValue.toUpperCase() === sly) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }       
                }
           	}
           	if(sly === '0'){
           		 for (i = 1; i < tr.length; i++) {
                  td = tr[i].children[4];
                  if (td) {
                     slValue = td.textContent || td.innerText; 
                     // console.log(slValue);
                    if (slValue.toUpperCase() === slz) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }       
                }

           	}
           		if(sly != '0' && slz !='0'){
           		 for (i = 1; i < tr.length; i++) {
                  var tdz = tr[i].children[4];
                  var tdy = tr[i].children[5];
                  if (tdz && tdy) {
                     var slValuez = tdz.textContent || tdz.innerText; 
                     var slValuey = tdy.textContent || tdy.innerText; 

                     // console.log(slValue);
                    if (slValuez.toUpperCase() === slz && slValuey.toUpperCase() === sly ) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }       
                }

           	}



           
           }
                
            };

      

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