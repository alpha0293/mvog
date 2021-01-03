<!DOCTYPE html>
<html>
<head>
	<title>View Category</title>
</head>
<body>
	<label>{{$cat->name}}</label>
	@foreach($lstpost as $post)
	<p>{{$post->title}}</p>
	@endforeach
	{{$lstpost->links()}}
</body>
</html>