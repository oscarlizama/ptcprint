<!DOCTYPE html>
<html lang="es">
<head>
	<title>Punto Print - Soluciones en impresiones</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>   
    <!--incluyo el menu-->
	<?php include 'menu.php' ?>
	<!--SECCION DEL SLIDER-->
	<!--kenburns hace refrencia al efecto que se hará-->
	<div class="uk-slidenav-position" id="slider-div" data-uk-slideshow="{autoplay:true, kenburns:true}">
		<ul class="uk-slideshow uk-overlay-active">
			<!--cada "li" es una imagen-->
		    <li>
		    	<img src="img/slider4.png" alt="">
		    	<!--OVERLAY HACE QUE PODAMOS GREGAR TEXTO SOBRE LA IMAGEN, AGREGANDOLO SOBRE EL UN COLOR NEGRO CON TRANSPARENCIA-->
		    	<!--overlay top indica que solo abarcarà la parte de arriba de la pantalla-->
		    	<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-overlay-top uk-text-center">
		    		<div>
		    			<h1 class="titulos">PUNTO PRINT | SOLUCIONES EN IMPRESIONES</h1>
		    		</div>
		    	</div>
		    </li>
		    <li>
		    	<img src="img/slider5.png" alt="">
		    	<!--OVERLAY HACE QUE PODAMOS GREGAR TEXTO SOBRE LA IMAGEN, AGREGANDOLO SOBRE EL UN COLOR NEGRO CON TRANSPARENCIA-->
		    	<!--overlay top indica que solo abarcarà la parte de arriba de la pantalla-->
		    	<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-overlay-top uk-text-center">
		    		<div>
		    			<h1 class="titulos">SI LO QUE QUIERES ES CALIDAD, NO BUSQUES MÁS</h1>
		    		</div>
		    	</div>
		    </li>
		    <li>
		    	<img src="img/slider3.png" alt="">
		    	<!--OVERLAY HACE QUE PODAMOS GREGAR TEXTO SOBRE LA IMAGEN, AGREGANDOLO SOBRE EL UN COLOR NEGRO CON TRANSPARENCIA-->
		    	<!--overlay top indica que solo abarcarà la parte de arriba de la pantalla-->
		    	<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-overlay-top uk-text-center">
		    		<div>
		    			<h3 class="titulos">LOS MEJORES BANNERS PARA TI</h3>
		    			<button class="uk-button uk-button-primary uk-button-large">¡LLÉVAME AHORA!</button>
		    		</div>
		    	</div>
		    </li>
		</ul>
		<!--AQUI SE AGREGA LOS CONTROLES PARA NAVEGAR EN EL SLIDESHOW-->
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
		<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
			<li data-uk-slideshow-item="0"><a href=""></a></li>
			<li data-uk-slideshow-item="1"><a href=""></a></li>
			<li data-uk-slideshow-item="2"><a href=""></a></li>
		</ul>
	</div>
	<!--CONTENIDO PRINCIPAL DE LA PÁGINA-->
	<div class="uk-conatiner">
		<div class="uk-width-1-1 uk-text-center">
			<div id="productos-solicitados">
				<br>
				<!--HEADER DE LA PAGINA-->
				<p class="productos-titulo">
					<h2 class="titulos uk-hidden-small">PRODUCTOS MAS SOLICITADOS</h2>
					<h3 class="titulos uk-hidden-large uk-hidden-medium">PRODUCTOS MAS SOLICITADOS</h3>
				</p>
			</div>
			<!--SE MOSTRARÁ SOLO CUANDO SEA LARGO-->
			<div class="uk-grid info-productos uk-hidden-small uk-hidden-medium">
				<!--ESTE DIV ONTIENE LOS PRODUCTOS QUE MAS SOLICITAN LAS PERSONAS-->
				<div class="uk-width-1-4 uk-text-center">
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/taza1.png" data-uk-lightbox="" title="Taza sublimada"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/taza1.png" class="img-product-m" alt="">
						</div>
					</div>
					<div class="info-img-p">
						<p>Taza sublimada</p>
						<p>Precio: $15.99</p>
					</div>
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/estampado2.png" data-uk-lightbox="" title="Camisa estampada"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/estampado2.png" alt="">
						</div>
					</div>
					<div class="info-img-p">
						<p>Estampados de camiseta</p>
						<p>Precio: $5.99</p>
					</div>
				</div>
				<!--ESTE DIV ONTIENE LOS PRODUCTOS QUE MAS SOLICITAN LAS PERSONAS-->
				<div class="uk-width-1-4 uk-text-center">
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/gorra1.png" data-uk-lightbox="" title="Gorra"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/gorra1.png" alt="">
						</div>
					</div>
					<div class="info-img-p">
						<p>Gorra</p>
						<p>Precio: $15.99</p>
					</div>
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/gorra2.png" data-uk-lightbox="" title="Gorra"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/gorra2.png" alt="">
						</div>
					</div>
					<div class="info-img-p">
						<p>Gorra personalizada</p>
						<p>Precio: $5.99</p>
					</div>
				</div>
				<!--ESTE DIV ONTIENE LOS PRODUCTOS QUE MAS SOLICITAN LAS PERSONAS-->
				<div class="uk-width-1-4">
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/lapiceros1.png" data-uk-lightbox="" title="Lapiceros personalizados"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/lapiceros1.png" alt="">	
						</div>
					</div>
					<div class="info-img-p">
						<p>Lapiceros</p>
						<p>Precio: $15.99</p>
					</div>
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/cajas5.png" data-uk-lightbox="" title="Cajas personalizadas"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/cajas5.png" alt="">
						</div>
					</div>
					<div class="info-img-p">
						<p>Cajas personalizadas</p>
						<p>Precio: $5.99</p>
					</div>
				</div>
				<!--ESTE DIV ONTIENE LOS PRODUCTOS QUE MAS SOLICITAN LAS PERSONAS-->
				<div class="uk-width-1-4">
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/estampado1.png" data-uk-lightbox="" title="Camisa estampada"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/estampado1.png" alt="">
						</div>
					</div>
					<div class="info-img-p">
						<p>Estampados</p>
						<p>Precio: $5.99</p>
					</div>
					<div class="img-product">
						<div class="mostrar-product">
							<a class="uk-button uk-button-danger uk-button-large quickview" href="img/cajas6.png" data-uk-lightbox="" title="Cajas personalizadas"><span class="uk-icon-arrows-alt uk-icon-large"></span></a>
							<img src="img/cajas6.png" alt="">
						</div>
					</div>
					<div class="info-img-p">
						<p>Cajas personalizadas</p>
						<p>Precio: $5.99</p>
					</div>
				</div>
			</div>
			<!--SLIDER CUANDO SEA PEQUEÑO-->
			<div class="uk-slidenav-position uk-hidden-large" data-uk-slider>
            	<div class="uk-slider-container">
                	<ul class="uk-slider uk-grid-width-small-1-2 uk-grid-width-medium-1-3">
                    	<li><img src="img/taza1.png" alt=""></li>
                    	<li><img src="img/estampado1.png" alt=""></li>
                    	<li><img src="img/gorra2.png" alt=""></li>
                    	<li><img src="img/gorra1.png" alt=""></li>
                	</ul>
            	</div>
            	<!--CONTROLES DEL SLIDER-->
            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
        	</div>
		</div>
		<!--SE MOSRARÁ AL SER MEDIANO Y PEQUEÑO-->
        <div class="uk-width-1-1 uk-text-center uk-hidden-large">
			<div id="productos-solicitados">
				<br>
				<p class="productos-titulo">
					<h2 class="titulos uk-hidden-small">TARJETAS DE PRESENTACION</h2>
					<h3 class="titulos uk-hidden-large uk-hidden-medium">TARJETAS DE PRESENTACION</h3>
				</p>
			</div>
			<div class="uk-slidenav-position uk-hidden-large" data-uk-slider>
            	<div class="uk-slider-container">
                	<ul class="uk-slider  uk-grid-width-small-1-2 uk-grid-width-medium-1-3">
                    	<li><img src="img/tarjetap1.png"alt=""></li>
                    	<li><img src="img/tarjetap2.png" alt=""></li>
                    	<li><img src="img/tarjetap3.png" alt=""></li>
                    	<li><img src="img/tarjetap4.png" alt=""></li>
                	</ul>
            	</div>
            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
        	</div>	
		</div>
	</div>
	<!--INCLUYO EL FOOTER Y LOS SCRIPTS-->
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>
</body>
</html>