<!DOCTYPE html>
<html>
<head>
	<title>Hahha</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- <script type="text/javascript">
		$('#dialog').dialog({ modal: true, autoOpen: false });

		function preview() {
		  $('#dialog').html($('#mytext').val());
		  $('#dialog').dialog('open');
		}
	</script>	 -->
</head>
<body>
	<div>
		@if($errors->any())
    		{{ implode('', $errors->all(':message')) }}
		@endif
	</div>
	@if (session('message'))
		<marquee>{{session('message')}}</marquee>	
        <div class="alert alert-info"></div>
    @endif
	<form method="post" action="{{route('save.paper')}}">
	@csrf
	<input type="text" name="name">
	<button>Submit</button>
	</form>
	<button onclick="preview()">Preview</button>
	<script type="text/javascript">
		function preview(){
			$( "#dialog" ).dialog();
		}
	</script>
</body>
</html>

