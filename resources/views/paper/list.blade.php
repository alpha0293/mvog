<!DOCTYPE html>
<html>
<head>
	<title>List Paper</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-bordered">
		<th>Tên</th>
		<th>URL</th>
		<th>Chức năng</th>
		@foreach($lstpaper as $paper)
		<tr>
			<td>{{$paper->name}}</td>
			<td>{{$paper->url}}</td>
			<td><a href="{{route('delete.paper',$paper->id)}}">Delete</a>
				<a href="{{route('show.paper',$paper->id)}}">View</a>
				<a href="{{route('getupdate.paper',$paper->id)}}">Edit</a>
			</td>
		</tr>
			
		@endforeach
	</table>

</body>
</html>