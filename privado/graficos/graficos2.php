<script type="text/javascript">
	///PRODUCTOS MÁS VENDIDOS
	//NO NECESITA FECHAS
    $(function () {

        $(document).ready(function () {

            // Build the chart
            $('#container').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'PUNTO PRINT'
                },
                subtitle: {
                    text: 'PRODUCTOS MÁS VENDIDOS',
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Productos',
                    colorByPoint: true,
                    <?php 
                    	print($datag);
                    ?>
                }]
            });
        });
    });
</script>