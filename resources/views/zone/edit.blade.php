<!DOCTYPE html>
<html>
<head>
	<title>Edit Zone</title>
</head>
<body>
		@if (session('message'))
			<marquee>{{session('message')}}</marquee>	
	        <div class="alert alert-info"></div>
	    @endif
	<form method="post" action="{{route('update.zone',$zone->id)}}">
		@csrf
		<input type="text" name="name" value="{{$zone->name}}">
		<button>Submit</button>
	</form>
</body>
</html>