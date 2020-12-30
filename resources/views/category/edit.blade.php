<!DOCTYPE html>
<html>
<head>
	<title>Edit Category</title>
</head>
<body>
	@if($errors->any())
    	{{ implode('', $errors->all(':message')) }}
	@endif
	<form action="{{route('update.category',$cat->id)}}" method="post">
		@csrf()
		<input type="text" name="name" value="{{$cat->name}}">
		<input type="checkbox" name="status" value="{{$cat->status}}" checked="{{$cat->status}}">
		<button>Submit</button>
	</form>
</body>
</html>