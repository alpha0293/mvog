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
                  <div class="col-md-7" >
                    <div class="row">
                   
                    <div class="form-group col-md-3">
                        <select aria-label="Vùng sinh hoạt" name="zone" id="sl_zone" title="Vùng sinh hoạt" class="sl_at">
                            <option value="0">Chọn vùng sinh hoạt</option>
                            @foreach($lstzone as $zone)
                              <option value="{{$zone->id}}">{{$zone->name}}</option>
                            @endforeach
                      </select>
                    </div>
                   
                    </div>
                    
                  </div>
                </div>
               
                @if (is_null($lstnhomtruong))
                  <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
                @else
                <table id="tableID" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên thành viên</th>
                    <th>Ngày sinh</th>
                    <th>Trường học</th>
                    <th>Giáo xứ</th>
                    <th>Năm dự tu</th>
                    <th hidden="true"></th>
                    <th>Nhóm</th>
                    <th>Trưởng nhóm</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($lstnhomtruong as $i)
                        <tr>
                          <td id="stt">{{$index++}}</td>
                          <td id="ten">{{$i->holyname.' '.$i->fullname.' '.$i->name}}</td>
                          <td id=ns>{{$i->dob}}</td>
                          <td id="truong">{{$i->school}}</td>
                          <td id="xu">{{$i->parish}}</td>
                          <td id="nam">{{$i->nameyear->name}}</td>
                          <td hidden="true">{{$i->namezone->id}}</td>
                          <td id="nhom">{{$i->namezone->name}}</td>
                          <td>
                              <div style="display: inline-grid;" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="{{$i->id}}" @if($i->getuser->hasRole('nhomtruong')) checked="checked" @endif onclick="ontruongnhom({{$i->id}},this.checked);">
                                <label class="custom-control-label" for="{{$i->id}}"></label>
                            </div>
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
                  td = tr[i].children[6];
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
      
       function ontruongnhom(id, value) {
        console.log(value);
        $.post('{{ route('ontruongnhom') }}',
                {'_token': "{{ csrf_token() }}",
                'id': id,
                'value': value } 
                ,function(data){
                  console.log(data);
               //    toastr.success('Thành công!!!','THÔNG BÁO');
               // console.log(JSON.stringify(data));
              });
      }

        
     </script>
  @endsection

  