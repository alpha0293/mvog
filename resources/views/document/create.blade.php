<!DOCTYPE html>
<html>
<head>
	<title>Tạo mới tài liệu</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<form method="post" action="{{route('save.document')}}">
	@csrf
	<input type="text" name="name" placeholder="Nhập tên">
	<input type="text" name="url" placeholder="Chọn file">
	<button>Submit</button>
	</form>
</body>
</html>

