<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
	include 'procesos/lifeprivate.php';
	include 'procesos/validaciones.php';
	$fechai_mostrar = "";
	$fechaf_mostrar = "";
	$errorseleccionar = false;
	$errormsg = "";
	$titulo3 = "";
	if (isset($_POST['enviar'])) {
		if ($_POST['tipografico']) {
			$grafico = $_POST['tipografico'];
			if (validarNumeroEntero($grafico)) {
				if (validarFecha($_POST['fecha_inicio']) && validarFecha($_POST['fecha_fin'])) {
					$fechai_mostrar = $_POST['fecha_inicio'];
					$fechaf_mostrar = $_POST['fecha_fin'];
					if ($grafico == 1) {
						include 'graficos/grafico1.php';
						$titulo3 = "Clientes registrados por mes";
					}
					if ($grafico == 2) {
						include 'graficos/grafico2.php';
						$titulo3 = "Productos más vendidos";
					}
					if ($grafico == 3) {
						include 'graficos/grafico3.php';
						$titulo3 = "Productos más vendidos por medida";
					}
					if ($grafico == 4) {
						include 'graficos/grafico4.php';
						$titulo3 = "Conversaciones iniciadas por mes";
					}
					if ($grafico == 5) {
						include 'graficos/grafico5.php';
						$titulo3 = "Productos con más comentarios al mes";
					}
					if ($grafico == 0) {
						$errorseleccionar = true;
						$errormsg = "Eliga una consulta para graficar";
					}
				}else{
					$errorseleccionar = true;
					$errormsg =  "Hay un error en las fechas, compruebe que estén correctas.";
				}
			}else{
				$errorseleccionar = true;
				$errormsg = "No se ha elegido una opción correcta";
			}
		}else{
			$errorseleccionar = true;
			$errormsg = "No se ha seleccionado una opción";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Punto Print - Soluciones en impresiones</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
    		<!--incluyo el menu-->
			<?php include 'menu_admin.php' ?>
			<br>
			<br>
	</div>
	<br>
	<div class="container-fluid">
		<div class="row">
			<h1 class="h-negro text-center">CENTRO DE ESTADÍSTICAS DEL SITIO</h1>
			<h3 class="h-negro text-center"><?php if($titulo3 != "") echo $titulo3; ?></h3>
			<br>
			<div class="panel panel-default col-lg-3">
				<div class="panel-body">
					<form action="estadisticas" method="post">
						<h4 class="h-negro">Seleccione una consulta</h4>
						<select name="tipografico" id="" class="form-control">
							<?php 
							$option = "<option value='0' selected=''>Seleccionar</option>";
							if ($grafico == 1) {
							$option .= "<option value='1' selected>Clientes registrados por mes</option>";
							}else{
							$option .= "<option value='1'>Clientes registrados por mes</option>";
							}
							if ($grafico == 2) {
							$option .= "<option value='2' selected>Productos más vendidos</option>";
							}else{
							$option .= "<option value='2'>Productos más vendidos</option>";
							}
							if ($grafico == 3) {
							$option .= "<option value='3' selected>Productos más vendidos por medida</option>";
							}else{
							$option .= "<option value='3'>Productos más vendidos por medida</option>";
							}
							if ($grafico == 4) {
							$option .= "<option value='4' selected>Conversaciones iniciadas por mes</option>";
							}else{
							$option .= "<option value='4'>Conversaciones iniciadas por mes</option>";
							}
							if ($grafico == 5) {
							$option .= "<option value='5' selected>Productos con más comentarios al mes</option>";
							}else{
							$option .= "<option value='5'>Productos con más comentarios al mes</option>";
							}
							print ($option);
							?>
						</select>
						<br>
						<h4 class="h-negro">Fecha de inicio</h4>
	                    <input type="text" name="fecha_inicio" placeholder="Fecha de inicio" class="form-control datepicker" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo $fechai_mostrar ?>">
	                    <h4 class="h-negro">Fecha de finalizacion</h4>
	                    <input type="text" name="fecha_fin" placeholder="Fecha de finalizacion" class="form-control datepicker" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?php echo $fechaf_mostrar ?>">
	                    <br>
	                    <button class="btn btn-default btn-block" name="enviar">Generar reporte</button>
                    </form>
				</div>
			</div>
			<div class="panel panel-default col-lg-9">
				<div class="panel-body">
		    		<div id="container"></div>
		    	</div>
		    </div>	
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<?php include 'scripts.php';?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <!--GRAFICO DE LINEA-->
	<!--<script>
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
    </script>-->
    <?php //include 'graficos/graficos4.php' ?>
    <?php 
    	if (isset($_POST['enviar'])){
    		if ($errorseleccionar) {
	    	echo ("<script>swal('Lo sentimos','".$errormsg."','info');</script>");
		    }else{
		    	if ($grafico == 1) {
					include 'graficos/graficos1.php';
				}
				if ($grafico == 2) {
					include 'graficos/graficos2.php';
				}
				if ($grafico == 3) {
					include 'graficos/graficos3.php';
				}
				if ($grafico == 4) {
					include 'graficos/graficos4.php';
				}
				if ($grafico == 5) {
					include 'graficos/graficos5.php';
				}
		    }
    	}
    ?>
    <!--GRAFICO DE PASTEL-->
	<!--<script type="text/javascript">
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
	</script>-->
	<!--GRAFICO DRILLDOWN-->
	<!--<script type="text/javascript">
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
	</script>-->
	<!--<script type="text/javascript">
            $(function () {
                $('#container').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'PUNTO PRINT'
                    },
                    subtitle: {
                        text: 'COMENTARIOS DE PRODUCTOS POR MES'
                    },
                    xAxis: {
                        <?php print($categories); ?>
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Total fruit consumption'
                        },
                        stackLabels: {
                            enabled: true,
                            style: {
                                fontWeight: 'bold',
                                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                            }
                        }
                    },
                    legend: {
                        align: 'right',
                        x: -30,
                        verticalAlign: 'top',
                        y: 25,
                        floating: true,
                        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                        borderColor: '#CCC',
                        borderWidth: 1,
                        shadow: false
                    },
                    tooltip: {
                        headerFormat: '<b>{point.x}</b><br/>',
                        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                    },
                    plotOptions: {
                        column: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: true,
                                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                                style: {
                                    textShadow: '0 0 3px black'
                                }
                            }
                        }
                    },
                    <?php print($barra);?>
                });
            });
	</script>-->
</body>
</html>