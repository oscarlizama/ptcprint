<?php 
  include '../privado/procesos/conexion.php';
  include '../privado/procesos/lifetime.php';
?>
<html lang="es">
<head>
	<title>Cotizar | Punto Print</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
	<!--Aqui incluyo el menú-->
    <?php include 'menu.php' ?>
    <br>
    <br>
	<!--CREO EL HADER DE LA PAGINA-->
  <div class="uk-width-1-1 banners">
		<h1 class="titulos titulos-sublim uk-text-center">COTIZAR PRODUCTOS</h1>
	</div>

  <div class="col-lg-12">
    <h2 class="text-center">MENSAJES</h2>
  </div>
  <br>
  <br>
  <div class="container-fluid">
    <div class="col-lg-3">
      <?php 
        //COMIENZO CON LAS CONSULTAS
        //VEO SI HAY CONVERSACIONES DEL CLIENTE
        $cnt_cvr = "SELECT COUNT(id_conversacion) FROM conversaciones WHERE id_cliente=?";
        //echo $id_cl;
        $stmt = $con->prepare($cnt_cvr);
        $stmt->execute(array($id_cl));
        $cntcvr = $stmt->fetch(PDO::FETCH_BOTH);
        //CREO LAS VARIABLES  QUE SERVIRAN PARA DESPUES
        $ids_conver = [];
        $ul_tabs = "";
        $tablas_div = "";
        $i = 1;
        $m = 0;
        $no_leidos = false;
        $selectc = "";
        $cnt_msj = "SELECT id_conversacion FROM conversaciones WHERE id_cliente=$id_cl";
        foreach ($con->query($cnt_msj) as $idsc) {
          array_push($ids_conver, $idsc[0]);
        }
        //CONUSLTA PARA OBTENER TODOS LOS ASUNTOS DE LAS CONVERSACIONES SI ES QUE HAY
        $conversaciones = "SELECT DISTINCT asunto,conversaciones.id_conversacion FROM conversaciones INNER JOIN mensajes ON conversaciones.id_conversacion = mensajes.id_conversacion WHERE id_cliente=$id_cl";
        if($cntcvr[0] > 0){
          $ul_tabs .= "<div class='panel panel-default'>";
          $ul_tabs .= "<div class='panel-body'>";
          $selectc .= "<select class='form-control' id='conver'>";
          //CREO LA LISTA QUE ME AYUDARA A ORGNIZAR LOS MENSAJES
          $ul_tabs .= "<ul class='nav nav-pills nav-stacked'>";
          $ul_tabs .= "<li class='active'><a data-toggle='tab' href='#nuevo'>Nuevo</a></li>";
          foreach ($con->query($conversaciones) as $asunto) {
              $msjleido = "SELECT COUNT(msj_leido) FROM mensajes WHERE id_conversacion=? AND msj_leido=? AND emisor=?";
              $stmtb = $con->prepare($msjleido);
              $stmtb->execute(array($ids_conver[$m],0,1));
              $msjbool = $stmtb->fetch(PDO::FETCH_BOTH);
              if ($msjbool[0]>0) {
                $ul_tabs .= "<li id='$asunto[1]'><a data-toggle='tab' href='#msj".$i."'>$asunto[0] (NO LEIDO)</a></li>";
                $no_leidos = true;
              }else{
                $ul_tabs .= "<li><a data-toggle='tab' href='#msj".$i."'>$asunto[0]</a></li>";
              }
                $selectc .= "<option value='$asunto[1]'>$asunto[0]</option>";
              $m = $m + 1;
              $i = $i + 1;
          }
          $selectc .= "</select>";
          //POR CADA MENSAJE, SE CREA UNA NUEVA LISTA
          /*foreach ($con->query($conversaciones) as $asunto) {
              $ul_tabs .= "<li><a data-toggle='tab' href='#msj".$i."'>$asunto[0]</a></li>";
              $i = $i + 1;
          }*/
          $i = 1;          
          $ul_tabs .= "</ul>";
          $ul_tabs .= "<br>";
          $ul_tabs .= "<form method='post' id='formulario' enctype='multipart/form-data'>";
            //$ul_tabs .= "<input class='col-lg-1 form-control' placeholder='Archivo' id='filenombre' name='file' type='file'autocomplete='off'>";
          $ul_tabs .= "<div id='upload-drop' class='uk-placeholder uk-text-center'>";
              $ul_tabs .= "<i class='uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right'></i>";
              $ul_tabs .= "Selecciona un archivo por favor <a class='uk-form-file'>aquí<input id='imagen' name='file' type='file'></a>.";
          $ul_tabs .= "</div>";
          $ul_tabs .= "<div id='progressbar' class='uk-progress uk-hidden'>";
            $ul_tabs .= "<div class='uk-progress-bar' style='width: 0%;'>0%</div>";
          $ul_tabs .= "</div>";
          $ul_tabs .= "<label id='lblseleccionado'>Ningún archivo seleccionado</label>";
          $ul_tabs .= "</form>";
          $ul_tabs .= "<label>Selecciona una conversacion para enviar el archivo</label>";
          $ul_tabs .= "<br>";
          $ul_tabs .= $selectc;
          $ul_tabs .= "<br>";
          $ul_tabs .= "<button class='btn btn-primary col-lg-12' onclick='javascipt:archivo()'>Enviar archivo adjunto</button>";
          $ul_tabs .= "</div>";
          $ul_tabs .= "</div>";
          $ul_tabs .= "</div>";
          //IMPRIMO LA LISTA
          print($ul_tabs);
          $tablas_div .= "<div class='tab-content'>";
          $cnt_msj = "SELECT id_conversacion FROM conversaciones WHERE id_cliente=$id_cl";
          //echo $cnt_msj;
          /*$stmt = $con->prepare($cnt_msj);
          $stmt->execute(array($id_cl));
          $cntmsj = $stmt->fetch(PDO::FETCH_BOTH);*/
          //EJECUTO UN FOREACH PARA PONER LOS ID DE LAS CONVERASCIONES EN UN ARREGLO
          /*foreach ($con->query($cnt_msj) as $idsc) {
            array_push($ids_conver, $idsc[0]);
          }*/
          //echo $cntmsj[0];
          //UN FOR PARA PONER LAS CONVERSACIONES
          for ($f=0; $f < $cntcvr[0]; $f++) { 
            $mensajecvr = "SELECT mensaje,emisor FROM mensajes WHERE id_conversacion=$ids_conver[$f]";
            $tablas_div .= "<div id='msj".($f + 1)."' class='tab-pane fade'>";
                $tablas_div .= "<div class='col-lg-6'>";
                  $tablas_div .= "<div class='scroll-div'>";
                  //SACO LOS MENSAJES QUE EL CLIENTE HA ENVIADO PARA LA COTIZACION
            foreach ($con->query($mensajecvr) as $mensajes) {
                    if($mensajes[1] == 0){
                      //POR CADA MENSAJE SE CREA UN PANEL PARA MOSTRARLO
                      $tablas_div .= "<div class='panel panel-default col-lg-10 col-lg-offset-1'>";
                        $tablas_div .= "<div class='panel-body'>";
                          $tablas_div .= $mensajes[0];
                        $tablas_div .= "</div>";
                      $tablas_div .= "</div>";
                    }
                    //ESTE SE CREA CUANDO ES EL ADMINISTRADOR QUIEN RESPONDE AL MENSAJE
                    else{
                      $tablas_div .= "<div class='panel panel-primary col-lg-10'>";
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
                    $tablas_div .= "<input class='col-lg-12 form-control disabled hide' id='idconver$ids_conver[$f]' value=$ids_conver[$f] autocomplete='off'>"; 
                    $tablas_div .= "<textarea name='' id='mensaje$ids_conver[$f]' rows='4' class='col-lg-12 form-control estira' autocomplete='off'></textarea>";
                    $tablas_div .= "<div class='row'>";
                      $tablas_div .= "<div class='col-lg-12'>";
                        $tablas_div .= "<br>";
                        $tablas_div .= "<button class='btn btn-primary col-lg-5 col-lg-offset-7' onclick='javascipt:enviarmsjp($ids_conver[$f],0)'>Enviar</button>";
                      $tablas_div .= "</div>";
                    $tablas_div .= "</div>";
                  $tablas_div .= "</div>";
                $tablas_div .= "</div>";
                ///HAGO UNA CONSULTA PARA SABER SI HAY ARCHIVOS EN LA CONVERSACION
                $archivosctm = "SELECT COUNT(id_archivo) FROM archivos WHERE id_conversacion=?";
                $stmtar = $con->prepare($archivosctm);
                $stmtar->execute(array($ids_conver[$f]));
                $arcbool = $stmtar->fetch(PDO::FETCH_BOTH);
                ///VEO EL ARCHIVO
                $archivosclm = "SELECT * FROM archivos WHERE id_conversacion=$ids_conver[$f]";
                $tablas_div .= "<div class='col-lg-3'>";
                $tablas_div .= "<div class='panel panel-default'>";
                  $tablas_div .= "<div class='panel-heading'>";
                    $tablas_div .= "<h3 class='text-center h-negro'>ARCHIVOS</h3>";
                  $tablas_div .= "</div>";
                  $tablas_div .= "<div class='panel-body'>";
                  if($arcbool > 0){
                    $tablas_div .= "<ul>";
                    ///SI HAY ARCHIVOS ENTONCES MUESTRO LOS REGISTROS
                    foreach ($con->query($archivosclm) as $listaArchivos) {
                      $tablas_div .= "<li><a href='$listaArchivos[2]'>$listaArchivos[1]</a></li>";
                      $tablas_div .= "<ul class='btn-pds'>";
                      $archivoid = "SELECT id_archivo FROM archivos WHERE id_conversacion=?";
                      $stmtida = $con->prepare($archivoid);
                      $stmtida->execute(array($ids_conver[$f]));
                      $arid = $stmtida->fetch(PDO::FETCH_BOTH);
                        $tablas_div .= "<li><button class='btn btn-default' onclick='javascipt:pedidos($arid[0])'>Agregar a pedidos</button></li>";
                      $tablas_div .= "</ul>";
                    }
                    $tablas_div .= "</ul>";
                  }
                  $tablas_div .= "</div>";
                $tablas_div .= "</div>";
              $tablas_div .= "</div>";
              $tablas_div .= "</div>";
          }
            //SE CREA EL PANEL POR DEFECTO QUE MOSTRAR O DARA LA OPCION DE NUEVOS MENSAJES
            $tablas_div .= "<div id='nuevo' class='tab-pane fade in active'>";
              $tablas_div .= "<div class='col-lg-6'>";
                $tablas_div .= "<div class='col-lg-12'>";
                  $tablas_div .= "<form action='privado/procesos/mensajeria.php' method='post' enctype='multipart/form-data'>";
                  //SE CREA LOS INPUTS NECESARIOS PARA EL USO DE LA MENSAJERIA
                    $tablas_div .= "<input class='col-lg-12 form-control' placeholder='Asunto' name='asunto' autocomplete='off'>";
                    $tablas_div .= "<input class='col-lg-12 form-control hide disabled' name='id_cl' value=$id_cl>";
                    $tablas_div .= "<br>";
                    $tablas_div .= "<br>";
                    $tablas_div .= "<textarea rows='4' name='mensaje' class='col-lg-12 form-control estira' placeholder='Cuerpo del mensaje' autocomplete='off'></textarea>";
                    $tablas_div .= "<div class='col-lg-12'>";
                      $tablas_div .= "<br>";
                      $tablas_div .= "<button class='btn btn-primary col-lg-6 col-lg-offset-6'>Enviar</button>";
                    $tablas_div .= "</div>";
                  $tablas_div .= "</form>";
                $tablas_div .= "</div>";
            $tablas_div .= "</div>";
          $tablas_div .= "</div>";
          print($tablas_div);
        }else{
          //SI NO HAY MENSAJES ENVIADOS POR EL CLIENTE PARA QUE SE MUESTREN, SE CREA EL POR DEFECTO QUE ES EL DE ENVIAR
          $ul_tabs .= "<ul class='nav nav-pills nav-stacked'>";
            $ul_tabs .= "<li class='active'><a data-toggle='tab' href='#nuevo'>Nuevo</a></li>";
          $ul_tabs .= "</ul>";
          $ul_tabs .= "</div>";
          $tablas_div .= "<div class='tab-content'>";
            $tablas_div .= "<div class='col-lg-6'>";
            $tablas_div .= "<div id='nuevo' class='tab-pane fade in active'>";
                $tablas_div .= "<div class='col-lg-12'>";
                  $tablas_div .= "<form action='privado/procesos/mensajeria.php' method='post' enctype='multipart/form-data'>";
                    $tablas_div .= "<input class='col-lg-12 form-control' placeholder='Asunto' name='asunto' autocomplete='off'>";
                    $tablas_div .= "<input class='col-lg-12 form-control hide disabled' name='id_cl' value=$id_cl>";
                    $tablas_div .= "<br>";
                    $tablas_div .= "<br>";
                    $tablas_div .= "<textarea rows='4' name='mensaje' class='col-lg-12 form-control estira' placeholder='Cuerpo del mensaje' autocomplete='off'></textarea>";
                    $tablas_div .= "<div class='col-lg-12'>";
                      $tablas_div .= "<br>";
                      $tablas_div .= "<button class='btn btn-primary col-lg-5 col-lg-offset-4'>Enviar</button>";
                    $tablas_div .= "</div>";
                  $tablas_div .= "</form>";
              $tablas_div .= "</div>";
            $tablas_div .= "</div>";
          $tablas_div .= "</div>";
          print($ul_tabs);
          print($tablas_div);
          $con = null;
        }
      ?>
    </div>
  </div>
	<!--CONTENEDOR DE LA INFORMACION-->
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>
</body>
</html>