<!DOCTYPE html>
<html>
<head>
	<title>Edit chủng sinh</title>
</head>
<body>
	<div>
		@if($errors->any())
    		{{ implode('', $errors->all(':message')) }}
		@endif
	</div>
	<form method="post" action="{{route('update.chungsinh',$chungsinh->id)}}">
		@csrf()
		<input type="text" name="name" placeholder="Tên thánh - Tên gọi" value="{{$chungsinh->tenthanh.' '.$chungsinh->ho.' '.$chungsinh->tengoi}}">
		<input type="date" name="ngaysinh" placeholder="Ngày sinh" value="{{$chungsinh->ngaysinh}}">
		<input type="text" name="giaoxu" placeholder="Giáo Xứ" value="{{$chungsinh->giaoxu}}">
		<input type="date" name="ngayvaodcv" placeholder="Ngày vào ĐCV" value="{{$chungsinh->ngayvaodcv}}">
		<input type="text" name="nienkhoa" placeholder="Niên Khoá" value="{{$chungsinh->nienkhoa}}">
		<input type="text" name="khoa" placeholder="Khoá" value="{{$chungsinh->khoa}}">
		<button>Submit</button>
	</form>
</body>
</html>