<?php 
	///PARA SACAR LOS PRODUCTOS MÁS VENDIDOS POR MES
	$datag = "data: [";
	$sql = "SELECT p.nombre_producto, COUNT(c.id_medida) FROM productos p, medidas_producto m, carritos c WHERE p.id_producto = m.id_producto AND c.id_medida = m.id_medida GROUP BY p.nombre_producto";
	$stmt = $con->prepare($sql);
	$stmt->execute(array());
	while ($data = $stmt->fetch(PDO::FETCH_BOTH)) {
		$datag .= "{name: '".$data[0]."',y:".$data[1]."},";
	}
	$datag .= "]";
?>