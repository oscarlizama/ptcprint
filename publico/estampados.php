<html>
    <head>
        <title>Estampados | Punto Print</title>
        <!--Incluyo archivo maestro de php de links a hojas de estilo-->
        <?php include 'links.php' ?>
    </head>
    <body>
        <!--Archivo Maestro para el menú de la página-->
        <?php include 'menu.php' ?>
    	<div>
            <br>
            <div class="container-fluid div_conteni">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">SERIGRAFÍA</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="uk-grid">
                            <div class="uk-width-1-1 uk-flex uk-flex-center publicidad-header">
                                <h2 class="titulos">Serigrafía</h2>
                            </div>
                        </div>
                        <!--Creando un contenedor para la imagen que quiero mostrar-->
                        <!--CONTENEDOR DE INFORMACION-->
                        <br>
                        <?php 
                            $id_max = "";
                            $descripcion = "";
                            $foto_producto = "";
                            $calificacion_promedio = "";
                            $maximo = "SELECT p.id_producto FROM productos p WHERE p.id_tipo_producto=5 AND p.calificacion_promedio = (SELECT MAX(p.calificacion_promedio) FROM productos) LIMIT 1";
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
                </div>
            </div>
        </div>
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
            <!--Incluyendo un pequeño slider-->
            <div class="uk-margin slideset-servicios" data-uk-slideset="{animation:'fade', duration:'170', small:2, medium:3, large:4}">
                <div class="uk-slidenav-position uk-margin">
                    <ul class="uk-slideset uk-grid uk-flex-center">
                        <li><img src="img/seri1.png" class="img-servicios" alt=""></li>
                        <li><img src="img/seri2.png" class="img-servicios" alt=""></li>
                        <li><img src="img/seri3.png" class="img-servicios" alt=""></li>
                        <li><img src="img/seri4.png" class="img-servicios" alt=""></li>
                        <li><img src="img/seri5.png" class="img-servicios" alt=""></li>
                        <li><img src="img/seri6.png" class="img-servicios" alt=""></li>
                        <li><img src="img/seri7.png" class="img-servicios" alt=""></li>
                        <li><img src="img/seri8.png" class="img-servicios" alt=""></li>
                    </ul>
                    <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                    <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
                </div>
                   <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
            </div>
       	</div>
    <div>
    <!--Incluyendo el footer y los scripts-->    
    <?php include 'footer.php' ?>
    <?php include 'scripts.php' ?>
</body>
</html>
                    
