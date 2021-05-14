<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<i class="fa fa-gear fa-spin right_config" onclick="openNav()" style="font-size:35px"></i>
<div id="mySidenav" class="sidenav">
  <form method="post" action="{{route('save.config')}}">
  @csrf()
  <a style="color: #ffffff;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <p class="content-config">Màu nền:</p>
  <input type="color" id="background_color" name="backgroundcolor" value="{{ setting('config.backgroundcolor','') }}" class="content-config form-control">
  <hr/>
  <p class="content-config">Màu bar:</p>
  <input type="color" id="bar_color" name="barcolor" value="{{ setting('config.barcolor','') }}" class="content-config form-control">
  <hr/>
  <input style="margin: 10px;" type="submit" class="btn btn-primary" value="Cập nhật">
</form>
</div>
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