<?php 
   $id_cl = 0;
   $nombre = "Iniciar sesión";
   if(!isset($_SESSION)) 
   { 
      session_start(); 
      if(!empty($_SESSION['autenticado'])){       
         $nombre = $_SESSION['autenticado'];
         require '../privado/procesos/conexion.php';
         $sql = "SELECT * FROM clientes WHERE correo_cliente=?";
         $correo = $_SESSION['email'];
         $stmt = $con->prepare($sql);
         $stmt->execute(array($correo));
         $nomb = $stmt->fetch(PDO::FETCH_BOTH);
         $nombre = $nomb[1];
         $id_cl = $nomb[0];
         //$con = null;
      }
      else{
         $nombre = "Iniciar sesión";
      }
   } 
?>
<div id="menu">
   <div id="mobile">
      <div id="boton-container">
         <i class="uk-icon-bars uk-icon-large close-menu" id="menu-movil-b"></i>
      </div>
      <div id="header-container">
         <h2 id="header-movil">PUNTO PRINT</h2>
      </div>
      <div id="cont-op-mv">
         <div id="inner">
            <nav id="nav-menu-mv">
               <ul>
                  <li class="item-m">
                     <a href="">TARJETAS</a><span class="uk-icon-chevron-circle-down uk-icon-small uk-float-right submenu-button"></span>
                     <ul class="sub-menu-mv">
                        <li class="item-sb"><a href="tarjetas.php">sadsa</a></li>
                     </ul>
                  </li>
                  <li class="item-m"><a href="banner.php">BANNERS</a></li>
                  <li class="item-m">
                     <a href="">VYNILES</a><span class="uk-icon-chevron-circle-down uk-icon-small uk-float-right submenu-button"></span>
                     <ul class="sub-menu-mv">
                        <li class="item-sb"><a href="vyniles.php">Servicio de Vyniles</a></li>
                     </ul>
                  </li>
                  <li class="item-m">
                     <a href="">ESTAMPADOS</a><span class="uk-icon-chevron-circle-down uk-icon-small uk-float-right submenu-button"></span>
                     <ul class="sub-menu-mv">
                        <li class="item-sb"><a href="estampados.php">Serigrafía</a></li>
                     </ul>
                  </li>
                  <li class="item-m">
                     <a href="">OTROS</a><span class="uk-icon-chevron-circle-down uk-icon-small uk-float-right submenu-button"></span>
                     <ul class="sub-menu-mv">
                        <li class="item-sb">
                           <a href="">Trabajos varios</a><span class="uk-icon-arrow-down uk-icon-small uk-float-right submenu-button"></span>
                           <ul class="sub-menu-mv">
                              <li class="item-sb"><a href="varios.php">Recetarios</a></li>
                              <li class="item-sb"><a href="varios.php">Portafolios</a></li>
                              <li class="item-sb"><a href="varios.php">Menús</a></li>
                           </ul>
                        </li>
                        <li class="item-sb">
                           <a href="">IMPRESION DIGITAL</a><span class="uk-icon-arrow-down uk-icon-small uk-float-right submenu-button"></span>
                           <ul class="sub-menu-mv">
                              <li class="item-sb"><a href="impresionesd.php">Afiches</a></li>
                           </ul>
                        </li>
                        <li class="item-sb">
                           <a href="">Paquetes de fiestas</a><span class="uk-icon-arrow-down uk-icon-small uk-float-right submenu-button"></span>
                           <ul class="sub-menu-mv">
                              <li class="item-sb"><a href="paquetes_fiesta.php">Invitaciones</a></li>
                           </ul>
                        </li>
                        <li class="item-sb">
                           <a href="">Fotografías</a><span class="uk-icon-arrow-down uk-icon-small uk-float-right submenu-button"></span>
                           <ul class="sub-menu-mv">
                              <li class="item-sb"><a href="fotos.php">Cédula y carnet</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <?php 
                     $login_menu = "";
                     if($nombre != "Iniciar sesión"){
                        $login_menu .= "<li class='item-m'>";
                           $login_menu .= "<a href=''>". $nombre . "</a>";
                           $login_menu .= "<span class='uk-icon-user uk-icon-medium icons-user submenu-button'></span>";
                           $login_menu .= "<ul class='sub-menu-mv'>";
                              $login_menu .= "<li class='item-sb'>";
                                 $login_menu .= "<a href='carrito.php'>Mi carrito<span class='cart-arrow-down uk-icon-medium icons-user'></a>";
                              $login_menu .= "</li>";
                              $login_menu .= "<li class='item-sb'>";
                                 $login_menu .= "<a href='dashboardc.php'>Mi cuenta<span class='cart-arrow-down uk-icon-medium icons-user'></a>";
                              $login_menu .= "</li>";
                              $login_menu .= "<li class='item-sb'>";
                                 $login_menu .= "<a href='cotizarcliente.php'>Mis cotizaciones<span class='cart-arrow-down uk-icon-medium icons-user'></a>";
                              $login_menu .= "</li>";
                              $login_menu .= "<li class='item-sb'>";
                                 $login_menu .= "<a href='../privado/procesos/cerrarsesionc.php'>Cerrar Sesión<span class='cart-arrow-down uk-icon-medium icons-user'></a>";
                              $login_menu .= "</li>";
                           $login_menu .= "</ul>";
                        $login_menu .= "</li>";
                        print($login_menu);
                     }else{
                        $login_menu .= "<li class='item-m' id='last'>";
                           $login_menu .= "<a href='#modal-login' data-uk-modal=''>". $nombre;
                           $login_menu .= "<span class='uk-icon-user uk-icon-medium icons-user'></span></a>";
                        $login_menu .= "</li>";
                        /*$login_menu .= "<li class='item-m'>";
                           $login_menu .= "<a href='#'>". $nombre;
                           $login_menu .= "<span class='uk-icon-user uk-icon-medium icons-user submenu-button'></span></a>";
                           $login_menu .= "<ul class='sub-menu-mv'>";
                              $login_menu .= "<li class='item-sb'>";
                                 $login_menu .= "<a href='carrito.php'>Mi carrito<span class='cart-arrow-down uk-icon-medium icons-user'></a>";
                              $login_menu .= "</li>";
                           $login_menu .= "</ul>";
                        $login_menu .= "</li>";*/
                        print($login_menu);
                     }
                  ?>
               </ul>
            </nav>
         </div>
      </div>
      <div class="overlay">
      </div>
   </div>
   <div id="options">
      <nav id="nav-menu">
         <ul>
            <li class="item"><a href="index.php">PUNTO PRINT</a></li>
            <li class="item"><a href="banner.php">BANNERS</a></li>
            <li class="item">
               <a href="">TARJETAS<span class="uk-icon-chevron-down uk-icon-justify uk-float-right icon-down-menu"></span></a>
               <ul>
                  <li><a href="tarjetas.php">Laminadas</a></li>
               </ul>
            </li>
            <li class="item">
               <a href="">VYNILES<span class="uk-icon-chevron-down uk-icon-justify uk-float-right icon-down-menu"></span></a>
               <ul>
                  <li><a href="vyniles.php">Servicio de vyniles</a></li>
               </ul>
            </li>
            <li class="item">
               <a href="estampados.php">ESTAMPADOS<span class="uk-icon-chevron-down uk-icon-justify uk-float-right icon-down-menu"></span></a>
            </li>
            <li class="item">
               <a href="sublimacion.php">SUBLIMACIÓN<span class="uk-icon-chevron-down uk-icon-justify uk-float-right icon-down-menu"></span></a>
            </li>
            <li class="item">
               <a href="">OTROS<span class="uk-icon-chevron-down uk-icon-justify uk-float-right icon-down-menu"></span></a>
               <ul>
                  <li>
                     <a href="">Trabajos varios<span class="uk-icon-chevron-right uk-float-right"></span></a>
                     <ul>
                        <li><a href="varios.php">Recetarios</a></li>
                        <li><a href="varios.php">Portafolios</a></li>
                        <li><a href="varios.php">Menús</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="">Impresión digital<span class="uk-icon-chevron-right uk-float-right"></span></a>
                     <ul>
                        <li><a href="impresionesd.php">Afiches</a></li>
                        <li><a href="impresionesd.php">Brochures</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="">Paquetes de fiesta<span class="uk-icon-chevron-right uk-float-right"></span></a>
                     <ul>
                        <li><a href="paquetes_fiesta.php">Invitaciones</a></li>
                        <li><a href="paquetes_fiesta.php">Gorros y coronas</a></li>
                     </ul>
                  </li
                  <li>
                     <a href="">Fotografías<span class="uk-icon-chevron-right uk-float-right"></span></a>
                     <ul>
                        <li><a href="fotos.php">Cédula y carnet</a></li>
                     </ul>
                  </li>
                  <li><a href="">Publicidad</a></li>
               </ul>
            </li>
            <?php 
               $login_menu = "";
               if($nombre != "Iniciar sesión"){
                  $login_menu .= "<li class='item' id='itemlogin'>";
                     $login_menu .= "<a href='#'>". $nombre;
                     $login_menu .= "<span class='uk-icon-user uk-icon-medium icons-user'></span></a>";
                     $login_menu .= "<ul>";
                        $login_menu .= "<li>";
                           $login_menu .= "<a href='carrito.php'>Mi carrito";
                           $login_menu .= "<span class='uk-icon-cart-arrow-down uk-icon-medium uk-float-right'></a></span>";
                        $login_menu .= "</li>";
                        $login_menu .= "<li>";
                           $login_menu .= "<a href='dashboardc.php'>Mi cuenta";
                           $login_menu .= "<span class='uk-icon-cog uk-icon-medium uk-float-right'></a></span>";
                        $login_menu .= "</li>";
                        $login_menu .= "<li>";
                           $login_menu .= "<a href='cotizarcliente.php'>Mis cotizaciones";
                           $login_menu .= "<span class='uk-icon-inbox uk-icon-medium uk-float-right'></a></span>";
                        $login_menu .= "</li>";
                        $login_menu .= "<li>";
                           $login_menu .= "<a href='../privado/procesos/cerrarsesionc.php'>Cerrar sesión";
                           $login_menu .= "<span class='uk-icon-angle-double-left uk-icon-medium uk-float-right'></a></span>";
                        $login_menu .= "</li>";
                     $login_menu .= "</ul>";
                  $login_menu .= "</li>";
                  print($login_menu);
               }else{
                  $login_menu .= "<li class='item'>";
                     $login_menu .= "<a href='#modal-login' data-uk-modal=''>". $nombre;
                     $login_menu .= "<span class='uk-icon-user uk-icon-medium icons-user'></span></a>";
                  $login_menu .= "</li>";
                  print($login_menu);
               }
            ?>
         </ul>
      </nav>
   </div>
