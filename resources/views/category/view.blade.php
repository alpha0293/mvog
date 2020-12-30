<!DOCTYPE html>
<html>
<head>
	<title>View Category</title>
</head>
<body>
	<label>{{$cat->name}}</label>
	{{$cat->getpost->count()}}
</body>
</html>