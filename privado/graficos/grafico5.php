<?php 
	$fecha_inicio = "";
	$fecha_fin = "";
	$meses = "";
	$datanum = null;
	$namegr = null;
	$todos = "";
	$todosfinal = "";
	$pasada = false;
	$fecha1 = new DateTime($_POST['fecha_inicio']);
	$fecha2 = new DateTime($_POST['fecha_fin']);
	$m = substr($_POST['fecha_inicio'],-5,2);
	$original_m;
	$idsf = array();
	if ($m > 10) {
		$original_m = $m;
	}else{
		$m = substr($m,-1,1);
		$original_m = $m;
	}
	$fecha = $fecha1->diff($fecha2);
	$mff = $fecha->m + 1;	
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
	//$barra = "series: [";
	//$valores = "";
	$ids = "SELECT id_producto FROM comentarios GROUP BY id_producto";
	$stmtid = $con->prepare($ids);
	$stmtid->execute(array());
	$f = 1;
	while($resul = $stmtid->fetch(PDO::FETCH_BOTH)){
		array_push($idsf, $resul[0]);
	}
	for($g = 0; $g < count($idsf);$g++) {
		$m = $original_m;
		for ($i = 0; $i < $mff; $i++) {
			//echo "string";
			$fecha_fin = substr($_POST['fecha_inicio'],0,4) . "-" . $m . "-31";
			$fecha_inicio = substr($_POST['fecha_inicio'],0,4) . "-" . $m . "-1";
			$m = $m + 1;
			if ($i > 0) {
				if (($mff - $i) == 0) {
					//EL ULTIMO MES
					$sql = "SELECT p.nombre_producto,COUNT(p.id_producto) FROM productos p, comentarios c WHERE p.id_producto = c.id_producto AND c.fecha_comentario BETWEEN '".$fecha_inicio."' AND '".$fecha2->format('Y-m-d')."' AND p.id_producto=".$idsf[$g]." GROUP BY p.id_producto";
					//echo($sql);
				}else{
					//LOS MESES QUE VAN EN MEDIO
					$sql = "SELECT p.nombre_producto,COUNT(p.id_producto) FROM productos p, comentarios c WHERE p.id_producto = c.id_producto AND c.fecha_comentario BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' AND p.id_producto=".$idsf[$g]." GROUP BY p.id_producto";
					//echo($sql);
				}
			}else{
				//EL PRIMER MES
				$sql = "SELECT p.nombre_producto,COUNT(p.id_producto) FROM productos p, comentarios c WHERE p.id_producto = c.id_producto AND c.fecha_comentario BETWEEN '".$fecha1->format('Y-m-d')."' AND '".$fecha_fin."' AND p.id_producto=".$idsf[$g]." GROUP BY p.id_producto";
				//echo $sql;
			}
			$stmt = $con->prepare($sql);
			$stmt->execute(array());
			while ($data = $stmt->fetch(PDO::FETCH_BOTH)) {
				if ($namegr == null) {
					$namegr = "'".$data[0]."'";
					$datanum = "data:[";
				}
				//echo $data[1];
				$datanum .= $data[1].",";
				$meses .= "'". $nombres_meses[$m -1] . "',";
			}
			//$f = $f + 1;*/
		}
		$datanum .= "]";
		//echo "HOLAAA===";
		
		$todos .= "{name:".$namegr.",".$datanum."},";
		//$todosfinal .= $todos;
		//$todos = "";
		$datanum = null;
		$namegr = null;
	}
	//echo $todos;
	$barra = "series: [".$todos."]";
	$categories = "categories :[".$meses."]";
    //$barra .= "series: [{name: '', data: [5,5,4,]},]";
?>