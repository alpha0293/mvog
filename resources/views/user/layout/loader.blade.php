<style type="text/css">
	.right_config{
  position: fixed;
  right: 3px;
  top: 50%;
  margin-top: -2.5em;
  z-index: 2;
	}
.sidenav {
  height: auto;
  width: 0;
  position: fixed;
  z-index: 2;
  top: 10%;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav .content-config{
  margin: 0px 5px 0px 5px;
  width: 95%;
  text-decoration: none;
  font-size: 17px;
  color: #ffff;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
hr{
	margin: 6px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<i class="fa fa-gear fa-spin right_config" onclick="openNav()" style="font-size:35px"></i>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <p class="content-config">Lời Chúa trong ngày:</p>
  <input  type="text" class="content-config form-control" placeholder="Nhập ...">
  <hr/>
  <p class="content-config">Màu nền:</p>
  <input type="color" id="background_color" name="background_color" value="#ff0000" class="content-config form-control">
  <hr/>
  <p class="content-config">Màu bar:</p>
  <input type="color" id="bar_color" name="bar_color" value="#ff0000" class="content-config form-control">
  <hr/>
  <input style="margin: 10px;" type="submit" class="btn btn-primary" value="Cập nhật">
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>