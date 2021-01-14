<script type="text/javascript">
	

 //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var COLORS = [
        '#4dc9f6',
        '#f67019',
        '#f53794',
        '#537bc4',
        '#acc236',
        '#166a8f',
        '#00a950',
        '#58595b',
        '#8549ba',
        '#99FF99',
        '#99FF66',
        '#99FF33',
        '#99FF00',
        '#66FFFF',
        '#66FFCC',
        '#66FF99',
        '#66FF66',
        '#66FF33',
        '#66FF00',
        '#33FFFF',
        '#33FFCC',
        '#33FF99',
        '#33FF66',
        '#33FF33',
        '#33FF00',
        '#00FFFF',
        '#00FFCC',
        '#00FF99',
        '#00FF66',
        '#00FF33',
        '#00FF00',
        '#FFCCFF',
        '#FFCCCC',
        '#FFCC99'
      ];
    var barChartData = {
      labels: [@foreach($zone1 as $zone)
      	'{{$zone->name}}',
      @endforeach],
      datasets: [
      <?php 
      $i = 0; ?>
	      @foreach($year as $y)
	      <?php $i++ ?>
	      	{
	      		label: '{{$y->name}}',
	      		backgroundColor     : COLORS[{{$i}}],
	          borderColor         : 'rgba(60,141,188,0.8)',
	          pointRadius          : false,
	          pointColor          : '#3b8bba',
	          pointStrokeColor    : 'rgba(60,141,188,1)',
	          pointHighlightFill  : '#fff',
	          pointHighlightStroke: 'rgba(60,141,188,1)',
	          data                :
	          [
		          @foreach($zone1 as $zone)
		      			{{$zone->dutu->where('idstatus',1)->where('idyear',$y->id)->count()}},
		      		@endforeach
		      	]
	      	},
	      @endforeach
      ]
    }

    barChartData.datasets[0] 
    barChartData.datasets[1] 
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    });

   
</script>