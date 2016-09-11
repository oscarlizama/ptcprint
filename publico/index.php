<?php 
	include "../privado/procesos/lifetime.php";
?>
<html>
	<head>
		
		<?php 
			include "links.php";
		?>
		<title>Punto Print | Soluciones en impresión</title>
	</head>
	<body>
		<?php 
			include "menu.php";
		?>
        <!--SLIDER-->
        <!--<div class="carousel slide" id="miSlider" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#miSlider" data-slide-to="0" class="active"></li>
                <li data-target="#miSlider" data-slide-to="1"></li>
                <li data-target="#miSlider" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner">
                <div class="item active">
                    <img src="img/slider3.png" alt="Deadpool">
                </div>
                <div class="item">
                    <img src="img/slider4.png" alt="Batman vs Superman">
                </div>
                <div class="item">
                    <img src="img/slider5.png" alt="Ted 2">
                </div>
            </div>

            <a href="#miSlider" class="carousel-control left" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a href="#miSlider" class="carousel-control right" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
		</div>-->
		<div class="uk-slidenav-position" id="miSlider" data-uk-slideshow="{autoplay:true, kenburns:true}">
			<ul class="uk-slideshow uk-overlay-active">
				<!--cada "li" es una imagen-->
			    <li>
			    	<img src="publico/img/slider4.png" alt="">
			    	<!--OVERLAY HACE QUE PODAMOS GREGAR TEXTO SOBRE LA IMAGEN, AGREGANDOLO SOBRE EL UN COLOR NEGRO CON TRANSPARENCIA-->
			    	<!--overlay top indica que solo abarcarà la parte de arriba de la pantalla-->
			    	<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-overlay-top uk-text-center">
			    		<div>
			    			<h1 class="titulos">PUNTO PRINT | SOLUCIONES EN IMPRESIONES</h1>
			    		</div>
			    	</div>
			    </li>
			    <li>
			    	<img src="publico/img/slider5.png" alt="">
			    	<!--OVERLAY HACE QUE PODAMOS GREGAR TEXTO SOBRE LA IMAGEN, AGREGANDOLO SOBRE EL UN COLOR NEGRO CON TRANSPARENCIA-->
			    	<!--overlay top indica que solo abarcarà la parte de arriba de la pantalla-->
			    	<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-overlay-top uk-text-center">
			    		<div>
			    			<h1 class="titulos">SI LO QUE QUIERES ES CALIDAD, NO BUSQUES MÁS</h1>
			    		</div>
			    	</div>
			    </li>
			    <li>
			    	<img src="publico/img/slider3.png" alt="">
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 titulo">					
					<h1 class="text-center visible-lg hidden-sm hidden-xs">LOS MÁS SOLICITADOS</h1>
					<h2 class="text-center hidden-lg visible-sm visible-xs">LOS MÁS SOLICITADOS</h2>
				</div>
			</div>
			<div class="row hidden-xs" id="solicitados">
				<?php 
					$div = "";
					$sqlinfo = "SELECT p.id_producto,p.nombre_producto,p.descripcion_producto FROM productos p,fotos_productos fp WHERE p.estado_producto=? AND fp.id_producto = p.id_producto LIMIT 9";
					$stmtinfo = $con->prepare($sqlinfo);
					$stmtinfo->execute(array(1));
					while ($informacion = $stmtinfo->fetch(PDO::FETCH_BOTH)) {
						$div .= "<div class='col-lg-4 col-md-4 col-sm-6'>";
							$div .= "<br>";
							$div .= "<div class='panel panel-default'>";
								$div .= "<div class='panel-body'>";
								$sqlfoto = "SELECT fp.foto_producto FROM fotos_productos fp WHERE fp.estado_foto_producto=? AND fp.id_producto=? LIMIT 1";
								$stmtfoto = $con->prepare($sqlfoto);
								$stmtfoto->execute(array(1,$informacion[0]));
								while ($foto = $stmtfoto->fetch(PDO::FETCH_BOTH)) {
									$div .= "<img src='data:image/*;base64,$foto[0]' alt='Imagen' class='img-responsive imginicio'>";
								}
								$div .= "</div>";
								$div .= "<div class='panel-footer'>";
									$div .= "<p><strong>".$informacion[1]."</strong><br>".$informacion[2]."</p>";
								$div .= "</div>";
							$div .= "</div>";
						$div .= "</div>";
					}
					print($div);
				?>
				<!--<div class="col-lg-4 col-md-4 col-sm-4">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="publico/img/banner1.png" alt="" class="img-responsive">
						</div>
						<div class="panel-footer">
							<p><strong>HOLA</strong><br>Hola a todos como estan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="publico/img/banner2.png" alt="" class="img-responsive">
						</div>
						<div class="panel-footer">
							<p><strong>HOLA</strong><br>Hola a todos como estan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="publico/img/tarjetap2.png" alt="" class="img-responsive">
						</div>
						<div class="panel-footer">
							<p><strong>HOLA</strong><br>Hola a todos como estan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="publico/img/taza2.png" alt="" class="img-responsive">
						</div>
						<div class="panel-footer">
							<p><strong>HOLA</strong><br>Hola a todos como estan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="publico/img/sublimacion-p2.png" alt="" class="img-responsive">
						</div>
						<div class="panel-footer">
							<p><strong>HOLA</strong><br>Hola a todos como estan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="publico/img/vynil1.png" alt="" class="img-responsive">
						</div>
						<div class="panel-footer">
							<p><strong>HOLA</strong><br>Hola a todos como estan</p>
						</div>
					</div>
				</div>-->
			</div>
		</div>
		<div class="container-fluid hidden-lg hidden-md hidden-sm visible-xs">
			<div class="row">
				<div class="col-sm-12 col-xs-12 uk-text-center">
					<div class="uk-slidenav-position" data-uk-slider>
		            	<div class="uk-slider-container">
		                	<ul class="uk-slider uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-3">
		                		<?php 
		                			$li = "";
			                		$sqlfoto = "SELECT fp.foto_producto FROM fotos_productos fp, productos p WHERE fp.estado_foto_producto=? AND p.id_producto = fp.id_producto";
									$stmtfoto = $con->prepare($sqlfoto);
									$stmtfoto->execute(array(1));
									while ($foto = $stmtfoto->fetch(PDO::FETCH_BOTH)) {
										$li .= "<li><img src='data:image/*;base64,$foto[0]' alt='Imagen' class='imgslide'></li>";
									}
									print($li);
		                		?>
		                    	<!--<li><img src="publico/img/banner1.png" alt=""></li>
		                    	<li><img src="publico/img/tarjetap2.png" alt=""></li>
		                    	<li><img src="publico/img/vynil1.png" alt=""></li>-->
		                	</ul>
		            	</div>
		            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
		            	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
		        	</div>	
				</div>
			</div>
		</div>
		<!--EL FOOTER-->
		<!--<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-print">
						<h2 class="text-center">PUNTO PRINT</h2>
						<h3 class="text-center">PUNTO PRINT</h3>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-slogan">
						<p class="text-center texto-footer">SOLUCIONES EN IMPRESIONES</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 footer-info">
						<p class="texto-footer"><a href="" class="linkf">Terminos y condiciones</a></p>
						<p class="texto-footer"><a href="" class="linkf">Preguntas frecuentes</a></p>
						<p class="texto-footer"><a href="" class="linkf">Contáctanos</a></p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 footer-info">
						<p class="texto-footer"><a href="" class="linkf">Misión</a></p>
						<p class="texto-footer"><a href="" class="linkf">Visión</a></p>
						<p class="texto-footer"><a href="" class="linkf">¿Quiénes somos?</a></p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 footer-empresa">
						<p class="texto-footer"><a href="" class="linkf">Teléfonos: 2274-3888</a></p>
						<p class="texto-footer"><a href="" class="linkf">Blvd Consitición y Pasea Miralvalle, San Salvador</a></p>
						<p class="texto-footer"><a href="" class="linkf">Correo: puntoprintsv@gmail.com</a></p>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-codem">
						<p id="code-masters" class="text-center">Powered by Code Master</p>
					</div>
				</div>
			</div>
		</footer>
		FIN DEL FOOTER-->
		<?php 
			include 'footer.php';
			include "scripts.php";
		?>
	</body>
</html>