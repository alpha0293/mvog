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
 @include('user.layout.config')