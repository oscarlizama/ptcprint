<!DOCTYPE html>
<?php 
	include '../privado/procesos/conexion.php';
  	include '../privado/procesos/lifetime.php'; 
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba del Canvas</title>
	<?php include 'links.php'; ?>
	<link rel="stylesheet" type="text/css" href="resources/css/canvas.css">
	<script src="resources/js/fabric.min.js"></script>	
	<script src="resources/js/jscolor.min.js"></script>	
	<script src="resources/js/FileSaver.min.js"></script>
	<script src="resources/js/canvas-toBlob.js"></script>
</head>
<body>
	<?php include 'menu.php' ?>
	<div class="uk-grid">
		<div class="uk-width-1-1 titulo-f uk-text-center uk-text-large uk-text-middle header">
			<h3 class="titulo-f">EDICION DE PRODUCTOS</h3>			
		</div>		
	</div>
	<div class="uk-grid"> <!--Grid para el canvas y los botones superiores a este-->
		<div class="uk-width-7-10">
			<div class="uk-grid"> <!--Primera fila de botones superiores-->
				<div class="uk-width-2-3  ">
					<form action="canvasrep" class="uk-form" id="formurep" name="formurep" method="post">
						<fieldset data-uk-margin>
							<label for="editando">Editando:</label> <!--Seccion determinante del fondo del canvas-->
							<input id="editando" type="text" placeholder="" disabled class="uk-form-width-large uk-form-help-inline uk-form-horizontal" value="Camisa"> <!--El value determinará lo que se editara-->
							
							<input id="blobimg" type="hidden" name="blobimg">
							<input id="blobimg" type="hidden" name="blobimgraw">
							<button class="btn btn-scrud btn-block hidden" id="genpdf">
							GENERAR REPORTE
							<span class='flaticon-pdf icon-buttons'></span>
			</button>
						</fieldset>
					</form>
				</div> <!--Para informacion de lo que se esta editando-->
				<br><br>
				<div class="uk-width-1-3  ">
					<div class="btn-group">
					  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Cambiar <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu">
					    <li><a onclick="CambiarEditando(1)">Camisa</a></li>
					    <li><a onclick="CambiarEditando(2)">Taza</a></li>
					  </ul>
					</div>
				</div> <!--Para el boton de cambiar lo que estoy editando-->
				<br>
				<div class="uk-width-1-4 ">
					<div class="uk-button-dropdown" data-uk-dropdown="{pos: 'right-top'}">
						<a class="uk-icon-hover uk-icon-save uk-icon-large" id="Saves"> Guardar</a>
						
					</div>					
				</div>
				<div class="uk-width-1-4 ">
					<div class="uk-button-dropdown" data-uk-dropdown="{pos: 'right-top'}">
						<a class="uk-icon-hover uk-icon-pencil uk-icon-large" onclick="habilitarDibujo('69')"> Dibujo</a>
						<div class="uk-dropdown">
							<a onclick="habilitarDibujo('Pencil')" id="br1" class="uk-icon-large">Lapiz</a><br><br>
							<a onclick="habilitarDibujo('Circle')" id="br2" class="uk-icon-large">Circulos</a><br><br>
							<a onclick="habilitarDibujo('Spray')" id="br3" class="uk-icon-large">Spray</a><br><br>
							<a onclick="habilitarDibujo('Pattern')" id="br4" class="uk-icon-large">Patron de Circulos</a>
						</div>
					</div>
				</div>
				<div class="uk-width-1-4 ">
					<div class="uk-button-dropdown" data-uk-dropdown="{pos:'right-top'}">
						<a class="uk-icon-hover uk-icon-close uk-icon-large"> Eliminar</a>
						<div class="uk-dropdown">
							<a class="uk-icon-large" onclick="eliminar()">Eliminar Elemento</a><br><br>
							<a class="uk-icon-large" onclick="clearCanvas()">Limpiar</a><br><br>
						</div>
					</div>
				</div>
				<div class="uk-width-1-4 ">
					<div class="uk-button-dropdown" data-uk-dropdown="{pos:'right-top'}">
						<a class="uk-icon-hover uk-icon-cube uk-icon-large "> Formas</a>
						<div class="uk-dropdown">
							<a onclick="crearCuadro()" class="uk-icon-hover uk-icon-square uk-icon-large">  Cuadrado</a><br><br>
							<a onclick="crearTriangulo()" class="uk-icon-hover uk-icon-warning uk-icon-large"> Triangulo</a><br><br>
							<a onclick="crearCirculo()" class="uk-icon-hover uk-icon-circle uk-icon-large">  Circulo</a><br><br>
							<a onclick="crearLinea()" class="uk-icon-hover uk-icon-minus uk-icon-large">   Linea</a>
						</div>
					</div>
				</div>
				<br><br>
				<div class="uk-width-1-1 canvas">
					<canvas id="maincanvas" class="maincanvas" width="940" height="510"></canvas><!--Canvas de edicion-->
				</div>
			</div>
		</div>
		<div class="uk-width-3-10"> <!--Herramientas laterales de edicion e insercion--> <br>
			<br>
			<div class="uk-grid">
				<div class="uk-width-1-3"><button value="#000000" id="colorpicker" class="jscolor {valueElement:null, onFineChange:'update(this)', width:243, height:150, position:'right',
    		borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}">Elige un Color</button></div>
				<div class="uk-width-2-3 uk-form">
					<p>Tipo de Letra: </p>
					<select id="tipo_letra" name="cmbTipoLetra" onchange="CambiarLetra();">
						<option> Serif </option>
						<option> Arial </option>
						<option> Sans-Serif </option>                                  
						<option> Tahoma </option>
						<option> Verdana </option>
						<option> Lucida Sans Unicode </option>                               
					</select>
				</div>
				<br><br><br><br>
				<div class="uk-width-1-1 uk-form">
					<div class="uk-form-row">
						<p>Texto a agregar:</p>
					    <textarea class="txtA-des" id="txtdes" cols="40" rows="3" placeholder=""></textarea>
					</div>
					<br>
					<div class="centrado">
						<label for="fsize">Tamaño</label>
						<input type="number" onchange="actualizarBrush()" id="fsize" value="8" name="quantity" min="1" max="100">
						<button class="uk-button-primary addte" type="button" onclick="añadirTexto()">Añadir el texto</button>
					</div>					
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-1-1">
					<div class="bloque">
						<br>
						<input type="file" onchange="readURL(this,1);" name="subir1" id="subir1" accept="image/*"><br>
						<div class="centerbtn"><button class="uk-button-primary " type="button" id="btns1" onclick="añadirImagen(1)">Añadir la imagen</button></div><br>
						<input type="file" onchange="readURL(this,2);" name="subir2" id="subir2" accept="image/*"><br>
						<div class="centerbtn"><button class="uk-button-primary " type="button" id="btns2" onclick="añadirImagen(2)">Añadir la imagen</button></div><br>
						<input type="file" onchange="readURL(this,3);" name="subir3" id="subir3" accept="image/*"><br>
						<div class="centerbtn"><button class="uk-button-primary " type="button" id="btns3" onclick="añadirImagen(3)">Añadir la imagen</button></div><br>
    					<img id="hid1" class="hidden" src="" alt="your image" />
    					<img id="hid2" class="hidden" src="" alt="your image" />
    					<img id="hid3" class="hidden" src="" alt="your image" />
					</div>
				</div>
			</div>			
		</div>
	</div>		
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>
	<script type="text/javascript" src="resources/js/canvas.js"></script>
</body>
</html>