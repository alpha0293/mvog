<script type="text/javascript">
	 //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
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
     <?php $i = 0; ?>
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [@foreach($zone1 as $zone)
		      	'{{$zone->name}}',
		      @endforeach
      ],
      datasets: [
        {
          data: [@foreach($zone1 as $zone)
		      			{{$zone->dutu->where('idstatus',1)->count()}},
		      		@endforeach
          ],
          backgroundColor : [@foreach($zone1 as $zone)
          						<?php $i++ ?>
          						COLORS[{{$i}}],
          					@endforeach
          ],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })
</script>