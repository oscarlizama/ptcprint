<html>
    <head>
        <title>Servicios complementarios | Punto Print</title>
        <!--INCLUYO LOS LINKS-->
        <?php include 'links.php' ?>
    </head>
    <body>
        <!--INCLUYO EL MENÚ-->
        <?php include 'menu.php' ?>
        <div class="">
            <!--GRUPO DE BOTONES PARA MOSTRAR LOS DIVS CUANDO SEAN GRANDES-->        
            <div class="uk-button-group uk-width-1-1 botones-div uk-hidden-medium uk-hidden-small" data-uk-switcher="{connect:'#my-id', animation: 'uk-animation-fade'}">
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Recetarios</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Menús</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Libretas</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Portafolios</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Revistas</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Cuadernos</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Agendas</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Tend Cards</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Empastado</button>
                <button class="uk-button uk-width-large-1-10 uk-button-primary uk-button-large" type="button">Anillados</button>
            </div>
            <!--BOTONES APARA MOSTRAR LOS DIVS-->
            <!--SE MUESTRA SOLO AL SER PEQUEÑO-->
            <div class="uk-button-group uk-width-1-1 botones-div-medium uk-hidden-large" data-uk-switcher="{connect:'#medium-divs', animation: 'uk-animation-fade'}">
                <button class="uk-button uk-width-1-5 uk-button-primary uk-button-large" type="button">Recetarios <br> Menús</button>
                <button class="uk-button uk-width-1-5 uk-button-primary uk-button-large" type="button">Libretas <br> Portafolios</button>
                <button class="uk-button uk-width-1-5 uk-button-primary uk-button-large" type="button">Revistas <br> Cuadernos</button>
                <button class="uk-button uk-width-1-5 uk-button-primary uk-button-large" type="button">Agendas <br> Tend Cards</button>
                <button class="uk-button uk-width-1-5 uk-button-primary uk-button-large" type="button">Empastado <br> Anillados</button>
            </div>
            <!--LOS DIVS CUANDO EL TAMAÑO ES GRANDE-->
            <ul id="my-id" class="uk-switcher uk-hidden-medium uk-hidden-small">
                <!--DIV DE RECETARIOS-->
                <li class="uk-active">
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Recetarios</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/recetario1.png" alt="">
                                <a href="img/recetario1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">10cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx10cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Imprime tus propios recetarios de cocina para cualquier ocasion. Consiguelo ahora.</p>
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
                </li>
                <!--DIV DE MENÚS-->
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Menús</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/menu1.png" alt="">
                                <a href="img/menu1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">10cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx10cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Impresiones de menus, perfecto para un restaurante. Consiguelo ahora.</p>
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
                </li>
                <!--LIBRETAS-->
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Libretas</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/libreta3.png" alt="">
                                <a href="img/libreta3.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">10cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx10cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Libretas para toda ocasion, tambien para regalar. Consiguelo ahora.</p>
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
                </li>
                <!--PORTAFOLIO-->
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Portafolios</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/portafolio1.png" alt="">
                                <a href="img/portafolio1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <!--REVISTAS--> 
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Revistas</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/revista2.png" alt="">
                                <a href="img/revista2.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <!--CUADERNOS--> 
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Cuadernos</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/cuaderno1.png" alt="">
                                <a href="img/cuaderno1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <!--AGENDAS--> 
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Agendas</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/agenda1.png" alt="">
                                <a href="img/agenda1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <!--TENT CARD--> 
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Tent Card</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/tent1.png" alt="">
                                <a href="img/tent1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <!--ESTAMPADO--> 
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Estampado</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/estampado-v1.png" alt="">
                                <a href="img/estampado-v1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <!--ANILLADOS--> 
                <li>
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Anillados</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/anillado1.png" alt="">
                                <a href="img/anillado1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
            </ul>
            <!--ESTOS DIVS SON CUANDO LA PANTALLA SE HACE MEDIANA --> 
            <ul id="medium-divs" class="uk-switcher uk-hidden-large">
            <!--VAN DOS POR LISTA--> 
                <li class="uk-active">
                    <!--INICIA EL PRIMER DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Recetarios</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/recetario1.png" alt="">
                                <a href="img/recetario1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">10cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx10cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Imprime tus propios recetarios de cocina para cualquier ocasion. Consiguelo ahora.</p>
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
                    <br>
                    <!--TERMINA ELL PRIMER DIV--> 
                    <!--INICIA EL SEGUNDO DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Menús</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/menu1.png" alt="">
                                <a href="img/menu1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">10cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx10cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Impresiones de menus, perfecto para un restaurante. Consiguelo ahora.</p>
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
                    <!--TERMINA EL SEGUNDO DIV--> 
                </li>
                <li>
                    <!--EMPIEZA EL PRIMER DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Libretas</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/libreta3.png" alt="">
                                <a href="img/libreta3.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">10cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">12cmx12cm</label><br>
                                            <input type="radio" id="form-s-r" name="radio"> <label for="form-s-r">20cmx10cm</label><br>
                                        </form>
                                    </div>
                                    <!--AQUI SE PUNTUA-->
                                    <div class="uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10">
                                        <p>DESCRIPCION</p>
                                        <p>Libretas para toda ocasion, tambien para regalar. Consiguelo ahora.</p>
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
                    <!--TERMINA EL SEGUNDO DIV--> 
                    <br>
                    <!--EMPIEZA EL PRIMER DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Portafolios</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/portafolio1.png" alt="">
                                <a href="img/portafolio1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                    <!--TERMINA EL SEGUNDO DIV--> 
                </li>
                <li>
                    <!--EMPIEZA EL PRIMER DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Revistas</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/revista2.png" alt="">
                                <a href="img/revista2.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                    <!--TERMINA EL SEGUNDO DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Cuadernos</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/cuaderno1.png" alt="">
                                <a href="img/cuaderno1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <li>
                    <!--EMPIEZA EL PRIMER DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Agendas</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/agenda1.png" alt="">
                                <a href="img/agenda1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                    <!--TERMINA EL PRIMER DIV--> 
                    <br>
                    <!--EMPIEZA EL SEGUNDO DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Tent Card</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/tent1.png" alt="">
                                <a href="img/tent1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
                <li>
                    <!--EMPIEZA EL PRIMER DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Estampado</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/estampado-v1.png" alt="">
                                <a href="img/estampado-v1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                    <!--TERMINA EL PRIMER DIV--> 
                    <br>
                    <!--EMPIEZA EL SEGUNDO DIV--> 
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-flex uk-flex-center complementos-header">
                            <h1 class="titulos">Anillados</h1>
                        </div>
                    </div>
                    <!--CONTENEDOR DE LA INFORMACION-->
                    <br>
                    <div class="container-fluid">
                        <div class="uk-grid row">
                            <div class="uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10">
                                <img src="img/anillado1.png" alt="">
                                <a href="img/anillado1.png" data-uk-lightbox="" class="uk-button uk-button-link uk-button-large uk-flex uk-flex-center">VER EJEMPLO</a>
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
                </li>
            </ul>
            <!--TERMINA LOS DIVS QUE SE MUESTRAN LA INFORMACION--> 
        </div>
        <!--DIV PARA LOS PRODUCTOS QUE ELLOS OFRECEN DE EJEMPLO--> 
        <div class="">
            <div class="uk-grid">
                <div class="uk-width-1-1 servicios-header uk-text-center">
                    <h2 class="titulos">MIRA LO QUE PODEMOS HACER</h2>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row uk-grid">
                <!--SE LE DA UNA ANCHURA TOTAL--> 
                    <div class="uk-width-1-1">
                    <!--SE CRE EL SLIDESET--> 
                        <div class="uk-margin slideset-servicios-small" data-uk-slideset="{animation:'fade', duration:'170', large:4,medium:3, small:2}">
                            <div class="uk-slidenav-position uk-margin">
                                <ul class="uk-slideset uk-grid uk-flex-center">
                                    <li><img src="img/recetario1.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/recetario2.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/recetario3.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/menu1.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/menu2.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/menu3.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/agenda1.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/agenda2.png" class="img-servicios" alt=""></li>
                                </ul>
                                <!--NAVEGACION DE LAS IMAGENES--> 
                                <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                                <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
                            </div>
                            <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
                        </div>
                        <!--SE MUESTRA AL HACERCE PEQUEÑO--> 
                        <div class="uk-margin slideset-servicios-small" data-uk-slideset="{animation:'fade', duration:'170', large:4,medium:3, small:2}">
                            <div class="uk-slidenav-position uk-margin">
                                <ul class="uk-slideset uk-grid uk-flex-center">
                                    <li><img src="img/estampado-v1.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/estampado-v2.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/agenda3.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/portafolio2.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/menu2.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/menu3.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/agenda1.png" class="img-servicios" alt=""></li>
                                    <li><img src="img/agenda2.png" class="img-servicios" alt=""></li>
                                </ul>   
                                <!--CONTROLES DEL SLIDESET--> 
                                <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                                <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
                            </div>
                            <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--SE INCLUYE EL FOOTER--> 
        <?php include 'footer.php' ?>
        <!--SE INCLUYEN LOS SCRIPT--> 
        <?php include 'scripts.php' ?>
    </body>
</html>