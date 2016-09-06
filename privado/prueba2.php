<?php 
    if (isset($_POST['enviar'])) {
        require_once 'graficos/grafico1.php';
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>EJEMPLO</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		
	</head>
	<body>
        <br>
        <br>
        <form action="prueba2.php" method="post">
            <select name="mes">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <select name="dia">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select name="anio">
                <option value="2016">2016</option>
            </select>
            <br>
            <br>
            <br>
            <select name="mesf">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <select name="diaf">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select name="aniof">
                <option value="2016">2016</option>
            </select>
            <br>
            <br>
            <button name="enviar">ENVIAR</button>
        </form>
        <br>
        <script>
            $(function () {
                var numeros = [1,2,3,4,5,2,3,1,4,6,4,12];
                $('#container').highcharts({
                    title: {
                        text: 'PUNTO PRINT',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'Clientes registrados en el sistema',
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
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <div id="container"></div>

	</body>
</html>
