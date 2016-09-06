<script>
    //CONVERSACIONES INICIADAS POR MES
    //NECESITA LAS FECHAS
    $(function () {
        var numeros = [1,2,3,4,5,2,3,1,4,6,4,12];
        $('#container').highcharts({
            title: {
                text: 'PUNTO PRINT',
                x: -20 //center
            },
            subtitle: {
                text: 'Clientes registrados por mes en el sistema',
                x: -20
            },
            xAxis: {
                //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    //'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    <?php 
                        print($categories);
                     ?>
            },
            yAxis: {
                title: {
                    text: 'Clientes registrados'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    //color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            <?php 
                print("
                series: [".
                    $barra
                ."]");
            ?>
        });
    });
</script>