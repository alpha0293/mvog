<!DOCTYPE html>
<html>
<head>
	<title>Edit Dong tu</title>
</head>
<body>
	<div>
		@if($errors->any())
    		{{ implode('', $errors->all(':message')) }}
		@endif
	</div>
	<form method="post" action="{{route('update.dongtu',$dongtu->id)}}">
		@csrf()
		<input type="text" name="name" placeholder="Tên Dòng Tu" value="{{$dongtu->name}}">
		<input type="text" name="information" placeholder="Thông tin..." value="{{$dongtu->information}}">
		<input type="text" name="url" placeholder="Địa chỉ Web..." value="{{$dongtu->url}}">
		<button>Submit</button>
	</form>
</body>
</html>