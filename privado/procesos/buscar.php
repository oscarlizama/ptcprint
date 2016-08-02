<?php 
	require 'conexion.php';
	$valores = "";

	if($_POST['sql'] == 1){
		$buscar = $_POST['buscar'];
		$sql = "SELECT * FROM usuarios WHERE (usuarios.nombre_usuario LIKE ? OR usuarios.apellido_usuario LIKE ?) AND estado_usuario=1";
		$i = 0;
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,$b));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_usuario'], 
				1 => $datos['nombre_usuario'],
				2 => $datos['apellido_usuario'],
				3 => $datos['correo_usuario']
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 2){
		$buscar = $_POST['buscar'];
		$sql = "SELECT id_permiso,nombre_permiso FROM permisos WHERE nombre_permiso LIKE ? AND estado_permiso=?";
		$i = 0;
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,1));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_permiso'], 
				1 => $datos['nombre_permiso'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 15){
		$buscar = $_POST['buscar'];
		$i = 0;
		$sql = "SELECT * FROM configuraciones WHERE nombre_configuracion LIKE ? AND estado_configuracion=?";
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,1));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_configuracion'],
				1 => $datos['nombre_configuracion'], 
				2 => $datos['configuracion'],
				3 => $datos['descripcion_configuracion'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 16){
		$i = 0;
		$buscar = $_POST['buscar'];
		$sql = "SELECT * FROM tipos_contacto WHERE tipo_contacto LIKE ? AND estado_tipo_contacto=?";
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,1));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_tipo_contacto'],
				1 => $datos['tipo_contacto'], 
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 17){
		$i = 0;
		$buscar = $_POST['buscar'];
		$sql = "SELECT id_contacto_proveedor,proveedores.proveedor proveedor,contactos_proveedor.contacto_proveedor,tipos_contacto.tipo_contacto FROM contactos_proveedor INNER JOIN proveedores ON contactos_proveedor.id_proveedor = proveedores.id_proveedor INNER JOIN tipos_contacto ON contactos_proveedor.id_tipo_contacto = tipos_contacto.id_tipo_contacto WHERE (proveedor LIKE ? OR contacto_proveedor LIKE ?) AND estado_contacto_proveedor=?";
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,$b,1));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_contacto_proveedor'],
				1 => $datos['proveedor'], 
				2 => $datos['contacto_proveedor'],
				3 => $datos['tipo_contacto'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	//hola

	if($_POST['sql'] == 7){
		$buscar = $_POST['buscar'];
		$i = 0;
		$sql = "SELECT id_producto,nombre_producto,existencias, TP.nombre_tipo_producto FROM productos P, tipos_producto TP WHERE estado_producto = ? AND P.id_tipo_producto = TP.id_tipo_producto AND nombre_producto LIKE ?";
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array(1,$b));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_producto'],
				1 => $datos['nombre_producto'],
				2 => $datos['existencias'], 
				3 => $datos['nombre_tipo_producto'], 
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}	

	if($_POST['sql'] == 8){  //epacio para busquedas en el CRUD de tipos de producto
		$buscar = $_POST['buscar'];
		$i = 0;
		$sql = "SELECT id_tipo_producto, nombre_tipo_producto FROM tipos_producto WHERE estado_tipo_producto = ? AND nombre_tipo_producto LIKE ?";
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array(1,$b));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_tipo_producto'],
				1 => $datos['nombre_tipo_producto'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 9){ //info de la tabla del crud de tipo de productos
		$buscar = $_POST['buscar'];
		$i = 0;
		$sql = "SELECT id_medida, P.nombre_producto, medida FROM medidas_producto M, productos P WHERE M.id_producto = P.id_producto AND estado_medida = ? AND nombre_producto LIKE ?";
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array(1,$b));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array( //orden establecido previamente
				0 => $datos['id_medida'],
				1 => $datos['nombre_producto'],
				2 => $datos['medida']
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 10){
		$buscar = $_POST['buscar'];
		$i = 0;
		$sql = "SELECT id_foto_producto, P.nombre_producto, foto_producto FROM productos P, fotos_productos FP WHERE estado_foto_producto = ? AND P.id_producto = FP.id_producto AND P.nombre_producto LIKE ?";
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array(1,$b));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_producto'], 
				1 => $datos['foto_producto'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 21){
		$i = 0;
		$buscar = $_POST['buscar'];
		$sql = "SELECT * FROM proveedores WHERE proveedor LIKE ? AND estado_proveedor=?";
		//echo $sql;
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,1));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_proveedor'],
				1 => $datos['proveedor'],
				2 => $datos['direccion_proveedor'], 
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 22){
		$i = 0;
		$buscar = $_POST['buscar'];
		$sql = "SELECT * FROM equipos WHERE equipo LIKE ? AND estado_equipo=?";
		//echo $sql;
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,1));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_equipo'],
				1 => $datos['equipo'],
				2 => $datos['costo_click_equipo'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}		

	if($_POST['sql'] == 23){
		$i = 0;
		$buscar = $_POST['buscar'];
		$sql = "SELECT * FROM mano_obra WHERE actividad LIKE ? AND estado_obra=?";
		//echo $sql;
		$b = "%".$buscar."%";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($b,1));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores[$i] = array(
				0 => $datos['id_actividad'],
				1 => $datos['actividad'],
				2 => $datos['costo_hora'],
				3 => $datos['descripcion_actividad'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}
?>