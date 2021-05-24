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
                  <div class="form-group" style="    display: flex; margin-top: 5px;">
                      <label style="width: 75%; margin-top: 6px;" for="year">Năm học: </label>
                       <select style="width: auto; margin-left: 9px;" aria-label="Năm" name="year" id="year" title="Năm" class="form-control sl_at">
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
                </div>
               
                @if (is_null($lstdutu2->first))
                  <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
                @else
                    <table id="mytable" class="table table-bordered table-striped">
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
                        @foreach ($lstdutu2 as $i)
                        <tr>
                          <td id="stt">{{$index++}}</td>
                          <td id="ten">{{$i['holyname'].' '.$i['fullname'].' '.$i['name']}}</td>
                          	@foreach($i['diemdanh'] as $diemdanh)
                          		@if(is_null($diemdanh))
                          			<td></td>
                          		@elseif($diemdanh['status']==1)
                          			<td><input type='checkbox' checked disabled id='checkboxSuccess3'></td>
                          		@elseif($diemdanh['status']==0)
                          			<td><input type='checkbox' disabled id='checkboxSuccess3'></td>
                          		@endif
                          	@endforeach
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
   @endsection
