<!DOCTYPE html>
<html>
<head>
	<title>List zone</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	@if (session('message'))
		<marquee>{{session('message')}}</marquee>	
        <div class="alert alert-info"></div>
    @endif
	<table class="table table-bordered">
		<th>Tên</th>
		<th>Chức năng</th>
		@foreach($lstzone as $zone)
		<tr>
			<td>{{$zone->name}}</td>
			<td><a href="{{route('delete.zone',$zone->id)}}">Delete</a>
				<a href="{{route('show.zone',$zone->id)}}">View</a>
				<a href="{{route('getupdate.zone',$zone->id)}}">Edit</a>
			</td>
		</tr>
			
		@endforeach
	</table>

</body>
</html>