<html>
	<head>
        <title>Publicidad | Punto Print</title>
        <!--incluyo los links para que funcione bien la página-->
		<?php include 'links.php' ?>
	</head>
	<body>
        <!--INCLUYO EL MENÚ-->
		<?php include 'menu.php' ?>
        <!--BOTONES DONDE APARECERÁN LAS OPCIONES A MOSTRAR-->
		<div>
            <div class="container-fluid div_conteni">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">RÓTULOS</a></li>
                    <li><a data-toggle="tab" href="#menu1">MARCOS DE FOTOS</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <!--PRIMER DIV DE INFORMACION-->
                        <div class="uk-grid">
                            <!--HEADER DE LA PÁGINA-->
                            <div class="uk-width-1-1 uk-flex uk-flex-center publicidad-header">
                                <h2 class="titulos">Publicidad | Rótulos</h2>
                            </div>
                        </div>
                        <!--CONTENIDO PRINCIPAL DE LA PÁGINA-->
                        <br>
                        <div class="container-fluid">
                            <div class="uk-grid row">
                                <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                    <img src="img/rotulo1.png" alt="">
                                    <a href="img/rotulo1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
                                </div>
                                <!--AQUI ESTA LA INFORMACION DEL PRODUCTO-->
                                <div class="uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10">
                                    <div class="uk-grid">
                                        <div class="uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10">
                                            <p>Formato:</p>
                                            <form class="uk-form">
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Horizontal</label><br>
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Vertical</label><br>
                                            </form>
                                            <br>
                                            <p>Medida:</p>
                                            <form class="uk-form">
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">700x900</label><br>
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">1200x1900</label><br>
                                            </form>
                                        </div>
                                        <!--AQUI SE PUNTUA-->
                                        <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                            <p>DESCRIPCION</p>
                                            <p>Microperforados en ventanas, especialidad para publicidad grande y mediana empresa. Consiguelo ahora.</p>
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
                    <div id="menu1" class="tab-pane fade">
                        <!--SE CRE AEL OTRO DIV-->
                        <div class="uk-grid">
                            <!--ENCABEZADO DEL DIV-->
                            <div class="uk-width-1-1 uk-flex uk-flex-center publicidad-header">
                                <h2 class="titulos">Publicidad | Marcos para fotos  </h2>
                            </div>
                        </div>
                        <br>
                        <div class="container-fluid">
                            <div class="uk-grid row">
                                <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                    <img src="img/marco2.png" alt="">
                                    <a href="img/marco2.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
                                </div>
                                <!--AQUI ESTA LA INFORMACION DEL PRODUCTO-->
                                <div class="uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10">
                                    <div class="uk-grid">
                                        <div class="uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10">
                                            <p>Formato:</p>
                                            <form class="uk-form">
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Horizontal</label><br>
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Vertical</label><br>
                                            </form>
                                            <br>
                                            <p>Medida:</p>
                                            <form class="uk-form">
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">700x900</label><br>
                                                <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">1200x1900</label><br>
                                            </form>
                                        </div>
                                        <!--AQUI SE PUNTUA-->
                                        <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                            <p>DESCRIPCION</p>
                                            <p>Microperforados en ventanas, especialidad para publicidad grande y mediana empresa. Consiguelo ahora.</p>
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
                </div>
            </div>
		</div>
        <!--SE CREA UN SLIDESET PARA MOSTRAR LOS PRODUCTOS-->
        <div class="uk-width-1-1 uk-text-center">
            <div id="productos-solicitados">
            <br>
            <p class="productos-titulo">
                <h2 class="titulos uk-hidden-small">NUESTROS PRODUCTOS</h2>
                <h3 class="titulos uk-hidden-large uk-hidden-medium">NUESTROS PRODUCTOS</h3>
            </p>
            <br>
            <br>
        </div>
        <div class="uk-slidenav-position" data-uk-slider>
            <div class="uk-slider-container">
                <ul class="uk-slider uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4">
                    <li><img src="img/mira.png"alt=""></li>
                    <li><img src="img/mira2.png" alt=""></li>
                    <li><img src="img/mira3.png" alt=""></li>
                    <li><img src="img/mira4.png" alt=""></li>
                    <li><img src="img/mira5.png" alt=""></li>
                </ul>
            </div>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
        </div>
        <!--incluyo el footer y los scripts-->
		<?php include 'footer.php' ?>
		<?php include 'scripts.php' ?>
	</body>
</html>