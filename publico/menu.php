<?php 
   require_once "../privado/procesos/logueado.php";
?>
<!--EL MENU-->
<div class="container-fluid">
	<div class="row">
		<nav>
			<div id="menu">
				<div id="movilm">
					<div id="menu-mt">
						<div class="glyph"><div class="glyph-icon flaticon-menu-button" id="menubutton"></div></div>
					</div>
					<p class="text-center" id="headerm">PUNTO PRINT</p>
				</div>
				<div class="movildiv"></div>
            <div class="itemm p">
               <a href="inicio">
                  <div class="glyph"><div class="glyph-icon flaticon-paint-brush"></div>
                       <div class="class-name">Inicio</div>
                  </div>
               </a>
            </div>
            <div class="itemm p">
               <a href="#">
                  <div class="glyph"><div class="glyph-icon flaticon-ads"></div>
                       <div class="class-name">Banner</div>
                  </div>
               </a>
            </div>
            <div class="itemm p">
               <a href="#">
                  <div class="glyph"><div class="glyph-icon flaticon-clothes"></div>
                       <div class="class-name">Estampados</div>
                  </div>
               </a>
            </div>
            <div class="itemm p">
               <a href="#">
                  <div class="glyph"><div class="glyph-icon flaticon-two-presentation-cards-with-text-and-photograph"></div>
                       <div class="class-name">Tarjetas</div>
                  </div>
               </a>
            </div>
            <?php  
               $loginop = "";
               if ($nombre == "Iniciar sesión") {
                  $loginop .= "<div class='itemm p'>";
                     $loginop .= "<a href='iniciarsesion'>";
                        $loginop .= "<div class='glyph'><div class='glyph-icon flaticon-user'></div>";
                           $loginop .= "<div class='class-name'>".$nombre."</div>";
                        $loginop .= "</div>";
                     $loginop .= "</a>";
                  $loginop .= "</div>";
               }else{
                  $loginop .= "<div class='itemm p' id='next'>";
                     $loginop .= "<div class='glyph'><div class='glyph-icon flaticon-user'></div>";
                          $loginop .= "<div class='class-name'>".$nombre."</div>";
                     $loginop .= "</div>";
                  $loginop .= "</div>";
               }
               
               print($loginop);
            ?>

				<!--<div class="col-lg-1 color2">
					<div class="itemm p">
						<div class="glyph"><div class="glyph-icon flaticon-two-presentation-cards-with-text-and-photograph"></div>
					        <div class="class-name">Tarjetas</div>
						</div>
					</div>
				</div>
				<div class="col-lg-1 color3">
					<div class="itemm p">
						<div class="glyph"><div class="glyph-icon flaticon-clothes"></div>
					        <div class="class-name">Estampados</div>
						</div>
					</div>
				</div>
				<div class="col-lg-1 color4">
					<div class="itemm p">
						<div class="glyph"><div class="glyph-icon flaticon-balloons"></div>
					        <div class="class-name">Fiestas</div>
						</div>
					</div>
				</div>
				<div class="col-lg-1 color1">
					<div class="itemm p">
						<div class="glyph"><div class="glyph-icon flaticon-drawing"></div>
					        <div class="class-name">Edición</div>
						</div>
					</div>
				</div>
				<div class="col-lg-1 color2">
					<div class="itemm p">
						<a href="iniciarsesion">
							<div class="glyph"><div class="glyph-icon flaticon-user"></div>
						        <div class="class-name">Login</div>
							</div>
						</a>
					</div>
				</div>-->
            
            <div class="itemm login">
               <a href="compras">
                  <div class="glyph"><div class="glyph-icon flaticon-shopping-cart"></div>
                       <div class="class-name">Mi carrito</div>
                  </div>
               </a>
            </div>
				<div class="itemm login">
               <a href="miperfil">
   					<div class="glyph"><div class="glyph-icon flaticon-settings"></div>
   				        <div class="class-name">Mi cuenta</div>
   					</div>
               </a>
				</div>
            <div class="itemm login">
               <a href="cotizar">
                  <div class="glyph"><div class="glyph-icon flaticon-mail"></div>
                       <div class="class-name">Cotizar</div>
                  </div>
               </a>
            </div>
				<div class="itemm login">
               <a href="cerrarsesion">
   					<div class="glyph"><div class="glyph-icon flaticon-logout"></div>
   				        <div class="class-name">Salir</div>
   					</div>
               </a>
				</div>
				<div class="itemm login" id="volver">
					<div class="glyph"><div class="glyph-icon flaticon-upload"></div>
				        <div class="class-name">Volver</div>
					</div>
				</div>

				<div class="col-sm-12 opm">
               <div class="itemm-m pmov">
                  <a href="inicio">
                     <div class="glyph"><div class="glyph-icon flaticon-paint-brush"></div>
                          <div class="class-name">Inicio</div>
                     </div>
                  </a>
               </div>
					<div class="itemm-m pmov">
						<div class="glyph"><div class="glyph-icon flaticon-ads"></div>
					        <div class="class-name">Banners</div>
						</div>
					</div>
					<div class="itemm-m pmov">
						<div class="glyph"><div class="glyph-icon flaticon-two-presentation-cards-with-text-and-photograph"></div>
					        <div class="class-name">Tarjetas</div>
						</div>
					</div>
					<div class="itemm-m pmov">
						<div class="glyph"><div class="glyph-icon flaticon-clothes"></div>
					        <div class="class-name">Estampados</div>
						</div>
					</div>
					<div class="itemm-m pmov">
						<div class="glyph"><div class="glyph-icon flaticon-balloons"></div>
					        <div class="class-name">Fiestas</div>
						</div>
					</div>
					<div class="itemm-m pmov">
						<div class="glyph"><div class="glyph-icon flaticon-drawing"></div>
					        <div class="class-name">Edición</div>
						</div>
					</div>
               <?php 
                  if ($nombre == "Iniciar sesión") {
                     $loginm = "";
                     $loginm = "<div class='itemm-m pmov'>";
                        $loginm .= "<a href='iniciarsesion'>";
                           $loginm .= "<div class='glyph'><div class='glyph-icon flaticon-user'></div>";
                                $loginm .= "<div class='class-name'>Iniciar sesión</div>";
                           $loginm .= "</div>";
                        $loginm .= "</a>";
                     $loginm .= "</div>";
                  }else{
                     $loginm = "<div class='itemm-m pmov' id='next-mov'>";
                        $loginm .= "<div class='glyph'><div class='glyph-icon flaticon-user'></div>";
                             $loginm .= "<div class='class-name'>".$nombre."</div>";
                        $loginm .= "</div>";
                     $loginm .= "</div>";
                  }
                  print($loginm)
               ?>
					<!--<div class="itemm login">
						<div class="glyph"><div class="glyph-icon flaticon-shopping-cart"></div>
					        <div class="class-name">Mi carrito</div>
						</div>
					</div>
					<div class="itemm login">
						<div class="glyph"><div class="glyph-icon flaticon-settings"></div>
					        <div class="class-name">Mi cuenta</div>
						</div>
					</div>
					<div class="itemm login">
						<div class="glyph"><div class="glyph-icon flaticon-logout"></div>
					        <div class="class-name">Salir</div>
						</div>
					</div>-->
               <div class="itemm-m loginmov hide">
                  <a href="compras">
                     <div class="glyph"><div class="glyph-icon flaticon-shopping-cart"></div>
                          <div class="class-name">Mi carrito</div>
                     </div>
                  </a>
               </div>
               <div class="itemm-m loginmov hide">
                  <a href="miperfil">
                     <div class="glyph"><div class="glyph-icon flaticon-settings"></div>
                          <div class="class-name">Mi cuenta</div>
                     </div>
                  </a>
               </div>
               <div class="itemm-m loginmov hide">
                  <a href="cotizar">
                     <div class="glyph"><div class="glyph-icon flaticon-mail"></div>
                          <div class="class-name">Cotizar</div>
                     </div>
                  </a>
               </div>
               <div class="itemm-m loginmov hide">
                  <a href="cerrarsesion">
                     <div class="glyph"><div class="glyph-icon flaticon-logout"></div>
                          <div class="class-name">Cerrar sesión</div>
                     </div>
                  </a>
               </div>
					<div class="itemm-m loginmov hide" id="volver-mov">
						<div class="glyph"><div class="glyph-icon flaticon-upload"></div>
					        <div class="class-name">Volver</div>
						</div>
					</div>
				</div>
				<div class="overlay"></div>	
			</div>
			<div class="overlym"></div>
			<div class="overlym2"></div>
		</nav>
	</div>
</div>
<!--FIN DEL MENU-->