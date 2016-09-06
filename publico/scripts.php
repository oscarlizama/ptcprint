<!--script para el modernizers-->
<script type="text/javascript" src="vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<!--SCRIPT PARA EL JQUERY-->
<script type="text/javascript" src="vendor/jquery-1.11.2.min.js"></script>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->
<!--ENALZO EL JQUERY DEL FRAMEWORK-->
<script type="text/javascript" src="vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/uikit.min.js"></script>
<!--<script type="text/javascript" src="publico/js/vendor/docs.js"></script>-->
<!--ENLAZO MI SCRIPT-->
<script type="text/javascript" src="js/main.js"></script>
<!--ENALZO LOS SCRIPTS PARA QUE LOS EFECTOS DE LA PAGINA FUNCIONEN-->
<!--SON SCRIPTS QUE YA VENIAN CON EL FRAMEWORK-->
<script type="text/javascript" src="components/upload.js"></script>
<script type="text/javascript" src="components/slideshow.js"></script>
<script type="text/javascript" src="components/slider.js"></script>
<script type="text/javascript" src="components/slideshow-fx.js"></script>
<script type="text/javascript" src="vendor/modal.js"></script>
<script type="text/javascript" src="components/lightbox.js"></script>
<script type="text/javascript" src="components/slideset.js"></script>
<script type="text/javascript" src="components/tooltip.js"></script>
<script type="text/javascript" src="components/form-password.js"></script>
<script type="text/javascript" src="components/notify.js"></script>
<script type="text/javascript" src="components/datepicker.js"></script>
<script type="text/javascript" src="vendor/msjclient.js"></script>
<script type="text/javascript" src="vendor/uploadcot.js"></script>
<script type="text/javascript" src="vendor/carrito.js"></script>
<script type="text/javascript" src="vendor/elegirp.js"></script>
<!--ENLAZO EL SCRIPT DEL MENÚ-->
<script type="text/javascript" src="vendor/menu-print.js"></script>
<script type="text/javascript" src="vendor/acciones_front.js"></script>
<!--ENLAZO EL SCRIPT DEL MENÚ
<script type="text/javascript" src="publico/js/vendor/canvas.js"></script>-->
<script type="text/javascript" src="vendor/sweetalert.min.js"></script>
<script type="text/javascript" src="vendor/perfilusr.js"></script>
<script type="text/javascript" src="vendor/sesion.js"></script>
<script type="text/javascript" src="vendor/comentarios.js"></script>
<script type="text/javascript" src="js/siguiente.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="vendor/errorreg.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php 
	echo $_SERVER['REQUEST_URI'];
	if ($_SERVER['REQUEST_URI'] == "/ptcprint/iniciarsesion" || $_SERVER['REQUEST_URI'] == "/ptcprint/registrarme") {
	}else{
		if ($nombre != "Iniciar sesión") {
			echo "<script type='text/javascript' src='vendor/mensajestimer.js'></script>";	
		}
	}
?>