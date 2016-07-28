<!DOCTYPE html>
<html lang="es">
<head>
	<title>Fotos | Cédula | Carnet</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
  <?php include 'menu.php' ?>
	<!--Aqui incluyo el menú-->
	<!--CREO EL HADER DE LA PAGINA-->
  <div>
  <div class="uk-width-1-1 uk-text-center banners  uk-flex uk-flex-center uk-flex-middle">
		<h1 class="titulos">FOTOS</h1>
	</div>
	<!--CONTENIDO PRINCIPAL DE LA PAGINA-->
	<br>
	<div class="container-fluid">
		<div class="uk-grid row">
			<div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
				<img src="img/fotopaquete.png" alt="">
				<a href="img/fotopaquete.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
			</div>
			<!--AQUI ESTA LA INFORMACION DEL PRODUCTO-->
			<div class="uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10">
				<div class="uk-grid">
					<div class="uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10">
						<p>Formato:</p>
						<form class="uk-form">
                     		<input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Blanco y negro</label><br>
                     		<input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Colores</label><br>
                  		</form>
                  		<br>
                  		<p>Medida:</p>
                  		<form class="uk-form">
                     		<input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Cédula</label><br>
                     		<input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Carnét</label><br>
                  		</form>
                  		<br>
                  		<p>Tipo de papel:</p>
                  		<form class="uk-form">
                     		<input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Fotográfico Mate</label><br>
                     		<input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Fotográfico Brillante</label><br>
                  		</form>
					</div>
					<!--AQUI SE PUNTUA-->
					<div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
						<p>DESCRIPCION</p>
						<p>Imprime tus fotografías en tamaño cédula o para tu carnét. Consiguelo ahora.</p>
						<p class="uk-hidden-medium uk-hidden-small ">Puntuación:</p>
                            <div class="stars">
                                <span class="uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar"></span>
                                <span class="uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar"></span>
                                <span class="uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar"></span>
                                <span class="uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar"></span>
                                <span class="uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar"></span>
                            </div>
                            <br>
                            <br>
                            <!--SECCION DE COMENTARIOS-->
                            <p class=" uk-hidden-small uk-hidden-medium">Mi comentario:</p>
                            <form class="uk-form uk-hidden-small uk-hidden-medium">
                                <div class="uk-form-row">
                                    <textarea cols="40" rows="3" placeholder="Danos tu opinón" class="uk-hidden-large"></textarea>
                                    <textarea cols="75" rows="3" placeholder="Danos tu opinón" class="uk-hidden-medium uk-hidden-small"></textarea>
                                    <br>
                                   	<br>
                                    <button class="uk-button uk-button-danger uk-width-4-10 uk-push-6-10">PUNTUAR</button>
                                </div>
                            </form>
						</div>
					</div>
                  	<br>
                  	<!--BOTONES-->
                  	<div class="uk-grid">
                  		<div class="uk-width-1-1">
                  			<div class="uk-grid">
                  				<button class="uk-button uk-button-primary uk-width-small-5-10 uk-width-medium-3-10 uk-width-large-5-10 btn-sb-xs">CARGAR</button>
                  				<button class="uk-button uk-button-success uk-width-small-4-10 uk-width-medium-3-10 uk-width-large-4-10 btn-sb-xs">AGREGAR</button>
                  				<button class="uk-button uk-button-danger uk-width-small-9-10 uk-width-medium-3-10 btn-sb-xs uk-hidden-large">PUNTUAR</button>
                  			</div>
                  		</div>
                  	</div>
				</div>
			</div>
		</div>
	</div>
	<!--FIN DE LA INFORMAICON PRINCIPAL-->
	<!--INICIA EL CONTENDIO QUE POSEEN-->
	<div class="uk-width-1-1 uk-text-center">
			<div id="productos-solicitados">
				<br>
				<p class="productos-titulo">
					<h2 class="titulos uk-hidden-small">MIRA LO QUE PODEMOS HACER</h2>
					<h3 class="titulos uk-hidden-large uk-hidden-medium">MIRA LO QUE PODEMOS HACER</h3>
				</p>
			</div>
			<!--slidenav de los productos-->
			<div class="uk-slidenav-position" data-uk-slider>
            	<div class="uk-slider-container">
                	<ul class="uk-slider uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4">
                    	<li><img src="img/foto1.png"alt=""></li>
                    	<li><img src="img/foto2.png" alt=""></li>
                    	<li><img src="img/foto3.png" alt=""></li>
                    	<li><img src="img/foto4.png" alt=""></li>
                    	<li><img src="img/foto5.png" alt=""></li>
                    	<li><img src="img/foto6.png" alt=""></li>
                	</ul>
            	</div>
            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
        	</div>	
	</div>
  </div>
	<!--INCLUYO LOS SCRIPTS Y EL FOOTER-->		
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>
</body>
</html>