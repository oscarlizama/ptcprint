<!DOCTYPE html>
<html lang="en">
<head>
	<title>Realizar Pago</title>
	<?php include 'links.php';?>
</head>
<body>
	<?php include 'menu.php' ?>
	<div class="uk-grid uk-grid-medium uk-match-grid limitmenu" data-uk-grid-match="{row: true}" >
		<div class="uk-width-small-1-2 uk-width-medium-2-5 uk-width-large-2-5 cont_prod_fix"> <!--div para los productos-->
			<ul class="uk-nav uk-nav-side" id="listpre" data-uk-switcher="{connect:'#pre1, #pre2'}">
            	<li><hr><a href="">
            		<div class="uk-grid uk-grid-divider">
            			<div class="uk-width-2-4">Sublimación: Taza </div>
						<div class="uk-width-1-4">$13.99</div>
						<div class="uk-width-1-4"><img src="img/taza1.png" alt="" class="img-rounded" width="40px" heigth="40px"><span class="uk-close"></span></div>						
					</div>
				</a></li>
				<li><hr><a href="">
					<div class="uk-grid uk-grid-divider">
            			<div class="uk-width-2-4">Cartas de presentacion: 1 cara </div>
						<div class="uk-width-1-4">$9.99</div>
						<div class="uk-width-1-4"><img src="img/tarjetap2.png" alt="" class="img-rounded" width="40px" heigth="40px"><span class="uk-close"></span></div>
					</div>
				</a></li>
				<li><hr><a href="">	
					<div class="uk-grid uk-grid-divider">
            			<div class="uk-width-2-4">Estampado: Camisa</div>
						<div class="uk-width-1-4">$5.00</div>
						<div class="uk-width-1-4"><img src="img/estampado1.png" alt="" class="img-rounded" width="40px" heigth="40px"><span class="uk-close"></span></div>
					</div>
				</a></li>
				<li><hr><a href="">	
					<div class="uk-grid uk-grid-divider">
            			<div class="uk-width-2-4">Impresiones: Banner</div>
						<div class="uk-width-1-4">$10.00</div>
						<div class="uk-width-1-4"><img src="img/banner4.png" alt="" class="img-rounded" width="40px" heigth="40px"><span class="uk-close"></span></div>
					</div>
				</a></li>
				<hr>
        	</ul>
        	<div class="uk-grid titulo-pago clear">
        		<table>
	        		<tr><td><h4>Subtotal: $28.98</h4></td></tr>
	        		<tr><td><h4>Total: $28.98</h4></td></tr>
        		</table>
        	</div>		
		</div>
		<div class="uk-width-small-1-2 uk-width-medium-2-5 uk-width-large-2-5 "> <!--div para la prevista-->
			<ul class="uk-switcher" id="pre1">
				<li>
					<img src="img/taza1.png" alt="" id="prevista" width="205px" height="10px" class="img-responsive center-block uk-hidden-medium uk-hidden-large">					
					<img src="img/taza1.png" alt="" id="prevista" width="450px" height="10px" class="img-responsive center-block uk-hidden-small">
					<div class="uk-text-center-medium uk-text-primary uk-hidden-medium uk-hidden-large espa_txt">
						<p>
							Taza color blanco tamaño normal <br>
							diseño personalizado <br>
							$13.99
						</p>						
					</div>
				</li>
				<li>
					<img src="img/tarjetap2.png" alt="" id="prevista" width="205px" class="img-responsive center-block uk-hidden-medium uk-hidden-large">
					<img src="img/tarjetap2.png" alt="" id="prevista" width="450px" class="img-responsive center-block uk-hidden-small">
					<div class="uk-text-center-medium uk-text-primary uk-hidden-medium uk-hidden-large espa_txt">
						<br>
						<br>
						<p>
							Carta de presentacion de una cara <br>
							Diseño previo #1321 <br>
							$9.99
						</p>						
					</div>
				</li>			
				<li>
					<img src="img/estampado1.png" alt="" id="prevista" width="205px" class="img-responsive center-block uk-hidden-medium uk-hidden-large">
					<img src="img/estampado1.png" alt="" id="prevista" width="450px" class="img-responsive center-block uk-hidden-small">
					<div class="uk-text-center-medium uk-text-primary uk-hidden-medium uk-hidden-large espa_txt">
						<p>
							Camisa color de fondo blanca (M)<br>
							Estampado diseño personalizado <br>
							$5.00
						</p>						
					</div>
				</li>
				<li>
					<img src="img/banner4.png" alt="" id="prevista" width="205px" class="img-responsive center-block uk-hidden-medium uk-hidden-large">
					<img src="img/banner4.png" alt="" id="prevista" width="450px" class="img-responsive center-block uk-hidden-small">
					<div class="uk-text-center-medium uk-text-primary uk-hidden-medium uk-hidden-large espa_txt">
						<p>
							Banner con esqueleto plegable <br>
							diseño personalizado <br>
							$10.00
						</p>						
					</div>
				</li>
			</ul>
			<hr class="uk-grid-divider uk-hidden-medium uk-hidden-large">
			<div class="uk-hidden-medium uk-hidden-large uk-grid">
				<div class="uk-width-1-5"></div>
				<div class="uk-width-3-5"><button class="uk-button uk-button-primary uk-button-large btnCompras" data-uk-modal="{target:'#verificar'}">¡Realizar Compra!</button></div>
				<div class="uk-width-1-5"></div>				
			</div>
		</div>
		<div class="uk-width-small-hidden uk-width-medium-1-5 uk-width-large-1-5"> <!--div para la descripcion (>768)-->
			<ul class="uk-switcher" id="pre2">
				<li>
					<div class="textdesc uk-text-center uk-text-large uk-hidden-small">
						<p>
							Taza color blanco tamaño normal <br><br>
							diseño personalizado <br><br>
							$13.99
						</p>						
					</div>
				</li>
				<li>
					<div class="textdesc uk-text-center uk-text-large uk-hidden-small">						
						<p>
							Carta de presentacion de una cara <br><br>
							Diseño previo #1321 <br><br>
							$9.99
						</p>						
					</div>					
				</li>
				<li>
					<div class="textdesc uk-text-center uk-text-large uk-hidden-small">
						<p>
							Camisa color de fondo blanca (M)<br><br>
							Estampado diseño personalizado <br><br>
							$5.00
						</p>						
					</div>
				</li>
				<li>
					<div class="textdesc uk-text-center uk-text-large uk-hidden-small">
						<p>
							Banner con esqueleto plegable <br><br>
							diseño personalizado <br><br>
							$10.00
						</p>						
					</div>
				</li>
			</ul>
			<hr class="uk-grid-divider uk-hidden-small">				
			<button class="uk-button uk-button-primary uk-button-large uk-hidden-small btnCompraxl" data-uk-modal="{target:'#verificar'}">¡Realizar Compra!</button>
		</div>
		<div id="verificar" class="uk-modal">
    		<div class="uk-modal-dialog uk-modal-dialog-large"> 
    		<span class="uk-modal-close uk-close"></span>
    		<h5>Metodo de pago: </h5>
				<div class="" data-uk-button-radio>
					<button class="uk-button uk-button-large uk-button-primary active">
						<h5>Tarjeta de credito</h5>						
					</button>
					<button class="uk-button uk-button-large btnpay">    				
						<img src="img/paypal.png" id="paypal">
					</button>					
    			</div>
    			<hr class="uk-grid-divider">
    			<div class="uk-grid">
    				<div class="uk-width-1-4">
    					<form class="uk-form">
    					    <div class="uk-form-row">
    					        <label class="uk-form-label" for="nombre">Nombre Completo</label>
    					        <div class="uk-form-controls">
    					            <input type="text" id="nombre" placeholder="Nombre" class="uk-form-width-large">    					            
    					        </div>
    					    </div>
    					    <div class="uk-form-row">
    					        <label class="uk-form-label" for="Numero">Numero de Contacto</label>
    					        <div class="uk-form-controls">    					            
    					            <input type="text" id="Numero" placeholder="Numero">
    					        </div>
    					    </div>
    					    <div class="uk-form-row">
    					        <label class="uk-form-label" for="ptcard">Deseo Utilizar mi Punto-Card</label>
    					        <div class="uk-form-controls">
    					            <input type="checkbox" id="ptcard" > Obtener Beneficios
    					        </div>
    					    </div>    					    
    					</form>
    				</div>
    				<div class="uk-width-1-4">
    					<form class="uk-form">
    					    <div class="uk-form-row">
    					        <label class="uk-form-label" for="tarjeta">Numero de Tarjeta</label>
    					        <div class="uk-form-controls">
    					            <input type="text" id="tarjeta" placeholder="">
    					        </div>
    					    </div>
    					    <div class="uk-form-row">
    					        <label class="uk-form-label" for="dropt">Tipo de Tarjeta </label>
    					        <div class="uk-form-controls">
    					            <div class="uk-form-select uk-button uk-button-large" id="dropt" data-uk-form-select>
    					                <span></span>
    					                <span class="caret"></span>
    					                <select>
    					                    <option value="0">MasterCard </option>
    					                    <option value="1">Visa</option>
    					                    <option value="2">Western Union</option>
    					                    <option value="3">PaypalCard</option>
    					                </select>
    					            </div>
    					        </div>
    					    </div>
    					    <div class="uk-form-row">
    					        <label class="uk-form-label" for="tarjeta">Numero de Seguridad</label>
    					        <div class="uk-form-controls">
    					            <input type="password" id="tarjeta" placeholder="pin">
    					        </div>
    					    </div>
    					    <div class="uk-form-row">
    					    	<button class="uk-button uk-button-success">
    					    		<h5>Verificar Información</h5>
    					    	</button>
    					    </div>
    					</form>    					
    				</div>
    				<div class="uk-width-2-4">
    					<div class="titulo-pago-modal uk-grid">
    						<div class="uk-width-1-1">
    							<table class="uk-table">
    								<thead>
    									<tr>
    										<td>Producto</td>
    										<td>Precio</td>
    									</tr>
    								</thead>
    								<tbody>
    									<tr>
    										<td>Sublimacion: Taza</td>
    										<td>$13.99</td>
    									</tr>
    									<tr>
    										<td>Carta de Presentacion: 1 cara</td>
    										<td>$9.99</td>
    									</tr>
    									<tr>
    										<td>Estampado: Camisa</td>
    										<td>$5.00</td>
    									</tr>
    									<tr>
    										<td>Impresiones: Banner</td>
    										<td>$10.00</td>
    									</tr>
    								</tbody>
    								<tfoot>
    									<tr>
    										<td>Subtotal</td>
    										<td>$28.98</td>
    									</tr>
    								</tfoot>
    							</table>
    							<div class="uk-grid">
    								<div class="uk-wdith-1-4">Saldo Actual <br> $120.00</div>
    								<div class="uk-wdith-1-4">Descuento <br> $ 5.00</div>
    								<div class="uk-wdith-1-4">Total <br> $23.98</div>
    								<div class="uk-wdith-1-4">Sobrante <br> $96.02</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="uk-modal-footer uk-grid">
    				<div class="uk-width-2-4">
    					<label>
    						<input type="checkbox" class="uk-form-danger"> Hé leido los <a href="#modal-terminos" data-uk-modal>Terminos y Condiciones</a>
    					</label>
    				</div>
    				<div class="uk-width-1-4"><button class="uk-button uk-button-large uk-modal-close">No estoy de acuerdo</button></div>
    				<div class="uk-width-1-4"><button class="uk-button uk-button-large uk-button-success uk-modal-close">¡Realizar Compra!</button></div>
    			</div>
    		</div>
		</div>
	</div>
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>
</body>
</html>