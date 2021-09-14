<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="admin_asset/dist/css/themcss.css">
  <link rel="stylesheet" href="admin_asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin_asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin_asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin_asset/plugins/summernote/summernote-bs4.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin_asset/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="admin_asset/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="admin_asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="admin_asset/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
 	@include('admin.layout.header')
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
</div>
  <!-- /.content-wrapper -->
  @include('admin.layout.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="admin_asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin_asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin_asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin_asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin_asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin_asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin_asset/plugins/moment/moment.min.js"></script>
<script src="admin_asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin_asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset/dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="admin_asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin_asset/dist/js/pages/dashboard.js"></script>
<!-- Bootstrap Switch -->
<script src="admin_asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Select2 -->
<script src="admin_asset/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="admin_asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_asset/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

  });
  //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
<!-- thu nhe -->

<script>
    // lấy phần Modal them 
    var modal = document.getElementById('addModal');
  
    // Lấy phần button mở Modal
    var btn = document.getElementById("myBtn");
  
    // Lấy phần span đóng Modal
    var span = document.getElementById("addClose");
  
    // Khi button được click thi mở Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
  
    // Khi span được click thì đóng Modal
    span.onclick = function() {
        modal.style.display = "none";
    }
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    // lấy phần Modal sua 
    var modal = document.getElementById('editModal');
  
    // Lấy phần button mở Modal
    
    var btn = document.getElementById("iconEdit");
  
    // Lấy phần span đóng Modal
    var span = document.getElementById("editClose");
  
    // Khi button được click thi mở Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
  
    // Khi span được click thì đóng Modal
    span.onclick = function() {
        modal.style.display = "none";
    }
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script >
  
  $(document).ready(function(){
  
    $("#loc").click(function(){
      var nhom = $("#sl_nhom").find(":selected").val();
      var xu = $("#sl_xu").find(":selected").val();
      var nam = $("#sl_nam").find(":selected").val();

      if(nhom!=0 | xu!=0|nam!=0){
        
          
           if(nhom!=""){
            alert(nhom);
           }
           if(nam!=""){
            alert(nam);
           }
           if(xu!=""){
            alert(xu);
           }

      }
    });
    

  });
</script>
<!-- het thu --> 
</body>
</html>
