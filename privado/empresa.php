<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
	$registro = false;
	$numero = 0;
	$empresa = "SELECT COUNT(nombre_empresa) AS empresa FROM empresa";
	$stmt = $con->prepare($empresa);
	$stmt->execute(array());
	$res = $stmt->fetch(PDO::FETCH_BOTH);
	if ($res['empresa']>0) {
		$registro = true;
		$numero = 5;
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
				<?php 
					$empresa_datos = "";
					$sql = "SELECT * FROM empresa";
					foreach ($con->query($sql) as $datos) {
						$empresa_datos .= "<div class='col-lg-6 col-md-6'>";
							$empresa_datos .= "<p id='id_reg' class='hide'>$numero</p>";
							$empresa_datos .= "<input type='text' class='hide omitir' value='18' id='tbl' autocomplete='off'>";
							$empresa_datos .= "<label for='' class='labels'>Nombre de la empresa</label>";
							$empresa_datos .= "<input type='text' class='form-control input' id='empresa' value='$datos[1]' autocomplete='off'>";
							$empresa_datos .= "<br>";
							$empresa_datos .= "<label for='' class='labels'>Misión</label>";
                    		$empresa_datos .= "<textarea type='text' class='form-control input estira' id='mision'>$datos[2]</textarea autocomplete='off'>";
                    		$empresa_datos .= "<br>";
                    		$empresa_datos .= "<label for='' class='labels'>Visión</label>";
                    		$empresa_datos .= "<textarea type='text' class='form-control input estira' id='vision' autocomplete='off'>$datos[3]</textarea>";
                    		$empresa_datos .= "<br>";
                    		$empresa_datos .= "<label for='' class='labels'>Valores</label>";
                    		$empresa_datos .= "<textarea type='text' class='form-control input estira' id='valores'>$datos[4]</textarea autocomplete='off'>";
                    		$empresa_datos .= '<br>';
                    	$empresa_datos .= "</div>";
                    	$empresa_datos .= "<div class='col-lg-3 col-md-3'>";
							$empresa_datos .= "<output id='list'></output>";
                    		$empresa_datos .= "<img src='data:image/*;base64,$datos[5]' class='img-responsive'>";
							$empresa_datos .= "<label for='' class='labels'>Logo</label>";
							$empresa_datos .= "<form method='post' id='formulario' enctype='multipart/form-data'>";
								$empresa_datos .= "<input type='text' class='input hide omitir' id='imagenb64' name='antigua' value='ninguna' autocomplete='off'>"
                    			$empresa_datos .= "<input type='file' class='input' id='imagen' name='file' autocomplete='off'>";
                    		$empresa_datos .= "</form>";
                    		$empresa_datos .= "<br>";
						$empresa_datos .= "</div>";
					}
					print($empresa_datos);
				?>
				<div class="col-lg-12">
					<?php 
						$boton = "";
						if ($registro == false) {
							/*$boton = "<button class='btn btn-ag btn-scrud col-lg-8 col-md-8 col-sm-8 col-lg-push-2 col-md-push-2'>
								AGREGAR
								<span class='flaticon-correct icon-ag icon-button'></span>
							</button>";*/
						}
						else{
							$boton = "<button class='btn btn-ed btn-scrud col-lg-8 col-md-8 col-sm-8 col-md-pull-3 col-lg-push-2 col-md-push-2'>
								EDITAR
								<span class='flaticon-new-file icon-button icon-ed'></span>
							</button>";
						}
						print($boton);
					?>
				</div>
			</div>
		</div>
		<br>
	</div>
	<?php include 'scripts.php';?>
	<?php 
		if($registro == false){
			echo "<script>swal('¡No han sido configurados!', 'No se han especificado los campos', 'warning');</script>";
			echo "<script>empresa_nombre()</script>";
		}
	?>
</body>
</html>