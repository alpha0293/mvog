<!-- jQuery -->

    <script src="{{asset('admin_asset/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->


    <script src="{{asset('admin_asset/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin_asset/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('admin_asset/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin_asset/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin_asset/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin_asset/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin_asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin_asset/dist/js/adminlte.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('admin_asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin_asset/dist/js/pages/dashboard.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('admin_asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('admin_asset/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('admin_asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('toastr/toastr.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin_asset/dist/js/demo.js')}}"></script>

    <script src="{{asset('admin_asset/mystyle/js_them/stackchart.js')}}"></script>
    <script src="{{asset('admin_asset/mystyle/js_them/donutchart.js')}}"></script>


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
   
    <!-- het thu --> 