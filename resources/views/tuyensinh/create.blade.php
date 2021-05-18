 <!-- Content Wrapper. Contains page content -->

  @extends('admin.layout.layout')
  @section('content')
  <!--------------------------------------------------------->
<style type="text/css">
  .form-control{
    width: auto;
  }

</style>
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div>
        <form action="{{route('save.tuyensinh')}}" method="post">
          @csrf
          <input type="text" name="email" placeholder="Email">
          <input type="text" name="name" placeholder="Tên thánh - Họ và tên">
          <input type="date" name="dob" placeholder="Ngày sinh">
          <input type="text" name="parish" placeholder="Giáo xứ">
          <button>Submit</button>
        </form>
        </div>
        <!-- het thu --> 
        <div class="col-md-12" id="danhsach_nhom">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title" id="addnhom_title">Danh sách dự tu đủ điều kiện đăng kí thi ĐCV</h3>
                <h4 id="addnhom_title">năm tuyển sinh: {{now()->year}}</h4>
                <h4 id="addnhom_title">Đã hoàn thành năm dự tu và tuổi không quá {{setting('config.tuoithidcv','')}}</h4>
                @if(session('message'))
                <h4>{{session('message')}}</h4>                  
                @endif
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                   <?php
                   $getyear = 1;
                   $index = 1;
                   $sbd = 1;
                    ?>
                @if ($getyear==0) <!-- sua lai danh sach ->count()==0 -->
                  <h3 class="card-title" id="addnhom_title">Chưa có số liệu thống kê!!!</h3>
                @else
	                <table id="example" class="table table-bordered table-striped">
						<thead>
							<th>STT</th>
							<th>Email</th>
							<th>Tên thánh - Họ và tên</th>
							<th>Giáo xứ</th>
							<th>Trường học</th>
						</thead>
						@foreach($dutus as $dutu)
							<tr>
								<td>{{$index++}}</td>
								<td>{{$dutu->getuser->email}}</td>
								<td>{{$dutu->holyname.' '.$dutu->fullname.' '.$dutu->name}}</td>
								<td>{{$dutu->parish}}</td>
								<td>{{$dutu->school}}</td>
							</tr>
						@endforeach
					</table>
                @endif
              </div>
              <!-- /.card-body -->
              
            </div>
        </div>
       </div>
      </div>
   </section>
    <script type="text/javascript">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

    <script type="text/javascript">
    $(document).ready( function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            
            buttons: [ {
                extend: 'excelHtml5',
                autoFilter: true,
                sheetName: 'Exported data',
                customize: function ( xlsx ){
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
     
                    // jQuery selector to add a border
                    $('row c[r*="2"]', sheet).attr( 's', '20' );
                    $('c', sheet).attr( 's', '25' );
                    $('row c[r^="C"]', sheet).each( function () {
                        // Get the value
                        if ( $('is t', this).text() == 'New York' ) {
                            $(this).attr( 's', '20' );
                        }
                    });
                    $('row:first c', sheet).attr( 's', '42' );
                    // $('row c[r^="C"]', sheet).attr( 's', '2' );
                }
            },
            'pdf', 'print' ]
        } );
    } );
  </script>
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
 @endsection