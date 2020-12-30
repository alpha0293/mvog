<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <title>Create DIEM THI</title>
</head>
<body>

	<table id="my_table_1" data-toggle="table" data-sort-stable="true">
	    <thead>
	    <tr>
	    	<th data-sortable="true">STT</th>
	        <th data-sortable="true">Tên</th>
	        <th data-sortable="true">Giáo xứ</th>
	        <th data-sortable="true">Năm dự tu</th>
	        <th data-sortable="false">Điểm Thi</th>
	    </tr>
	    </thead>
	   <tbody>
	   		@foreach($lstdutu as $dutu)
		        <tr>
		        	<td>{{$index++}}</td>
		            <td>{{$dutu->name}}</td>
		            <td>{{$dutu->parish}}</td>
		            <td>{{$dutu->nameyear->name}}</td>
		            <td><input type="number" ></td>
		        </tr>
	        @endforeach
	        </tbody>
	</table>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          console.log('ready');
          $('#my_table_1').find('input[type="date"]').change(function() {
            console.log('Table 1.Date was changed. Need to check if table is sorted by column C.If so - call the table sort.');
          });
          $('#my_table_1').find('select').change(function() {
            console.log('Table 1.Selection was changed. Need to check if table is sorted by column B.If so - call the table sort.');
          });
         });
    </script>

</body>
</html>