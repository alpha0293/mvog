<!DOCTYPE html>
<html>
<head>
	<title> Danh sách ứng sinh đủ điều kiện đăng kí thi ĐCV</title>
</head>
<body>
	<table class="table table-bordered table-striped">
		<thead>
			<th>Email</th>
			<th>Tên</th>
			<th>Giáo xứ</th>
			<th>Chức năng</th>
		</thead>
		@foreach($dutus as $dutu)
			<tr>
				<td>{{$dutu->email}}</td>
				<td>{{$dutu->name}}</td>
				<td>{{$dutu->parish}}</td>
				<td>{{$dutu->dob}}</td>
			</tr>
		@endforeach
	</table>
</body>
</html>