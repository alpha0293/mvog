
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
	<section class="col-lg-12 connectedSortable">
       <div class="card-header">
        <h3 class="card-title" style="text-align: center; float: none; font-weight: 800; font-size:18pt; color: red;">Danh sách dự tu đang sinh hoạt</h3>
      </div>
      <table id="example" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên thành viên(s)</th>
            <th>Ngày sinh</th>
            <th>Trường học</th>
            <th>Ngành học</th>
            <th>Giáo xứ</th>
            <th>Năm dự tu</th>
            <th>Nhóm</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($iddt as $i)
          <tr>
            <td id="stt">{{$index++}}</td>
            <td id="ten">{{$i->holyname.' '.$i->fullname.' '.$i->name}}</td>
            <td id=ns>{{$i->dob}}</td>
            <td id="truong">{{$i->school}}</td>
            <td id="nganh">{{$i->majors}}</td>
            <td id="xu">{{$i->parish}}</td>
            <td id="nam">{{$i->nameyear->name}}</td>
            <td id="nhom">{{$i->namezone->name}}</td>
            <td>
              <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{route('show.dutu',$i->id)}}"></a>
              <a class="fa fa-trash-alt" style="color:green; padding-right: 10%" href="{{route('delete.dutu',$i->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Dự tu này không?');" title="Xóa"></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <button id="btnExport">EXPORT REPORT</button>
    </section>

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