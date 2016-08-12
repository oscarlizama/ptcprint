<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
	include 'procesos/lifeprivate.php';
	$button = "";
    if(!empty($_SESSION['autenticadop'])){
        $nombre = $_SESSION['autenticadop'];
        require '../privado/procesos/conexion.php';
        $sql = "SELECT id_permiso FROM usuarios WHERE id_usuario=?";
        $id = $_SESSION['idusr'];
        $stmt = $con->prepare($sql);
        $stmt->execute(array($id));
        $permiso = $stmt->fetch(PDO::FETCH_BOTH);
        $sql = "SELECT tbl_contactos_proveedor FROM permisos WHERE id_permiso=?";
        $id = $_SESSION['idusr'];
        $stmt = $con->prepare($sql);
        $stmt->execute(array($permiso[0]));
        $valor = $stmt->fetch(PDO::FETCH_BOTH);
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
			<br>
			<br>
			<div class="col-lg-12" id="frm">
				<div class="col-lg-6 col-md-6">
					<p id="id_reg" class="hide"></p>
					<input type="text" class="hide omitir" name="usuarios[]" value="17" id="tbl" autocomplete="off">
					<label for="" class="labels">Nombre del proveedor</label>
                    <select class="form-control" name="usuarios[]" id="id_proveedor">
                    	<option value="0" selected="">SELECCIONA EL  PROVEEDOR</option>
						<?php 
                            $sql = "SELECT * FROM proveedores where estado_proveedor=1";
                            foreach ($con->query($sql) as $datos) {
                                echo "<option value='$datos[0]'>$datos[1]</option>";
                            }
                        ?>
					</select>
                    <br>
                    <label for="" class="labels">Contacto</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="contacto" autocomplete="off">
                    <br>
                    <label for="" class="labels">Tipo de contacto</label>
                    <select class="form-control" name="usuarios[]" id="id_tipo_contacto">
                    	<option value="0" selected="">SELECCIONA EL TIPO DE CONTACTO</option>
						<?php 
                            $sql = "SELECT * FROM tipos_contacto WHERE estado_tipo_contacto=?";
                            $stmt = $con->prepare($sql);
			    			$stmt->execute(array(1));
							while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
                                echo "<option value='$datos[0]'>$datos[1]</option>";
                            }
                        ?>
					</select>
                    <br>
                    
				</div>
				<div class="col-lg-12">
					<?php  
						if ($valor[0] >= 4) {
							$button = 
							"<button class='btn btn-ag btn-scrud col-lg-3 col-md-3 col-sm-3'>
									AGREGAR
									<span class='flaticon-correct icon-ag icon-button'></span>
								</button>";
						}
						print($button);
						$button = "";
					?>
					<?php 
						if ($valor[0] == 2 || $valor[0] == 3 || $valor[0] == 6 || $valor[0] == 7) {
							$button = "
							<button class='btn btn-ed btn-scrud col-lg-3 col-md-3 col-sm-3 disabled' disabled=''>
								EDITAR
								<span class='flaticon-new-file icon-button icon-ed'></span>
							</button>";
							
						}
						print($button);
						$button = "";
					?>
					<?php 
						if ($valor[0] == 1 || $valor[0] == 3 || $valor[0] == 5 || $valor[0] == 7) {
							$button = 
							"<button class='btn btn-el btn-scrud col-lg-3 col-md-3 col-sm-3 disabled' disabled=''>
								ELIMINAR
								<span class='flaticon-cancel icon-button icon-el'></span>
							</button>";
						}
						print($button);
						$button = "";
					?>
					<?php 
						if ($valor[0] > 0) {
							$button = 
							"<button class='btn btn-nv btn-scrud col-lg-2 col-md-2 col-sm-2'>
								LIMPIAR
								<span class='flaticon-circular-arrow icon-button icon-nv'></span>
							</button>";
						}
						print($button);
						$button = "";
					?>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<label for="" class="labels">Buscar</label>
                <input type="text" class="form-control" id="buscar" autocomplete="off">
                <br>
			</div>
			<div class="col-lg-12" id="tabla_div">
			<?php 
					$tabla = 
					"<table class='table-bk'>" .
						"<tr class='tb-heading'>".
							"<th><strong>#</strong></th>".
							"<th><strong>Proveedor</strong></th>".
							"<th><strong>Contacto proveedor</strong></th>".
							"<th><strong>Tipo de contacto</strong></th>".
							"<th><strong></strong></th>".
						"</tr>";
				$sql = "SELECT id_contacto_proveedor,proveedores.proveedor proveedor,contactos_proveedor.contacto_proveedor,tipos_contacto.tipo_contacto FROM contactos_proveedor INNER JOIN proveedores ON contactos_proveedor.id_proveedor = proveedores.id_proveedor INNER JOIN tipos_contacto ON contactos_proveedor.id_tipo_contacto = tipos_contacto.id_tipo_contacto WHERE estado_contacto_proveedor=?";
				$stmt = $con->prepare($sql);
			    $stmt->execute(array(1));
				while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
					$tabla .= 
						"<tr>".
							"<td>$datos[0]</td>".
							"<td>$datos[1]</td>".
							"<td>$datos[2]</td>".
							"<td>$datos[3]</td>".
							"<td>".
								"<button class='btn-table' onclick='seleccionar_contactos_proveedor($datos[0])'>".
									"SELECCIONAR".
									"<span class='flaticon-loupe'></span>".
								"</button>".
							"</td>".
						"</tr>";
					}
					$tabla .= "</table>";
					print($tabla);
				?>
			</div>
		</div>
	</div>
	<?php include 'scripts.php';?>
</body>
</html>