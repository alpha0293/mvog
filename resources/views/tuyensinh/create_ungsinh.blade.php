<!DOCTYPE html>
<html>
<head>
	<title> Tạo mới ứng sinh không tham gia dự tu</title>
	<meta charset="utf-8">
</head>
<body>
	@if(session('errors'))
		<h4>{{session('errors')}}</h4>                  
	@endif
	<form action="{{route('store.ungsinh')}}" method="post">
		@csrf
		<input type="text" name="email" placeholder="Email">
		<input type="text" name="name" placeholder="Tên thánh - Họ và tên">
		<input type="date" name="dob" placeholder="Ngày sinh">
		<input type="text" name="parish" placeholder="Giáo xứ">
		<button>Submit</button>
	</form>
</body>
</html>