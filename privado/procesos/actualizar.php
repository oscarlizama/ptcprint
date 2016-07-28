<?php
	function mthActualizar($tabla,$campos_tabla,$valores,$where){
		//SABER CUANTOS CAMPOS TIENE LA TABLA
		$longitud_campos = count($campos_tabla);
		$i = 1;
		//PARA ALMACENAR LOS CAMPOS Y VARIABLES DE TEXTO
		$campos = "";
		$valor_campo = "";
		$parametros = "";
		$sql = null;
		//RECORRO EL ARREGLO DONDE ESTAN LOS CAMPOS A OCUPAR
		foreach ($campos_tabla as $campo) {
			if($i < $longitud_campos){
				//SI NO ES LE ULTIMO CAMPO, TENDRA ESTE FORMATO
				$campos .= $campo . "=?,";
				
			}else{
				//SI ES EL ULTIMO CAMPO SE CONCATENA CON ESTE FORMATO
				$campos .= $campo . "=?";
			}
			$i = $i + 1;
		}
		//VUELVE LA VARIABLE PARA USARLA EN EL SIGUIENTE FOREACH
		require 'conexion.php';
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE " .$tabla . " SET " .$campos . " WHERE " .$where;
		$stmt = $con->prepare($sql);
		

		$resp = "fail";
		if ($stmt->execute($valores))
			$resp = "success";

		$sql = null;
		$con = null;

		echo $resp;
	}
?>