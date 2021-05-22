<!DOCTYPE html>
<html>
<head>
    <title>tìm kiếm</title>
</head>
<body>
    <form action="{{route('search')}}" method="post">
        @csrf()
        <input type="text" name="search" placeholder="Gõ nội dung...">
    </form>
    
</body>
</html>