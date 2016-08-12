<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
  include 'procesos/lifeprivate.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Punto Print - Soluciones en impresiones</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
    		<!--incluyo el menu-->
			<?php include 'menu_admin.php' ?>
			<br>
			<br>
			<br>
			<div class="col-lg-8 col-lg-offset-2">
				<h1 class="h-negro text-center">MENSAJES</h1>
			</div>
		</div>	
	</div>
	<br>
	<div class="container-fluid">
    <div class="col-lg-3">
      <?php 
        //COMIENZO CON LAS CONSULTAS
        //VEO SI HAY CONVERSACIONES DEL CLIENTE
        $cnt_cvr = "SELECT COUNT(id_conversacion) FROM conversaciones";
        $stmt = $con->prepare($cnt_cvr);
        $stmt->execute(array());
        $cntcvr = $stmt->fetch(PDO::FETCH_BOTH);
        //CREO LAS VARIABLES  QUE SERVIRAN PARA DESPUES
        $ids_conver = [];
        $ul_tabs = "";
        $tablas_div = "";
        $i = 1;
        $m = 0;
        $no_leidos = false;
        $cnt_msj = "SELECT id_conversacion FROM conversaciones";
	    /*$stmt = $con->prepare($cnt_msj);
	    $stmt->execute(array($id_cl));
	    $cntmsj = $stmt->fetch(PDO::FETCH_BOTH);*/
	    //EJECUTO UN FOREACH PARA PONER LOS ID DE LAS CONVERASCIONES EN UN ARREGLO
	    foreach ($con->query($cnt_msj) as $idsc) {
	    	array_push($ids_conver, $idsc[0]);
	    }
        //CONUSLTA PARA OBTENER TODOS LOS ASUNTOS DE LAS CONVERSACIONES SI ES QUE HAY
        $conversaciones = "SELECT DISTINCT asunto,id_conversacion,CONCAT(clientes.nombre_cliente,' ',clientes.apellido_cliente) FROM conversaciones,clientes WHERE conversaciones.id_cliente = clientes.id_cliente";
        if($cntcvr[0] > 0){
          	//CREO LA LISTA QUE ME AYUDARA A ORGNIZAR LOS MENSAJES
        	$ul_tabs .= "<div class='panel panel-default'>";
				    $ul_tabs .= "<div class='panel-body'>";
          	$ul_tabs .= "<ul class='nav nav-pills nav-stacked'>";
          	$ul_tabs .= "<li class='active'><a data-toggle='tab' href='#bandeja'>Bandeja de entrada</a></li>";
          	//POR CADA MENSAJE, SE CREA UNA NUEVA LISTA
          	foreach ($con->query($conversaciones) as $asunto) {
          		$msjleido = "SELECT COUNT(msj_leido) FROM mensajes WHERE id_conversacion=? AND msj_leido=? AND emisor=?";
  		        $stmtb = $con->prepare($msjleido);
  		        $stmtb->execute(array($ids_conver[$m],0,0));
  		        $msjbool = $stmtb->fetch(PDO::FETCH_BOTH);
      				if($msjbool[0] > 0){
      					 $ul_tabs .= "<li id='$asunto[1]'><a data-toggle='tab' href='#msj".$i."'>$asunto[2] - $asunto[0] (NO LEIDO)</a></li>";
      					 $no_leidos = true;
      		  		}else{
      		  			$ul_tabs .= "<li><a data-toggle='tab' href='#msj".$i."'>$asunto[2] - $asunto[0]</a></li>";
      		  		}
      		  		$m = $m + 1;
                $i = $i + 1;
        	    }
      		$i = 1;          
      		$ul_tabs .= "</ul>";
      		$ul_tabs .= "</div>";
      		$ul_tabs .= "</div>";
      		$ul_tabs .= "</div>";
      		//IMPRIMO LA LISTA
	      	print($ul_tabs);
	      	$tablas_div .= "<div class='tab-content'>";
          	//echo $cntmsj[0];
          	//UN FOR PARA PONER LAS CONVERSACIONES
          	for ($f=0; $f < $cntcvr[0]; $f++) { 
            	$mensajecvr = "SELECT mensaje,emisor FROM mensajes WHERE id_conversacion=?";
            	$tablas_div .= "<div id='msj".($f + 1)."' class='tab-pane fade'>";
                	$tablas_div .= "<div class='col-lg-6'>";
                  	$tablas_div .= "<div class='scroll-div'>";
                  	//SACO LOS MENSAJES QUE EL CLIENTE HA ENVIADO PARA LA COTIZACION
            	      $stmt = $con->prepare($mensajecvr);
                    $stmt->execute(array($ids_conver[$f]));
                    while ($mensajes = $stmt->fetch(PDO::FETCH_BOTH)) {
                    if($mensajes[1] == 0){
                      	//POR CADA MENSAJE SE CREA UN PANEL PARA MOSTRARLO
                      	$tablas_div .= "<div class='panel panel-default col-lg-10'>";
                        	$tablas_div .= "<div class='panel-body'>";
                          		$tablas_div .= $mensajes[0];
                        	$tablas_div .= "</div>";
                      	$tablas_div .= "</div>";
                    }
                    //ESTE SE CREA CUANDO ES EL ADMINISTRADOR QUIEN RESPONDE AL MENSAJE
                    else{
                      	$tablas_div .= "<div class='panel panel-primary col-lg-10 col-lg-offset-1'>";
                        	$tablas_div .= "<div class='panel-body'>";
                          	$tablas_div .= $mensajes[0];
                        	$tablas_div .= "</div>";
                      	$tablas_div .= "</div>";
                    	}
              		$i = $i + 1;
            	}
                	//SE CREAN LOS BOTONES PARA QUE EL USUARIO HAGA TODO
                  	$tablas_div .= "</div>";
                  	$tablas_div .= "<div class='col-lg-12'>";
                  		$tablas_div .= "<input class='col-lg-12 form-control disabled hide' name='idconver$ids_conver[$f]' value=$ids_conver[$f]>";	
                    $tablas_div .= "<textarea rows='4' id='mensaje$ids_conver[$f]' class='col-lg-12 form-control estira' placeholder='Cuerpo del mensaje' autocomplete='off'></textarea>";
                    $tablas_div .= "<div class='row'>";
                      	$tablas_div .= "<div class='col-lg-12'>";
                        	$tablas_div .= "<br>";
                        	$tablas_div .= "<button class='btn btn-primary col-lg-5 col-lg-offset-7 btn-enviarmsj' id='$ids_conver[$f]' onclick='javascript:enviarmsjp($ids_conver[$f],1)'>Enviar</button>";
                      	$tablas_div .= "</div>";
                    	$tablas_div .= "</div>";
                  	$tablas_div .= "</div>";
                	$tablas_div .= "</div>";
                  $archivosctm = "SELECT COUNT(id_archivo) FROM archivos WHERE id_conversacion=?";
                  $stmtar = $con->prepare($archivosctm);
                  $stmtar->execute(array($ids_conver[$f]));
                  $arcbool = $stmtar->fetch(PDO::FETCH_BOTH);
                  $archivosclm = "SELECT * FROM archivos WHERE id_conversacion=?";
                	$tablas_div .= "<div class='col-lg-3'>";
                		$tablas_div .= "<div class='panel panel-default'>";
                  			$tablas_div .= "<div class='panel-heading'>";
                    			$tablas_div .= "<h3 class='text-center h-negro'>ARCHIVOS</h3>";
                  			$tablas_div .= "</div>";
                  			$tablas_div .= "<div class='panel-body'>";
                        if($arcbool > 0){
                          $tablas_div .= "<ul>";
                          $stmt = $con->prepare($archivosclm);
                          $stmt->execute(array($ids_conver[$f]));
                          while ($listaArchivos = $stmt->fetch(PDO::FETCH_BOTH)){
                            $tablas_div .= "<li><a href='procesos/descarga_archivo.php?id=$listaArchivos[0]'>$listaArchivos[1]</a></li>";
                          }
                          $tablas_div .= "</ul>";
                        }
                  			$tablas_div .= "</div>";
                		$tablas_div .= "</div>";
              		$tablas_div .= "</div>";
              	$tablas_div .= "</div>";
          	}
            	$tablas_div .= "<div id='bandeja' class='tab-pane fade in active'>";
            	if($no_leidos == false){
            		$tablas_div .= "<h1 class='h-negro text-center'>NO HAY MENSAJES NUEVOS QUE LEER</h1>";
            	}else{
            		$tablas_div .= "<h1 class='h-negro text-center'>TIENES MENSAJES NUEVOS QUE LEER</h1>";
            	}
            $tablas_div .= "</div>";
          $tablas_div .= "</div>";
          print($tablas_div);
        }else{
          //SI NO HAY MENSAJES ENVIADOS POR EL CLIENTE PARA QUE SE MUESTREN, SE CREA EL POR DEFECTO QUE ES EL DE ENVIAR
          $ul_tabs .= "<ul class='nav nav-pills nav-stacked'>";
            $ul_tabs .= "<li class='active'><a data-toggle='tab' href='#bandeja'>Nuevo</a></li>";
          $ul_tabs .= "</ul>";
          $ul_tabs .= "</div>";
          $tablas_div .= "<div class='tab-content'>";
            $tablas_div .= "<div class='col-lg-6'>";
            $tablas_div .= "<div id='bandeja' class='tab-pane fade in active'>";
            	if($no_leidos == false){
            		$tablas_div .= "<h1 class='h-negro text-center'>NO HAY MENSAJES NUEVOS QUE LEER</h1>";
            	}else{
            		$tablas_div .= "<h1 class='h-negro'>TIENES MENSAJES NUEVOS QUE LEER</h1>";
            	}
            $tablas_div .= "</div>";
          $tablas_div .= "</div>";
          print($ul_tabs);
          print($tablas_div);
          $con = null;
        }
      ?>
    </div>
  </div>
	<?php include 'scripts.php';?>
</body>
</html>