<!DOCTYPE html>
<html lang="vi">

  <head>

    @include('user.layout.css')

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
   @include('user.layout.header')
   
    <!-- Page Content -->
    <!-- Banner Starts Here -->
   @include('user.layout.slide')

    <section class="blog-posts">
      <div class="container-fluid">
        <div class="row">
          @yield('content')
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </body>
</html>
