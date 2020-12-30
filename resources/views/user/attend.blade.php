

  <head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Stand CSS Blog by TemplateMo</title>
    <!--css them vao -->


    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="{{asset('admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> -->
    <link href="{{asset('user_asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/templatemo-stand-blog.css')}}">
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/owl.css')}}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_asset/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
<!--
TemplateMo 551 Stand Blog
https://templatemo.com/tm-551-stand-blog
-->

  </head>

  <body>
  @include('user.layout.header')
    <!-- ***** Preloader Start ***** -->
   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->

    <!-- Banner Starts Here -->
   @include('user.layout.slide')

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
                <select style="float: left;" aria-label="Năm SH" name="ac_year" id="ac_year" title="Năm SH" class="sl_at">
                   <option value="ALL">Năm Sinh hoạt</option>
                    @for($i=1; $i<=3; $i++)
                        <option value="{{$i}}">Năm {{$i}}</option>
                    @endfor
                    <option value="4">Dự tu tự do</option>
                  </select>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="tableID" class="table table-hover text-nowrap"><thead>
                    <tr>
                      <th style="width: 10px">STT</th>
                      <th>Tên dự tu</th>
                      <th>Giáo xứ</th>
                      <th hidden="true" >Năm SH</th>
                      <th style="width: 100px">Trạng thái</th>
                      <th style="min-width: 180px;">Ghi chú</th>
                    </tr>
                  </thead>
                  <tbody> 
                 @foreach($lstdutu as $dutu)
                    <tr>
                      <td>{{$index++}}</td>
                      <td> {{$dutu->name}}</td>
                      <td>{{$dutu->parish}}</td>
                      <td hidden="true" >{{$dutu->idyear}}</td>
                      <td>
                        <input name="{{$dutu->id}}" style="min-width: 20px" type="checkbox" id="checkboxPrimary2">
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
    <script type="text/javascript">
      $('#ac_year').change( function(){
          var sl, filter, table, tr, td, i, slValue;
          sl = $('#ac_year');
          filter = sl.val();
          table = $("#tableID");
          tr = $("tr");
          if (filter === 'ALL') {
               $ ('tr').show ();
           }
           else{
            for (i = 0; i < tr.length; i++) {
                  td = tr[i].children[3];
                  if (td) {
                    slValue = td.textContent || td.innerText;
                    if (slValue.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }       
                }
           }
                
            });

    </script>
