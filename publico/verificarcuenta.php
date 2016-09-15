<?php 
	//echo $_GET['verificar'];
	//echo("*****");
	//echo $_GET['numverif'];
	$caducado = true;
	$correcto = false;
	$error = false;
	$nuevo = "";
	$error_msg = "";
	//echo("shgdahsjgdsjhadgjhsa");
	function limpiar($texto)
	{
		$textoLimpio = preg_replace('([^A-Za-z0-9])', '', $texto);	     					
  		return $textoLimpio;
	}
	//echo $textonuevo;
	if ($_GET != null) {
		$verificar = $_GET['verificar'];
		//echo $verificar;
		//$id = $_GET['numverif'];
		require_once "../privado/procesos/conexion.php";
		$clientes = "SELECT correo_cliente FROM clientes WHERE estado_cliente=?";
		$stmt = $con->prepare($clientes);
		$stmt->execute(array(2));
		//echo "skhdasjhdsja";
		while ($clientesdata = $stmt->fetch(PDO::FETCH_NUM)) {
			//echo "HOLAA";
			if (limpiar(base64_encode($clientesdata[0])) == $verificar) {
				$nuevo = $clientesdata[0];
				$caducado = false;
				$correcto = true;
				//echo("hola");
			}
		}
		if ($caducado) {
			//header('Location: inicio');
		}
		//echo $nuevo;
		/*$estadoverif = "SELECT estado_cliente FROM clientes WHERE id_cliente=?";
		$sql = "SELECT correo_cliente FROM clientes WHERE id_cliente=?";
		$stmt = $con->prepare($sql);
		$stmt->execute(array($id));
		$correo = $stmt->fetch(PDO::FETCH_BOTH);
		//echo $correo[0];
		if (password_verify($correo[0],$verificar)) {
			$correcto = true;
		}*/
	}else{
		//header('Location: inicio');
	}
	if (isset($_POST['btnverificar'])) {
		include "../privado/procesos/validaciones.php";
		$nuevo = $_POST['correo'];
		$correo = $_POST['correo'];
		$clave = $_POST['clave'];
		if (validar_clave($clave,$error_msg)) {
			require "../privado/procesos/conexion.php";
			$usuario = "SELECT clave_cliente FROM clientes WHERE correo_cliente=? AND estado_cliente=?";
			$stmtclave = $con->prepare($usuario);
			$stmtclave->execute(array($correo,2));
			$clavecl = $stmtclave->fetch(PDO::FETCH_NUM);
			if (password_verify($clave,$clavecl[0])) {
				$cuenta = "UPDATE clientes SET estado_cliente=? WHERE correo_cliente=?";
				$stmt = $con->prepare($cuenta);
				if ($stmt->execute(array(1,$correo))) {
					header('Location: iniciarsesion');
				}	
			}else{
				$error = true;
				$error_msg = "La clave es incorrecta";	
			}
		}else{
			$error = true;
			$error_msg = "La clave ingresada contiene caratéres inválidos";
		}
	}
?>
<html>
	<head>
		<?php 
			include "links.php";
		?>
		<title>Verificar cuenta | Punto Print</title>
	</head>
	<body id="bodylogin">
		<br>
		<div class="container-fluid">
			<br>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-2" id="logindiv">
				<br>
				<div class="panel panel-default">
					<div class="panel-body">
						<h1 class="text-center">VERIFICAR CUENTA</h1>
						<br>
						<form action="verificarcuenta" class="text-center" method="post">
							<h4>Ingresa tu contraseña para terminar de verificar tu cuenta</h4>
							<br>
							<label for="">CONTRASEÑA</label>
							<br>
							<br>
							<input class="hide" autocomplete="off" name="correo" value="<?php echo($nuevo)?>">
							<div class="uk-form-icon uk-width-1-1 uk-text-left">
		                        <i class="uk-icon-lock"></i>
		                        <input class="form-control" type="password" autocomplete="off" name="clave">
		                    </div>
							<br>
							<br>
							<button class="btn btn-medium btn-pink btn-block" name="btnverificar">Verificar mi cuenta</button>
							<a class="btn btn-link pull-right" href="recuperar">Olvidé mi contraseña</a>
							<br>
							<br>
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--FIN DEL FOOTER-->
		<!--script para el modernizers-->
		<script type="text/javascript" src="/publico/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		<!--SCRIPT PARA EL JQUERY-->
		<script type="text/javascript" src="/publico/js/vendor/jquery-1.11.2.min.js"></script>
		<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->
		<!--ENALZO EL JQUERY DEL FRAMEWORK-->
		<script type="text/javascript" src="/publico/js/vendor/uikit.min.js"></script>
		<script type="text/javascript" src="/publico/js/vendor/bootstrap.js"></script>
		<!--<script type="text/javascript" src="publico/js/vendor/docs.js"></script>-->
		<!--ENALZO LOS SCRIPTS PARA QUE LOS EFECTOS DE LA PAGINA FUNCIONEN-->
		<!--SON SCRIPTS QUE YA VENIAN CON EL FRAMEWORK-->
		<script type="text/javascript" src="/publico/js/components/notify.js"></script>
		<!--ENLAZO EL SCRIPT DEL MENÚ-->
		<script type="text/javascript" src="/publico/js/vendor/errorreg.js"></script>
		<?php 
			if($error){
				echo "<script>error_registrar('$error_msg');</script>";
			}
		?>
	</body>
</html>