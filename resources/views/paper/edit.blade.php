<!DOCTYPE html>
<html>
<head>
	<title>Edit Paper</title>
</head>
<body>
	<form method="post" action="{{route('update.paper',$paper->id)}}">
		@csrf()
		<input type="text" name="name" value="{{$paper->name}}">
		<!-- <input type="text" name="url" value="{{$paper->url}}"> -->
		<label name="url">{{$paper->url}}</label>
		<button>Submit</button>
	</form>
	<!-- {{$paper}} -->
</body>
</html>