</div>
<!--CREO UN MODAL DE LOGIN-->
<div id="modal-login" class="uk-modal modal">
   <div class="uk-modal-dialog modal-sm">
      <a href="" data-uk-modal="" class="uk-modal-close uk-close"></a>
      <!--HEADER DEL LOGIN-->
      <div class="uk-modal-header">
         <h5>BIENVENIDO A PUNTO PRINT</h5>
      </div>
      <!--EL BODY DEL MODAL-->
      <div class="uk-flex uk-flex-center">
         <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle">
            <!--FORMULARIO DE INICO DE SESIÓN-->
               <form action="../privado/procesos/logincliente.php" method="post">
                  <h4 class="uk-text-center"><p>Usuario o email</p></h4>
                  <input class="form-control col-lg-12" type="text" placeholder="Usuario o email" name="correo">
                  <br>
                  <br>
                  <br>
                  <h4 class="uk-text-center"><p>Contraseña</p></h4>
                  <input class="form-control col-lg-12" type="password" placeholder="Contraseña" name="clave">
                  <button class="btn btn-primary btn-iniciar-s col-lg-12" name="iniciar_sesion">Iniciar Sesión</button>
                  <!--OLVIDÉ LA CONTRASEÑA-->
                  <div class="uk-form-row uk-text-small">
                     <a class="uk-float-right uk-link uk-link-muted" href="#modal-recuperar" data-uk-modal="" class="uk-modal-close uk-close">¿Olvidaste la contraseña?</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <br>
      <a class="uk-flex uk-flex-center uk-link uk-link-muted" href="#modal-registrer" data-uk-modal="" class="uk-modal-close uk-close">¡Registrarme ahora!</a>
      <!--OTRAS OPCIONES DE INICIO DE SESIÓN-->
      <hr class="uk-article-divider">
      <h5 class="uk-text-center">INICIAR SESIÓN O REGISTRASE CON</h5>
      <div class="uk-panel uk-flex uk-flex-center">
         <a href="" data-uk-tooltip="pos:'bottom'" title="Iniciar sesión con Facebook" class="uk-icon-button uk-icon-facebook-square inicio-alter"></a>
         <a href="" data-uk-tooltip="pos:'bottom'" title="Iniciar sesion con Twitter" class="uk-icon-button uk-icon-twitter inicio-alter"></a>
         <a href="" data-uk-tooltip="pos:'bottom'" title="Iniciar sesion con Google Plus " class="uk-icon-button uk-icon-google-plus inicio-alter"></a>
      </div>
      <!--PARTE FINAL DEL MODAL-->
      <div class="uk-modal-caption">
         Punto Print - Soluciones en impresiones
      </div>
   </div>
