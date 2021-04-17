<!DOCTYPE html>
<html>
<head>
	<title>Danh sách Chủng Sinh</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<table>
		<th>Tên</th>
		<th>Thông tin</th>
		<th>Chức Năng</th>
		@foreach($chungsinhs as $chungsinh)
		<tr>
			<td>{{$chungsinh->tengoi}}</td>
			<td>{{$chungsinh->tenthanh}}</td>
			<td><a href="{{route('chungsinhs.destroy',$chungsinh->id)}}">Delete</a>
				<a href="{{route('chungsinhs.show',$chungsinh->id)}}">View</a>
				<a href="{{route('chungsinhs.edit',$chungsinh->id)}}">Edit</a>
			</td>
		</tr>
			
		@endforeach
	</table>

</body>
</html>