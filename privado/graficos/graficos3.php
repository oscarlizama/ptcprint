<script type="text/javascript">
	$(function () {
	    // Create the chart
	    $('#container').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: 'PUNTO PRINT'
	        },
	        subtitle: {
	            text: 'PRODUCTOS MÁS VENDIDOS POR MEDIDA.'
	        },
	        xAxis: {
	            type: 'category'
	        },
	        yAxis: {
	            title: {
	                text: 'VENTAS DEL PRODUCTO'
	            }

	        },
	        legend: {
	            enabled: false
	        },
	        plotOptions: {
	            series: {
	                borderWidth: 0,
	                dataLabels: {
	                    enabled: true,
	                    
	                }
	            }
	        },

	        tooltip: {
	            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
	            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> del total<br/>'
	        },

	        series: [{
	            name: 'Ventas',
	            colorByPoint: true,
	            /*data: [{
	                name: 'Microsoft Internet Explorer',
	                y: 10,
	                drilldown: 'Microsoft Internet Explorer'
	            },{
	                name: 'Chrome',
	                y: 20,
	                drilldown: 'Chrome'
	            }]*/
	            <?php print($datag) ?>
	        }],
	        drilldown: {
	            /*series: [{
	                name: 'Microsoft Internet Explorer',
	                id: 'Microsoft Internet Explorer',
	                data: [['v11.0',24.13],['v8.0',17.2]]
	            },{
	                name: 'Chrome',
	                id: 'Chrome',
	                data: [['v11.0',24.13],['v8.0',17.2]]
	            }]*/
	            <?php print($drilldown) ?>
	        }
	    });
	});
</script>