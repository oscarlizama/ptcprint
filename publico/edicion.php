<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edicion de Imagenes</title>
	<?php include 'links.php';?>
</head>
<body>
	<?php include 'menu.php' ?>
	<div class="uk-grid">
		<div class="uk-width-1-1 titulo-f uk-text-center uk-text-large uk-text-middle header">
			<h3 class="titulo-f">EDICION DE PRODUCTOS</h3>			
		</div>		
	</div>
	<div class="uk-grid">
		<div class="uk-hidden-small uk-hidden-medium uk-width-large-1-4 uk-text-center"> <!--Epacio para la prevista y el texto-->
			<h3>Estoy Editando mi</h3>
			<div class="uk-button-dropdown" data-uk-dropdown>
    			<!-- boton para el dropdown -->
			    <button class="uk-button uk-button-large">Camisa <span class="uk-icon-caret-down"></span></button>
			    <!-- El listado que caerá -->
			    <div class="uk-dropdown uk-dropdown-small">
			        <ul class="uk-nav uk-nav-dropdown "> <!-- seleccionador de las ediciones-->
			            <li><a href="">Banner</a></li>
			            <li><a href="">Camisa</a></li>
			        </ul>
			    </div>
			</div>
			<br>
			<br>
			<button class="uk-button uk-button-primary" id="btnVer"> Ver</button>
			<br>
			<br>
			<img src="" id="canvasImg" class="imgprevse" alt="Click derecho y guardar" > <!--Es la imagen en la que cargará el canvas como imagen-->
		</div>
		<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-3-4"><!--Espacio para la propia edicion-->
			<div class="barher uk-hidden-medium uk-hidden-small"> <!--barra de edicion superior-->
					<span class="uk-icon-hover uk-icon-backward uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-forward uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-font uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-clipboard uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-close uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-eyedropper uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-arrows uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-crop uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-folder-open-o uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-save uk-icon-large iconp"></span>
			</div>
			<div class="barherSM uk-hidden-large"> <!--Barra de edicion superior para menores de medio-->
					<span class="uk-icon-hover uk-icon-backward uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-forward uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-font uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-clipboard uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-close uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-eyedropper uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-arrows uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-crop uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-folder-open-o uk-icon-large iconp"></span>
					<span class="uk-icon-hover uk-icon-save uk-icon-large iconp"></span>
			</div>
			<div class="uk-grid uk-hidden-small uk-hidden-medium"> <!--Espacio para el canvas de edicion-->
				<div class="uk-width-9-10">
					<canvas id="canvasedi" width="879" height="420">
					</canvas>					
				</div>
				<div class="uk-width-1-10 barlat"> <!--Barra lateral-->
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl rojof"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl amarillof"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl azulf"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl verdef"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl moradof"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl cafef"></span> <br>
				</div>
			</div>
			<div class="uk-grid uk-hidden-small uk-hidden-large">
				<div class="uk-width-9-10">
					<canvas id="canvasediM" width="675" height="460"> <!--Canvas ya reducido para tamaño medio-->
					</canvas>					
				</div>
				<div class="uk-width-1-10 barlatM"> <!--Barra lateral para tamaño medio-->
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl rojof"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl amarillof"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl azulf"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl verdef"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl moradof"></span> <br>
					<span class="uk-icon-hover uk-icon-square uk-icon-large iconpl cafef"></span> <br>
				</div>
			</div>			
		</div>
	</div>
	<div> <!--div de prueba-->
			
	</div>
	
	<script type="text/javascript" src="js/canvas.js"></script>
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>	
</body>
</html>