<?php 
    include '../privado/procesos/conexion.php';
 ?>
<html>
	<head>
        <title>Impresiones digitales | Punto Print</title>
		<?php include 'links.php' ?>
	</head>
	<body>
		<?php include 'menu.php' ?>
    <div>
        <br>
        <div class="container-fluid div_conteni">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">CALCAMONÍAS</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="uk-grid">
                       <div class="uk-width-1-1 uk-flex uk-flex-center publicidad-header">
                          <h2 class="titulos">Calcomanías</h2>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <?php 
                            $id_max = "";
                            $descripcion = "";
                            $foto_producto = "";
                            $calificacion_promedio = "";
                            $maximo = "SELECT p.id_producto FROM productos p WHERE p.id_tipo_producto=16 AND p.calificacion_promedio = (SELECT MAX(p.calificacion_promedio) FROM productos) LIMIT 1";
                            foreach ($con->query($maximo) as $maximo) {
                              $id_max = $maximo[0];
                            }
                            $producto = "SELECT p.nombre_producto, p.descripcion_producto, p.calificacion_promedio,f.foto_producto FROM productos p INNER JOIN fotos_productos f ON f.id_producto = p.id_producto WHERE p.id_producto=$id_max";
                            foreach ($con->query($producto) as $productoa) {
                              $descripcion = $productoa[1];
                              $calificacion_promedio = $productoa[2];
                              $foto_producto = $productoa[3];
                            }
                            $divin = "";
                            $divin .= "<div class='container-fluid'>";
                              $divin .= "<div class='container-fluid'>";
                                $divin .= "<div class='uk-grid row'>";
                                  $divin .= "<div class='uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10'>";
                                    $divin .= "<img src='data:image/*;base64,$foto_producto' alt=''>";
                                    $divin .= "<a href='src='data:image/*;base64,$foto_producto' data-uk-lightbox='' class='uk-button uk-button-link uk-button-large uk-flex uk-flex-center'>VER EJEMPLO</a>";
                                  $divin .= "</div>";
                                  //AQUI ESTA LA INFORMACION DEL PRODUCTO
                                  $divin .= "<div class='uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10'>";
                                    $divin .= "<div class='uk-grid'>";
                                      $divin .= "<div class='uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10'>";
                                        $divin .= "<p>Medida:</p>";
                                          $divin .= "<form class='uk-form'>";
                                            $medidas = "SELECT m.medida FROM medidas_producto m INNER JOIN productos p ON m.id_producto = p.id_producto WHERE p.id_producto=$id_max";
                                            foreach ($con->query($medidas) as $medidasa) {
                                            $divin .= "<input type='radio' id='form-s-r' name='radio'><label for='form-s-r'>$medidasa[0]</label><br>";
                                            }
                                          $divin .= "</form>";
                                        $divin .= "</div>";
                                        $divin .=  "<div class='uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10'>";
                                          $divin .= "<p>DESCRIPCION:</p>";
                                          $divin .= "<p id='descripcion'>$productoa[1]</p>";
                                          $divin .= "<p class='uk-hidden-medium uk-hidden-small'>Puntuación:</p>";
                                          $divin .= "<div class='stars'>";
                                            if ($calificacion_promedio < 1) {
                                              for ($i=1; $i <=5 ; $i++) {
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                            }
                                            if ($calificacion_promedio >= 1 && $calificacion_promedio < 2) {
                                              $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              for ($i=1; $i <=4 ; $i++) {
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                            }
                                            if ($calificacion_promedio >= 2 && $calificacion_promedio < 3) {
                                              for ($i=1; $i <=2 ; $i++) { 
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                              for ($i=1; $i <=3 ; $i++) {
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                            }
                                            if ($calificacion_promedio >= 3 && $calificacion_promedio < 4) {
                                              for ($i=1; $i <=3 ; $i++) { 
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                              for ($i=1; $i <=2 ; $i++) {
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                            }
                                            if ($calificacion_promedio >= 4 && $calificacion_promedio < 5) {
                                              for ($i=1; $i <=4 ; $i++) { 
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                              for ($i=1; $i <=1 ; $i++) {
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                            }
                                            if ($calificacion_promedio == 5) {
                                              for ($i=1; $i <=5 ; $i++) { 
                                                $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar'></span>";
                                              }
                                            }
                                        $divin .= "</div>";
                                      print($divin);
                        ?> 
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
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center publicidad-header">
                            <h2 class="titulos">Viñetas</h2>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/calco3.png" alt="">
                                <a href="img/calco3.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
                            </div>
                            <!--AQUI ESTA LA INFORMACION DEL PRODUCTO-->
                            <div class="uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10">
                                <div class="uk-grid">
                                    <div class="uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10">
                                        <p>Formato:</p>
                                        <form class="uk-form">
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Mate</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Brillo</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Profesional</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Para motos</label><br>
                                        </form>
                                        <br>
                                        <p>Medida:</p>
                                        <form class="uk-form">
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">10cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx10cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Camisa de poliester sublimada, inspirada en Pink Floyd. Consiguelo ahora.</p>
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
                <div id="menu2" class="tab-pane fade">
                    <div class="uk-grid">
                       <div class="uk-width-1-1 uk-flex uk-flex-center publicidad-header">
                          <h2 class="titulos">Brochures</h2>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/calco4.png" alt="">
                                <a href="img/calco4.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
                            </div>
                            <!--AQUI ESTA LA INFORMACION DEL PRODUCTO-->
                            <div class="uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10">
                                <div class="uk-grid">
                                    <div class="uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10">
                                        <p>Formato:</p>
                                        <form class="uk-form">
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Personalizados</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Empresariales</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Informativos</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Ocasiones especiales</label><br>
                                        </form>
                                        <br>
                                        <p>Medida:</p>
                                        <form class="uk-form">
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx15cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Bonitos y llamativos brochures que contienen el formato para mostrar la informacion que necesitas. Consiguelo ahora.</p>
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
                <div id="menu3" class="tab-pane fade">
                    <div class="uk-grid">
                       <div class="uk-width-1-1 uk-flex uk-flex-center publicidad-header">
                          <h2 class="titulos">AFICHES</h2>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/afiche1.png" alt="">
                                <a href="img/afiche1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
                            </div>
                            <!--AQUI ESTA LA INFORMACION DEL PRODUCTO-->
                            <div class="uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10">
                                <div class="uk-grid">
                                    <div class="uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10">
                                        <p>Formato:</p>
                                        <form class="uk-form">
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Personalizados</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Empresariales</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Estudiantiles</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">Brillantes</label><br>
                                        </form>
                                        <br>
                                        <p>Medida:</p>
                                        <form class="uk-form">
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx15cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Variedad de afiches e impresión destinada a la información.</p>
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
    <div class="uk-width-1-1 uk-text-center">
        <div id="productos-solicitados">
            <br>
            <p class="productos-titulo">
                <h2 class="titulos uk-hidden-small">MIRA LO QUE PODEMOS HACER</h2>
                <h3 class="titulos uk-hidden-large uk-hidden-medium">MIRA LO QUE PODEMOS HACER</h3>
            </p>
            <br>
        </div>
        <div class="uk-slidenav-position" data-uk-slider>
            <div class="uk-slider-container">
                <ul class="uk-slider uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4">
                    <li><img src="img/calco2.png"alt=""></li>
                    <li><img src="img/calco3.png" alt=""></li>
                    <li><img src="img/calco4.png" alt=""></li>
                    <li><img src="img/calco5.png" alt=""></li>
                    <li><img src="img/calco6.png" alt=""></li>
                </ul>
            </div>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <?php include 'scripts.php' ?>
</body>
</html>
                    
