<!--SCRIPT PARA EL JQUERY-->
<script type="text/javascript" src="/resources/js/vendor/jquery-1.11.2.min.js"></script>
<!--ENLAZO EL SCRIPT DEL MENÚ-->
<script type="text/javascript" src="/resources/js/vendor/uikit.min.js"></script>
<script type="text/javascript" src="/resources/js/components/upload.js"></script>
<script type="text/javascript" src="/resources/js/vendor/menu_backend.js"></script>
<script type="text/javascript" src="/resources/js/vendor/acciones.js"></script>
<script type="text/javascript" src="/resources/js/vendor/checks.js"></script>
<script type="text/javascript" src="/resources/js/vendor/seleccionar.js"></script>
<script type="text/javascript" src="/resources/js/vendor/mostrar_tbl.js"></script>
<script type="text/javascript" src="/resources/js/vendor/sweetalert.min.js"></script>
<script type="text/javascript" src="/resources/js/vendor/bootstrap.js"></script>
<script type="text/javascript" src="/resources/js/vendor/tooltip.js"></script>
<script type="text/javascript" src="/resources/js/vendor/vista-previa.js"></script>
<script type="text/javascript" src="/resources/js/vendor/empresap.js"></script>
<script type="text/javascript" src="/resources/js/vendor/busqueda.js"></script>
<script type="text/javascript" src="/resources/js/vendor/perfilbk.js"></script>
<script type="text/javascript" src="/resources/js/vendor/comentariobk.js"></script>
<script type="text/javascript" src="/resources/js/vendor/sesionpv.js"></script>
<script type="text/javascript" src="/resources/js/vendor/uploadjs.js"></script>
<script type="text/javascript" src="/resources/js/vendor/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="/resources/js/vendor/bootstrap-datepicker.es.min.js"></script>
<script type="text/javascript" src="/resources/js/vendor/selecimg.js"></script>
<script type="text/javascript" src="/resources/js/vendor/msjclient.js"></script>
<script type="text/javascript" src="/resources/js/vendor/redessociales.js"></script>
<?php 
	//echo $_SERVER['REQUEST_URI'];
	if ($_SERVER['REQUEST_URI'] != "/administracion") {
		echo "<script type='text/javascript' src='/resources/js/vendor/mensajestimerback.js'></script>";
	}
?>