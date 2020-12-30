<!DOCTYPE html>
<html>
<head>
	<title>Create Category</title>
</head>
<body>
	@if (session('message'))
		<marquee>{{session('message')}}</marquee>	
        <div class="alert alert-info"></div>
    @endif


    @if($errors->any())
    	{{ implode('', $errors->all(':message')) }}
	@endif
	<form action="{{route('save.category')}}" method="post">
		@csrf()
		<input type="text" name="name">
		<input type="checkbox" name="status">
		<button>Submit</button>
	</form>
</body>
</html>