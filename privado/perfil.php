<?php 
    $id_clien = null;
    $entro = false;
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        include 'procesos/lifeprivate.php';
        if(!empty($_SESSION['autenticadop'])){
            $nombre = $_SESSION['autenticadop'];
            require 'procesos/conexion.php';
            $sql = "SELECT * FROM usuarios WHERE correo_usuario=?";
            $correo = $_SESSION['emailc'];
            $stmt = $con->prepare($sql);
            $stmt->execute(array($correo));
            $nomb = $stmt->fetch(PDO::FETCH_BOTH);
            $nombre = $nomb[1];
            $id_us = $nomb[0];
            $con = null;
            $boton = true;
            $entro = true;
        }
        else{
            $nombre = "Iniciar sesión";
        }
    }
?>
<html lang="es">
<head>
	<title>Punto Print | Mi perfil</title>
    <!--incluyo el archivo maestro-->
	<?php include 'links.php';?>
</head>
<body>
<!--incluyo el archivo maestro-->
<?php include 'menu_admin.php' ?>
<br>
<br>
<br>
<!--AQUI SE CARGAN LAS PRENDAS A COMPRAR-->
<div class="container-fluid">
	<div class="row">
        <!--TABLA DONE SE DETALLA COMO QUEDA LA FACTURA-->
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <h2 class="text-center h-negro">MI PERFIL</h2>
            <br>
		</div>
        <p class="hide" id="id"><?php echo $nomb[0];?></p>
        <div class="col-lg-offset-1 col-md-offset-1 col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DATOS PERSONALES
                </div>
                <div class="panel-body">
                <?php
                    print (isset($mensaje) != ""?"<div>$mensaje</div>":"");
                ?>
                    <br>
                    <label for="" class="labels">NOMBRES:</label>
                    <input type="text" class="form-control" placeholder="Nombres" name="txtNombreUs" value="<?php echo $nomb[1];?>" id="nombres" autocomplete='off'>
                    <br>
                    <label for="" class="labels">APELLIDOS:</label>
                    <input type="text" class="form-control" placeholder="Apellidos" name="ApellidoUs"value="<?php echo $nomb[2];?>" id="apellidos" autocomplete='off'>
                    <br>
                    <label for="" class="labels">CORREO ELECTRÓNICO:</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">@</span>
                      <input type="text" class="form-control col-lg-6" placeholder="Contraseña" aria-describedby="basic-addon1" value="<?php echo $nomb[4];?>" id="correo" readonly autocomplete='off'>
                      <br>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            <br>
                            <button class="btn btn-buy btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12" id="guardar_perfil">GUARDAR</button>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 col-lg-offset-1">
                            <br>
                            <button class="btn btn-danger btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12" id="cancelar">CANCELAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    CAMBIAR MI CONTRASEÑA
                </div>
                <div class="panel-body">
                    <br>
                    <label for="" class="labels">CONTRASEÑA:</label>
                    <div class="input-group">
                      <span class="input-group-addon glyphicon glyphicon-link" id="basic-addon1"></span>
                      <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1" value="" id="clave" autocomplete='off'>
                    </div>
                    <br>
                    <label for="" class="labels">REPITA LA CONTRASEÑA:</label>
                    <div class="input-group">
                      <span class="input-group-addon glyphicon glyphicon-retweet" id="basic-addon1"></span>
                      <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1" value="" id="claver" autocomplete='off'>
                      <br>
                    </div>
                    <div class="col-lg-8 col-md-4 col-sm-6 col-xs-12 col-lg-offset-2">
                        <br>
                        <button class="btn btn-buy btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12" id="guardar_contra">CAMBIAR CONTRASEÑA</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<br>
<br>
<?php include 'scripts.php' ?>
</body>
</html>