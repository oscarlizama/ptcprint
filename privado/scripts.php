<!--SCRIPT PARA EL JQUERY-->
<script type="text/javascript" src="vendor/jquery-1.11.2.min.js"></script>
<!--ENLAZO EL SCRIPT DEL MENÚ-->
<script type="text/javascript" src="vendor/uikit.min.js"></script>
<script type="text/javascript" src="components/upload.js"></script>
<script type="text/javascript" src="vendor/menu_backend.js"></script>
<script type="text/javascript" src="vendor/acciones.js"></script>
<script type="text/javascript" src="vendor/checks.js"></script>
<script type="text/javascript" src="vendor/seleccionar.js"></script>
<script type="text/javascript" src="vendor/mostrar_tbl.js"></script>
<script type="text/javascript" src="vendor/sweetalert.min.js"></script>
<script type="text/javascript" src="vendor/bootstrap.js"></script>
<script type="text/javascript" src="vendor/tooltip.js"></script>
<script type="text/javascript" src="vendor/vista-previa.js"></script>
<script type="text/javascript" src="vendor/empresap.js"></script>
<script type="text/javascript" src="vendor/busqueda.js"></script>
<script type="text/javascript" src="vendor/perfilbk.js"></script>
<script type="text/javascript" src="vendor/comentariobk.js"></script>
<script type="text/javascript" src="vendor/sesionpv.js"></script>
<script type="text/javascript" src="vendor/uploadjs.js"></script>
<script type="text/javascript" src="vendor/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="vendor/selecimg.js"></script>
<script type="text/javascript" src="vendor/msjclient.js"></script>
<?php 
	echo $_SERVER['REQUEST_URI'];
	if ($_SERVER['REQUEST_URI'] != "/ptcprint/administracion") {
		echo "<script type='text/javascript' src='vendor/mensajestimerback.js'></script>";
	}
?>