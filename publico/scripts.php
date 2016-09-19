<!--script para el modernizers-->
<script type="text/javascript" src="/resources/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<!--SCRIPT PARA EL JQUERY-->
<script type="text/javascript" src="/resources/js/vendor/jquery-1.11.2.min.js"></script>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->
<!--ENALZO EL JQUERY DEL FRAMEWORK-->
<script type="text/javascript" src="/resources/js/vendor/uikit.min.js"></script>
<script type="text/javascript" src="/resources/js/vendor/bootstrap.js"></script>
<!--<script type="text/javascript" src="publico/js/vendor/docs.js"></script>-->
<!--ENLAZO MI SCRIPT-->
<script type="text/javascript" src="/resources/js/main.js"></script>
<!--ENALZO LOS SCRIPTS PARA QUE LOS EFECTOS DE LA PAGINA FUNCIONEN-->
<!--SON SCRIPTS QUE YA VENIAN CON EL FRAMEWORK-->
<script type="text/javascript" src="/resources/js/components/upload.js"></script>
<script type="text/javascript" src="/resources/js/components/slideshow.js"></script>
<script type="text/javascript" src="/resources/js/components/datepicker.js"></script>
<script type="text/javascript" src="/resources/js/components/slider.js"></script>
<script type="text/javascript" src="/resources/js/components/form-select.js"></script>
<script type="text/javascript" src="/resources/js/components/slideshow-fx.js"></script>
<script type="text/javascript" src="/resources/js/vendor/modal.js"></script>
<script type="text/javascript" src="/resources/js/components/lightbox.js"></script>
<script type="text/javascript" src="/resources/js/components/slideset.js"></script>
<script type="text/javascript" src="/resources/js/components/tooltip.js"></script>
<script type="text/javascript" src="/resources/js/components/form-password.js"></script>
<script type="text/javascript" src="/resources/js/components/notify.js"></script>
<script type="text/javascript" src="/resources/js/vendor/msjclient.js"></script>
<script type="text/javascript" src="/resources/js/vendor/uploadcot.js"></script>
<script type="text/javascript" src="/resources/js/vendor/carrito.js"></script>
<script type="text/javascript" src="/resources/js/vendor/elegirp.js"></script>
<!--ENLAZO EL SCRIPT DEL MENÚ-->
<script type="text/javascript" src="/resources/js/vendor/menu-print.js"></script>
<script type="text/javascript" src="/resources/js/vendor/acciones_front.js"></script>
<!--ENLAZO EL SCRIPT DEL MENÚ
<script type="text/javascript" src="publico/js/vendor/canvas.js"></script>-->
<script type="text/javascript" src="/resources/js/vendor/sweetalert.min.js"></script>
<script type="text/javascript" src="/resources/js/vendor/perfilusr.js"></script>
<script type="text/javascript" src="/resources/js/vendor/sesion.js"></script>
<script type="text/javascript" src="/resources/js/vendor/comentarios.js"></script>
<script type="text/javascript" src="/resources/js/siguiente.js"></script>
<script type="text/javascript" src="/resources/js/menu.js"></script>
<script type="text/javascript" src="/resources/js/vendor/errorreg.js"></script>
<script type="text/javascript" src="/resources/js/vendor/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="/resources/js/vendor/bootstrap-datepicker.es.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="/resources/js/vendor/cotizar_cliente.js"></script>
<?php 
	//echo $_SERVER['REQUEST_URI'];
	if ($_SERVER['REQUEST_URI'] == "/iniciarsesion" || $_SERVER['REQUEST_URI'] == "/registrarme" || $_SERVER['REQUEST_URI'] == "/verificarcuenta") {
	}else{
		if ($nombre != "Iniciar sesión") {
			echo "<script type='text/javascript' src='/resources/js/vendor/mensajestimer.js'></script>";	
		}
	}
?>