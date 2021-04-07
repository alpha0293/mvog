<!DOCTYPE html>
<html>
<head>
	<title>Edit Link</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<form method="post" action="{{route('update.link')}}">
	@csrf
	<input type="hidden" name="id" value="{{ $link->id }}">
	<input type="text" name="name" placeholder="Nhập tên" value="{{$link->name}}">
	<input type="text" name="url" placeholder="Chọn file" value="{{$link->url}}">
	<button>Submit<link/button>
	</form>
</body>
</html>
