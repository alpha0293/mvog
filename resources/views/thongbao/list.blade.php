<!DOCTYPE html>
<html>
<head>
	<title>List Thong Bao</title>
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
		<th>Tiêu Đề</th>
		<th>Nội dung</th>
		<th>Trạng thái</th>
		<th>Chức năng</th>
		@foreach($lstnoti as $noti)
		<tr>
			<td>{{$noti->title}}</td>
			<td>{{$noti->content}}</td>
			<td>{{$noti->status}}</td>
			<td><a href="{{route('delete.notifi',$noti->id)}}">Delete</a>
				<a href="{{route('show.notifi',$noti->id)}}">View</a>
				<a href="{{route('getupdate.notifi',$noti->id)}}">Edit</a>
			</td>
		</tr>
			
		@endforeach
	</table>

</body>
</html>