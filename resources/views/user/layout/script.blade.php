<script src="{{asset('user_asset/assets/js/jquery.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/slick.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/custom.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin_asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('toastr/toastr.min.js')}}"></script>
<!-- <script src="{{asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- AdminLTE App -->
<!-- <script src="{{asset('admin_asset/dist/js/adminlte.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('admin_asset/dist/js/demo.js')}}"></script> -->
<script type="text/javascript">
    // menuset Bài viết
    function setPost(idDropdown) {
        //show its submenu
        $("#"+idDropdown).slideToggle(300); 
        
    }  
      // menuset Bài viết ngau nhien
      function setPopular(idDropdown) {
        //show its submenu
        $("#popular"+idDropdown).slideToggle(300); 
        
    }  
        // click out to off menu
        $(window).click(function(e) {
           console.dir(e);
       });
        const $menu = $('.showSet');
        $(document).mouseup(e => {
	   if (!$menu.is(e.target) // if the target of the click isn't the container...
	   && $menu.has(e.target).length === 0) // ... nor a descendant of the container
	   {
      $menu.css({"display":"none"});
  }
});

</script>
<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
  }

</script>
<script type="text/javascript">
 $('#bar_color').change(function(){
    var a = $('#bar_color').val();
    $("[id='color-bar']").css("background-color", a);
});
 $('#background_color').change(function(){
    var b = $('#background_color').val();
    $("body").css("background-color", b);
});
</script>
<!-- toastr option -->
<script type="text/javascript">
   toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "onclick": null,
      "showDuration": "3000",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
  }
</script>
<script type="text/javascript">
 $('#bar_color').change(function(){
    var a = $('#bar_color').val();
    $("[id='color-bar']").css("background-color", a);
});
 $('#background_color').change(function(){
    var b = $('#background_color').val();
    $("body").css("background-color", b);
});
</script>
<script>
  $(function () {
    $("#tableid").DataTable({
      "autoWidth": false,
      "autoFill": true,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      "pageLength": 25,
      language: {
        search: "Tìm kiếm",
        lengthMenu: "Số lượng bản ghi _MENU_ ",
        info: "Từ _START_ đến _END_ trong _TOTAL_ bản ghi",
        infoEmpty: "Không có dữ liệu ",
        zeroRecords: "Tìm kiếm không trùng",
        emptyTable: "Không có dữ liệu",
        paginate: {
          first: "Trang đầu",
          previous: "Trang trước",
          next: "Trang sau",
          last: "Trang cuối"
      },
  },
});
});
</script>