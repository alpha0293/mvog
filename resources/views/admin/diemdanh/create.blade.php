<!DOCTYPE html>
<html lang="vi">

  <head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
   @include('user.layout.head')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_asset/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">


  </head>

  <body>
  @include('user.layout.header')
    <!-- ***** Preloader Start ***** -->
   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->


    <section class="blog-posts">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9">
  <div class="header-attend">
    <h3><b>Điểm danh nhóm Đà Nẵng</b></h3>
    <h4 style="padding:15px;">Trưởng nhóm: Giuse Nguyễn Anh Tuấn</h4>
    <select aria-label="Tháng" name="month" id="month" title="Tháng" class="sl_at">
      <option value="0">Tháng</option>
      @for($i=1; $i<=12; $i++)
          <option @if($i==date("m")) selected @endif value="@if($i<10)0{{$i}}@else{{$i}}@endif">Tháng {{$i}}</option>
      @endfor
    </select>
    <!-- select năm -->
    <select aria-label="Năm" name="year" id="year" title="Năm" class="sl_at">
      <option value="0">Năm</option>
      @for($i=2019; $i<=date("Y"); $i++)
      <option @if($i==date("Y")) selected @endif value="{{$i}}">{{$i}}</option>
      @endfor
    </select>
  </div>
  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách điểm danh</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="tableID" class="table table-hover text-nowrap"><thead>
                    <tr>
                      <th style="width: 10px">STT</th>
                      <th>Tên dự tu</th>
                      <th>Giáo xứ</th>
                      <th style="width: 100px">Trạng thái</th>
                      <th style="min-width: 180px;">Ghi chú</th>
                    </tr>
                  </thead>
                  <tbody> 
                 @foreach($lstdutu as $dutu)
                    <tr>
                      <td>{{$index++}}</td>
                      <td> {{$dutu->holyname.' '.$dutu->fullname.' '.$dutu->name}}</td>
                      <td>{{$dutu->parish}}</td>
                      <td>
                        <input name="{{$dutu->id}}" type="checkbox" id="checkboxPrimary2">
                      </td>
                      <td>
                        <input name="note_{{$dutu->id}}" type="text" class="form-control">
                      </td>
                    </tr>
                    @endforeach          
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <button class="btn btn-warning" id="Save" >Save</button>
          </div>
          <div id="msg"> </div>
          @include('user.layout.r_category')
        </div>
      </div>
    </section>

    @include('user.layout.footer')
   

    
   <!-- Bootstrap core JavaScript -->
    <script src="{{asset('user_asset/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('user_asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('user_asset/assets/js/custom.js')}}"></script>
    <script src="{{asset('user_asset/assets/js/owl.js')}}"></script>
    <script src="{{asset('user_asset/assets/js/slick.js')}}"></script>
    <script src="{{asset('user_asset/assets/js/isotope.js')}}"></script>
    <script src="{{asset('user_asset/assets/js/accordions.js')}}"></script>
    <!-- DataTables -->
<script src="{{asset('admin_asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin_asset/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin_asset/dist/js/demo.js')}}"></script>

  
    <script type="text/javascript">
       $('#Save').click(function () {
          statusList = jQuery('input[type=checkbox]')
          data = []
          for(i=0;i<statusList.length;i++) {
          std = {
            'iddutu': jQuery(statusList[i]).attr('name'),
            'status': jQuery(statusList[i]).prop('checked'),
            'note': jQuery('[name=note_'+jQuery(statusList[i]).attr('name')+']').val()
                }
                data.push(std)
              }
          
              $.post('{{ route('save.attend') }}',
                {'_token': "{{ csrf_token() }}",
                'month': jQuery('[name=month]').val(),
                'year': jQuery('[name=year]').val() ,
                'data': JSON.stringify(data)} 
                ,function(data){
               console.log(JSON.stringify(data));
              });

            });
    </script>

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
