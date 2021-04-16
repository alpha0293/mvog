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
	<form method="post" action="{{route('save.dongtu')}}">
		@csrf()
		<input type="text" name="name" placeholder="Tên Dòng Tu">
		<input type="text" name="information" placeholder="Thông tin...">
		<button>Submit</button>
	</form>
</body>
</html>