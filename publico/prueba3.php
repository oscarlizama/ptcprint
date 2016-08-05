<!DOCTYPE html>
<html lang="es">
<head>
	<title>Punto Print - Soluciones en impresiones</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<!--INDICA LA CODIFICACION DE CARACTERES A OCUPAR-->
	<meta charset="UTF-8">
	<!--INDICA COMO SE DEBE INTERPRETAR UNA PAGINA EN UN NAVEGADOR MOVIL-->
	<!--el user scalable indica que no se puede redimensionar-->
	<!--enlazo uikit-->
	
	<link rel="stylesheet" href="publico/css/bootstrap.css">
	<!--ESTILOS PERSONALIZADOS-->
	<!--COMPATIBILIDAD CON IE Y DEMAS EXPLORADORES-->
	
	<!--ICONO DE LAP PAGINA-->
	

</head>
<body>   
	<a href='#' data-toggle='modal' data-target='#modal-login'>
		holaaaaa
		<span class='uk-icon-user uk-icon-medium icons-user'></span>
	</a>
   <div class="modal fade" id="modal-login">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-hidden="true" data-dismiss="modal" data-toggle="tooltip" data-placement="left" title="Cerrar">&times;</button>
                    <h4 class="modal-title">Luxury & Style | Iniciar Sesión</h4>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Bienvenido a Luxury & Style</h4>
                    <br>
                    <br>
                    <form action="privado/procesos/logincliente.php" method="post" id="form">
                        <label for="">Correo electrónico</label>
                        <input type="text" class="form-control input-md paste" name="correo" required autocomplete="off" id="correol">
                        <br>
                        <br>
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control input-md paste" name="clave" required autocomplete="off">
                        <a href="#" class="pull-right" data-toggle='modal' data-target='#recuperar'>Olvidé mi contraseña</a>
                        <br>
                        <br>
                        <button class="btn btn-buy btn-sm col-lg-12" name="iniciar_sesion" id="iniciar_sesion" type="button">INICIAR SESIÓN</button>
                        <br>
                        <br>
                        <br>
                        <a href="#" class="pull-right" data-toggle="modal" data-target="#registarme" data-dismiss="modal">No tengo cuenta ¡REGISTRAME!</a>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <h5>LUXURY & STYLE</h5>
                </div>
            </div>
        </div>
    </div>
   
	<!--SECCION DEL SLIDER-->
	
	<!--INCLUYO EL FOOTER Y LOS SCRIPTS-->
	<script src="publico/js/vendor/jquery-2.2.3.js"></script>
	<script src="publico/js/vendor/bootstrap.js"></script>
	<script src="publico/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</body>
</html>