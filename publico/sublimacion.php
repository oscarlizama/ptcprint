<!DOCTYPE html>
<html lang="es">
<head>
	<title>Sublimación | Punto Print</title>
	<!--Incluyo el archivo donde estan los css y las fuentes-->
	<?php include 'links.php' ?>
</head>
<body>
	<!--INCLUYO EL MENU-->
	<?php include 'menu.php' ?>
	<!--CREO EL CONTENEDOR-->
	<div id="div-sublim">
    <div class="container-fluid div_conteni">
    <!--CREO LA LISTA DE BOTONES A UTILIZARS-->
      <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">CERÁMICA</a></li>
          <li><a data-toggle="tab" href="#menu1">POLIESTER</a></li>
      </ul>
      <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="uk-width-1-1 header-sublim">
              <h1 class="titulos titulos-sublim uk-text-center">CERÁMICA</h1>
            </div>
            <!--CONTENEDOR DE LA INFORMACION-->
            <br>
            <div class="container-fluid">
              <div class="uk-grid row">
                <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                  <img src="img/sublimacion-c1.png" alt="">
                  <a href="img/sublimacion-c1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                        <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">600x800</label><br>
                        <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">1080x1920</label><br>
                      </form>
                    </div>
                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                      <p>DESCRIPCION</p>
                      <p>Plato de ceramica con bordes de flores, bonito detalle para regalo. Consiguelo ahora.</p>
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
            <div class="uk-width-1-1 header-sublim">
              <h1 class="titulos titulos-sublim uk-text-center">POLIÉSTER</h1>
            </div>
            <!--CONTENEDOR DE LA INFORMACION-->
            <br>
            <div class="container-fluid">
              <div class="uk-grid row">
                <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                  <img src="img/sublimacion-p1.png" alt="">
                  <a href="img/sublimacion-p1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                        <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">600x800</label><br>
                        <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">1080x1920</label><br>
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
      </div>
    </div>
	</div>	
	<?php include 'scripts.php' ?>
</body>
</html>