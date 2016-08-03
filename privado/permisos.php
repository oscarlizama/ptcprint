<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
    $button = "";
    if(!empty($_SESSION['autenticadop'])){
        $nombre = $_SESSION['autenticadop'];
        require '../privado/procesos/conexion.php';
        $sql = "SELECT id_permiso FROM usuarios WHERE id_usuario=?";
        $id = $_SESSION['idusr'];
        $stmt = $con->prepare($sql);
        $stmt->execute(array($id));
        $permiso = $stmt->fetch(PDO::FETCH_BOTH);
        $sql = "SELECT tbl_permisos FROM permisos WHERE id_permiso=?";
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
				<p id="id_reg" class="hide"></p>
				<input type="text" class="hide omitir" name="usuarios[]" value="2" id="tbl">
				<div class="panel panel-primary">
					<div class="panel-heading"><h5>ADMINISTRACIÓN DE PERMISOS</h5></div>
					<div class="panel-body">
                        <label for="" class="labels">Nombre del permiso</label>
                        <input type="text" class="form-control input omitir" name="usuarios[]" id="nombre_permiso" autocomplete='off'>
                        <br>
						<div class="row">
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Configuración</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="configuraciones[]" checked id="ng_conf">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="configuraciones[]"
                                            id="ag_conf">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="configuraciones[]"
                                            id="ed_conf">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="configuraciones[]"
                                            id="eli_conf">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Usuarios</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="usuarios[]" checked id="ng_us">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="usuarios[]"
                                            id="ag_us">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="usuarios[]"
                                            id="ed_us">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="usuarios[]"
                                            id="eli_us">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Permisos</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="permisos[]" checked id="ng_pr">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="permisos[]"
                                            id="ag_pr">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="permisos[]"
                                            id="ed_pr">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="permisos[]"
                                            id="eli_pr">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Fotos de productos</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="comentarios[]" checked id="ng_coment">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="comentarios[]"
                                            id="ag_coment">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="comentarios[]"
                                            id="ed_coment">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="comentarios[]"
                                            id="eli_coment">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Clientes</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="clientes[]" checked id="ng_cli">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="clientes[]"
                                            id="ag_cli">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="clientes[]"
                                            id="ed_cli">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="clientes[]"
                                            id="eli_cli">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Información coorporativa</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="informacion[]" checked id="ng_ic">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="informacion[]"
                                            id="ag_ic">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="informacion[]"
                                            id="ed_ic">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="informacion[]"
                                            id="eli_ic">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Redes sociales</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="redes[]" checked id="ng_rs">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="redes[]"
                                            id="ag_rs">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="redes[]"
                                            id="ed_rs">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="redes[]"
                                            id="eli_rs">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Proveedores</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="proveedores[]" checked id="ng_pro">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="proveedores[]"
                                            id="ag_pro">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="proveedores[]"
                                            id="ed_pro">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="proveedores[]"
                                            id="eli_pro">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Facturación</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="facturacion[]" checked id="ng_fac">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="facturacion[]"
                                            id="ag_fac">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="facturacion[]"
                                            id="ed_fac">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="facturacion[]"
                                            id="eli_fac">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Productos</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="productos[]" checked id="ng_prod">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="productos[]"
                                            id="ag_prod">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="productos[]"
                                            id="ed_prod">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="productos[]"
                                            id="eli_prod">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Medidas de productos</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="medidas[]" checked id="ng_mp">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="medidas[]"
                                            id="ag_mp">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="medidas[]"
                                            id="ed_mp">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="medidas[]"
                                            id="eli_mp">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Tipos de contactos</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="precios[]" checked id="ng_pp">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="precios[]"
                                            id="ag_pp">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="precios[]"
                                            id="ed_pp">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="precios[]"
                                            id="eli_pp">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Tipos de productos</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="cantidadp[]" checked id="ng_cp">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="cantidadp[]"
                                            id="ag_cp">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="cantidadp[]"
                                            id="ed_cp">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="cantidadp[]"
                                            id="eli_cp">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Mano de obra</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="mano[]" checked id="ng_mo">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="mano[]"
                                            id="ag_mo">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="mano[]"
                                            id="ed_mo">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="mano[]"
                                            id="eli_mo">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Contactos de proveedor</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="recursos[]" checked id="ng_rec">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="recursos[]"
                                            id="ag_rec">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="recursos[]"
                                            id="ed_rec">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="recursos[]"
                                            id="eli_rec">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-primary">
									<div class="panel-heading">Equipos</div>
									<div class="panel-body">
										<div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="0" name="equipo[]" checked id="ng_eq">Ninguno</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="4" name="equipo[]"
                                            id="ag_eq">Agregar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="2" name="equipo[]"
                                            id="ed_eq">Editar</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="labels"><input type="checkbox" value="1" name="equipo[]"
                                            id="eli_eq">Eliminar</label>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
                    <?php  
                        if ($valor[0] >= 4) {
                            $button = 
                            "<button class='btn btn-ag-pr btn-scrud col-lg-3 col-md-3 col-sm-3'>
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
                            <button class='btn btn-ed-pr btn-scrud col-lg-3 col-md-3 col-sm-3 disabled' disabled=''>
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
                            "<button class='btn btn-el-pr btn-scrud col-lg-3 col-md-3 col-sm-3 disabled' disabled=''>
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
                            "<button class='btn btn-nv-pr btn-scrud col-lg-2 col-md-2 col-sm-2'>
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
                <input type="text" class="form-control" id="buscar" autocomplete='off'>
                <br>
            </div>
			<div class="col-lg-12" id="tabla_div">
			<?php 
					$tabla = 
					"<table class='table-bk'>" .
						"<tr class='tb-heading'>".
							"<th><strong>#</strong></th>".
							"<th><strong>Nombre permiso</strong></th>".
							"<th><strong></strong></th>".
						"</tr>";
				$sql = "SELECT id_permiso,nombre_permiso FROM permisos WHERE estado_permiso=?";
				$stmt = $con->prepare($sql);
                $stmt->execute(array(1));
                while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
					$tabla .= 
						"<tr>".
							"<td>$datos[0]</td>".
							"<td>$datos[1]</td>".							
							"<td>".
								"<button class='btn-table-pr' onclick='seleccionar_permisos($datos[0])'>".
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