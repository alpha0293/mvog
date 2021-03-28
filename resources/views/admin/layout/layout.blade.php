<!DOCTYPE html>
<html>
  @include('admin.layout.head')
  @include('admin.layout.js')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
 	@include('admin.layout.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	@yield('content')
  </div>
</div>
  <!-- /.content-wrapper -->
  @include('admin.layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@if (session('success'))
    <div class="col-sm-12">
      <script type="text/javascript">
        toastr.success('Thành công!!!','THÔNG BÁO');
      </script>
    </div>
@endif
@if (Session::has('errors'))
    <div class="col-sm-12">
      <?php $er = '' ?>
        @foreach ($errors->all() as $error)
          {{$er .= $error.' \n'}}
        @endforeach
      <script type="text/javascript">
        toastr.error('{{$er}}','THÔNG BÁO');
      </script>
    </div>
@endif
</body>
</html>
