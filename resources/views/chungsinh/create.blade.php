<!DOCTYPE html>
<html>
<head>
	<title>Create Dong Tu</title>
</head>
<body>
	<div>
		@if($errors->any())
    		{{ implode('', $errors->all(':message')) }}
		@endif
	</div>
	<form method="post" action="{{route('chungsinhs.store')}}">
		@csrf()
		<input type="text" name="name" placeholder="Tên thánh - Tên gọi">
		<input type="date" name="ngaysinh" placeholder="Ngày sinh">
		<input type="text" name="giaoxu" placeholder="Giáo Xứ">
		<input type="date" name="ngayvaodcv" placeholder="Ngày vào ĐCV">
		<input type="text" name="nienkhoa" placeholder="Niên Khoá">
		<input type="text" name="khoa" placeholder="Khoá">
		<button>Submit</button>
	</form>
</body>
</html>