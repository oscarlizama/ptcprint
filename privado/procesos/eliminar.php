<?php
	function mthEliminar($tabla,$where,$estado,$valores){
		require 'conexion.php';
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE " . $tabla ." SET " . $estado ." WHERE " .$where;
		$stmt = $con->prepare($sql);
		$resp = "fail";
		if ($stmt->execute($valores))
			$resp = "success";
		$sql = null;
		$con = null;

		echo $resp;
	}
?>