<script src="{{asset('user_asset/assets/js/jquery.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/slick.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{asset('user_asset/assets/js/custom.js')}}"></script>
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