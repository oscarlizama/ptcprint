<?php
	//CREO LA FUNCION
	function mthAgregar($tabla,$campos_tabla,$valores){
		require 'conexion.php';
		//VEO LA LONGITUD DE LOS CAMPOS DE LA TABLA PARA CONSTRUIR LA CONUSULTA SQL
		$longitud_campos = count($campos_tabla);
		$i = 1;
		//VARIABLES PARA ALMACENAR TEXTO
		$campos = "";
		$valor_campo = "";
		$parametros = "";
		$sql = null;
		//RECORRO EL ARREGLO DE LOS CAMPOS Y LES DOY FORMATO PARA LA CONSULTA SQL
		foreach ($campos_tabla as $campo) {
			if($i < $longitud_campos){
				//SI NO ES LE ÚLTIMO CAMPO LO CONCATENO CON ESE FORMATO
				$campos .= $campo . ",";
				$parametros .= '?,';
			}else{
				//SI ES EL ULTIMO CAMPO, LO CONCATENO CON ESE FORMATO
				$campos .= $campo;
				$parametros .= '?';
			}
			$i = $i + 1;
		}
		//VULVE ESA VARIABLE A SU ESTADO NORMAL PARA OCUPARLA EN ESTE FOREACH
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//CONSTRUYO LA CONSULTA EN BASE AL FORMATO QUE LES DI EN EL FOREACH
		$sql = "INSERT INTO " .$tabla . "(" .$campos .") VALUES (" .$parametros .");";
		$stmt = $con->prepare($sql);


		$resp = "fail";
		if ($stmt->execute($valores))
			$resp = "success";

		//LIMPIO LA CONSULTA Y CIERRO LA CONXION
		$sql = null;
		$con = null;

		echo $resp;
	}
?>