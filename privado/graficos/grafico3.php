<?php 
	$drilldown = "series: [";
	$datag = "data: [";
	$sql = "SELECT p.nombre_producto, COUNT(c.id_medida),p.id_producto FROM productos p, medidas_producto m, carritos c WHERE p.id_producto = m.id_producto AND c.id_medida = m.id_medida GROUP BY p.nombre_producto";
	$stmt = $con->prepare($sql);
	$stmt->execute(array());
	while ($data = $stmt->fetch(PDO::FETCH_BOTH)) {
		$datag .= "{name: '".$data[0]."',y:".$data[1].",drilldown: '".$data[0]."'},";
		$sql2 = "SELECT p.nombre_producto, m.medida, COUNT(c.id_medida) FROM productos p, medidas_producto m, carritos c WHERE p.id_producto = m.id_producto AND c.id_medida = m.id_medida AND p.id_producto=? GROUP BY c.id_medida";
		//echo $data;
		$stmt2 = $con->prepare($sql2);
		$stmt2->execute(array($data[2]));
		$drilldown .= "{name: '".$data[0]."',id:'".$data[0]."',data: [";
		while ($data2 = $stmt2->fetch(PDO::FETCH_BOTH)) {
			$drilldown .= "['Medida: ".$data2[1]."',".$data2[2]."],";
		}
		$drilldown .= "]},";
	}
	$drilldown .= "]";
	$datag .= "]";
?>