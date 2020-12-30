<!DOCTYPE html>
<html>
<head>
	<title>List Dong Tu</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<table>
		<th>Tên</th>
		<th>Thông tin</th>
		@foreach($lstdongtu as $dongtu)
		<tr>
			<td>{{$dongtu->name}}</td>
			<td>{{$dongtu->information}}</td>
			<td><a href="{{route('delete.dongtu',$dongtu->id)}}">Delete</a>
				<a href="{{route('show.dongtu',$dongtu->id)}}">View</a>
				<a href="{{route('getupdate.dongtu',$dongtu->id)}}">Edit</a>
			</td>
		</tr>
			
		@endforeach
	</table>

</body>
</html>