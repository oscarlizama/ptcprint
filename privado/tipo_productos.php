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
        $sql = "SELECT tbl_tipo_productos FROM permisos WHERE id_permiso=?";
        $id = $_SESSION['idusr'];
        $stmt = $con->prepare($sql);
        $stmt->execute(array($permiso[0]));
        $valor = $stmt->fetch(PDO::FETCH_BOTH);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tipo de Productos
	</title>
	<?php include 'links.php' ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php include 'menu_admin.php' ?>
			<br>
			<br>
			<br>
			<br>
			<div class="col-lg-12" id="frm">
				<div class="col-lg-6 col-md-6">
					<p id="id_reg" class="hide"></p>
					<input type="text" class="hide omitir" value="8" id="tbl" autocomplete='off'>
					<label for="" class="labels">Nombre de del tipo de producto</label>
                    <input type="text" class="form-control input" id="nombre" autocomplete='off'>
                    <input type="text" class="hide" value="" id="icono">
                    <br>
				</div>
				<div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
						<div class="panel-heading">
							Selecciona un icono la producto
						</div>
                    	<div class="panel-body">
                    		<div class="row">
                    			<div class="col-lg-2">
                    				<img src="imgmenu/ads.png" alt="" class="imgmenu" id="1">
                    			</div>
                    			<div class="col-lg-2">
                    				<img src="imgmenu/balloons.png" alt="" class="imgmenu" id="2">
                    			</div>
                    			<div class="col-lg-2">
                    				<img src="imgmenu/clothes.png" alt="" class="imgmenu" id="3">
                    			</div>
                    			<div class="col-lg-2">
                    				<img src="imgmenu/tarjetas.png" alt="" class="imgmenu" id="4">
                    			</div>
                    			<div class="col-lg-2">
                    				<img src="imgmenu/billboard.png" alt="" class="imgmenu" id="5">
                    			</div>
                    			<div class="col-lg-2">
                    				<img src="imgmenu/birthday-card.png" alt="" class="imgmenu" id="6">
                    			</div>
                    			<div class="col-lg-2">
                    				<br>
                    				<img src="imgmenu/door.png" alt="" class="imgmenu" id="7">
                    			</div>
                    			<div class="col-lg-2">
                    				<br>
                    				<img src="imgmenu/menu.png" alt="" class="imgmenu" id="8">
                    			</div>
                    			<div class="col-lg-2">
                    				<br>
                    				<img src="imgmenu/mode-circular-button.png" alt="" class="imgmenu" id="9">
                    			</div>
                    			<div class="col-lg-2">
                    				<br>
                    				<img src="imgmenu/rings.png" alt="" class="imgmenu" id="10">
                    			</div>
                    			<div class="col-lg-2">
                    				<br>
                    				<img src="imgmenu/wanted.png" alt="" class="imgmenu" id="11">
                    			</div>
                    			<div class="col-lg-2">
                    				<br>
                    				<img src="imgmenu/round-add-button.png" alt="" class="imgmenu" id="12">
                    			</div>
                    		</div>
                    	</div>
                    </div>
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
	</div>
	<br>
	<div class="container-fluid">
		<br>
		<div class="row">
			<div class="col-lg-12">
				<label for="" class="labels">Buscar</label>
                <input type="text" class="form-control" id="buscar">
                <br>
			</div>
			<div class="col-lg-12" id="tabla_div">
			<?php 
					$tabla = 
					"<table class='table-bk'>" .
						"<tr class='tb-heading'>".
							"<th><strong>#</strong></th>".
							"<th><strong>Tipo de Producto</strong></th>".
							"<th><strong></strong></th>".
						"</tr>";
				$sql = "SELECT id_tipo_producto, nombre_tipo_producto FROM tipos_producto WHERE estado_tipo_producto = ?";
				$stmt = $con->prepare($sql);
			    $stmt->execute(array(1));
				while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
					$tabla .= 
						"<tr>".
							"<td>$datos[0]</td>".
							"<td>$datos[1]</td>".
							"<td>".
								"<button class='btn-table' onclick='seleccionar_tipo_producto($datos[0])'>".
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