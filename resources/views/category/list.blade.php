<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>List Category</title>
</head>
<body>
	<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Status</th>
				<th>Tool</th>
			</tr>
			@foreach($lstcat as $cat)
			<tr>
				<td>{{$cat->name}}</td>
				<td>{{$cat->status}}</td>
				<td><a href="{{route('delete.category',$cat->id)}}">Delete</a>
					<a href="{{route('show.category',$cat->id)}}">View</a>
					<a href="{{route('getupdate.category',$cat->id)}}">Edit</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>	
</body>
</html>