<?php 
	$fecha_inicio = "";
	$fecha_fin = "";
	$barra = "";
	$valores = "";
	$meses = "";
	$fecha1 = new DateTime($_POST['fecha_inicio']);
	$fecha2 = new DateTime($_POST['fecha_fin']);
	$m = substr($_POST['fecha_inicio'],-5,2);
	if ($m > 10) {
		
	}else{
		$m = substr($m,-1,1);
	}
	//echo $fecha_fin;
	$fecha = $fecha1->diff($fecha2);
	$mff = $fecha->m + 1;	
	$numeros = array();
	$nombres_meses = array(
		1 => "Enero",
		2 => "Febrero",
		3 => "Marzo",
		4 => "Abril",
		5 => "Mayo",
		6 => "Junio",
		7 => "Julio",
		8 => "Agosto",
		9 => "Septiembre",
		10 => "Octubre",
		11 => "Noviembre",
		12 => "Diciembre",
		);
	for ($i=0; $i <= $mff; $i++) { 
		/*require_once 'procesos/conexion.php';
		*/
		//echo $i;
		$fecha_fin = substr($_POST['fecha_inicio'],0,4) . "-" . $m . "-31";
		$fecha_inicio = substr($_POST['fecha_inicio'],0,4) . "-" . $m . "-1";
		if ($i > 0) {
			if (($mff - $i) == 0) {
				//EL ULTIMO MES
				$sql = "SELECT COUNT(id_cliente) FROM clientes WHERE fecha_ingreso BETWEEN '".$fecha_inicio."' AND '".$fecha2->format('Y-m-d')."' AND estado_cliente=1";
			}else{
				//LOS MESES QUE VAN EN MEDIO
				$sql = "SELECT COUNT(id_cliente) FROM clientes WHERE fecha_ingreso BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' AND estado_cliente=1";
			}
		}else{
			//EL PRIMER MES
			$sql = "SELECT COUNT(id_cliente) FROM clientes WHERE fecha_ingreso BETWEEN '".$fecha1->format('Y-m-d')."' AND '".$fecha_fin."' AND estado_cliente=1";
		}
		$stmt = $con->prepare($sql);
		$stmt->execute(array());
		while ($data = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores .= $data[0].",";
		}
		$meses .= "'". $nombres_meses[$m] . "',";
		//echo $meses;
		$m = $m + 1;
	}
	$categories = "categories :[".$meses."]";
	// echo $categories;
	$barra .= "{
		name: 'Registrados',";
	$barra .= "data: [".$valores."]";
    $barra .= "},";
?>