</div>
<!--MODAL PARA RECUPERAR CONTRASEÑA-->
<div id="modal-recuperar" class="uk-modal modal">
   <div class="uk-modal-dialog">
      <a href="" class="uk-modal-close uk-close"></a>
      <div class="uk-modal-header">
         <h5>BIENVENIDO A PUNTO PRINT</h5>
      </div>
      <div class="uk-flex uk-flex-center">
         <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle">
               <form class="uk-form">
                  <h5><p>Por favor, ingrese su email o nombre de usuario</p></h5>
                  <br>
                  <h5 class="uk-text-center"><p>Usuario o email</p></h5>
                  <div class="uk-form-row">
                     <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Usuario o email">
                  </div>
                  <div class="uk-form-row">
                     <button class="uk-button uk-button-primary uk-button-large uk-modal-close uk-width-1-1"  data-message="<i class='uk-icon-check'></i> Revisa tu email por favor." data-pos="top-center">Recuperar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="uk-modal-caption">
         Punto Print - Soluciones en impresiones
      </div>
   </div>
</div>
<!--CREO UN MODAL DE REGISTRO-->
<div class="uk-modal" id="modal-registrer">
   <div class="uk-modal-dialog modal-md">
      <a href="" class="uk-modal-close uk-close"></a>
      <div id="frm-u">
         <div class="uk-modal-header">
            <h4 class="modal-tittle">Bienvenido a Punto Print: Registro</h4>
         </div>
         <div class="modal-body">
            <div class="row" id="frm">
               <div class="col-lg-6">
                  <p>Nombres:</p>
                  <input class="form-control col-lg-12" type="text" placeholder="Nombres">
               </div>
               <div class="col-lg-6">
                  <p>Apellidos:</p>
                  <input class="form-control col-lg-12" type="text" placeholder="Apellidos">
               </div>
               <div class="col-lg-12">
                  <br>
                  <p>Correo electrónico</p>
                  <div class="uk-form-icon uk-width-1-1">
                     <i class="uk-icon-envelope"></i>
                     <input class="form-control" type="text" placeholder="Email">
                  </div>
               </div>
               <div class="col-lg-6">
                  <br>
                  <p>Contraseña:</p>
                  <div class="uk-form-icon uk-width-1-1">
                     <i class="uk-icon-key"></i>
                     <input class="form-control" type="password" placeholder="Contraseña">
                  </div>
               </div>
               <div class="col-lg-6">
                  <br>
                  <p>Confirmar:</p>
                  <div class="uk-form-icon uk-width-1-1">
                     <i class="uk-icon-check"></i>
                     <input class="form-control omitir" type="password" placeholder="Confirmar contraseña">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="uk-button uk-button-success uk-button-large btn-block btn-regc omitir" data-message="<i class='uk-icon-check'></i> REGISTRO COMPLETO." data-pos="top-center">REGISTRARME</button>
         </div>
      </div>
   </div>
</div>