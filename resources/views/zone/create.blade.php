<!DOCTYPE html>
<html>
<head>
	<title>Create Zone</title>
</head>
<body>
		@if (session('message'))
			<marquee>{{session('message')}}</marquee>	
	        <div class="alert alert-info"></div>
	    @endif
	<form method="post" action="{{route('save.zone')}}">
		@csrf
		<input type="text" name="name">
		<button>Submit</button>
	</form>
</body>
</html>