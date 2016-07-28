<html>
	<head>
        <title>MI CUENTA | Punto Print</title>
		<?php include 'links.php' ?>
	</head>
	<body>
		<?php include 'menu.php' ?>
        <?php 
        $valores = "";
        $nombrec = "";
        $apellidoc = "";
        $clavec = "";
        require '../privado/procesos/conexion.php';
        $sql = "SELECT * FROM clientes WHERE correo_cliente=?";
        $correo = $_SESSION['email'];
        $stmt = $con->prepare($sql);
        $stmt->execute(array($correo));
        $resultado = $stmt->fetch(PDO::FETCH_BOTH);
        $con = null;
    ?>
    <div>
        <br>
        <div class="container-fluid div_conteni">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">CONFIGURACIÓN</a></li>
                <li><a data-toggle="tab" href="#menu1">MIS COMENTARIOS</a></li>
                <li><a data-toggle="tab" href="#menu2">MIS FAVORITOS</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="frm-u">
                        <p id="id_reg" class="hide"><?php echo($id_cl) ?></p>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label for="" class="labels">Nombres:</label>
                                    <input type="text" class="form-control input" id="nombre" value="<?php echo $resultado[1];?>">
                                    <br>
                                    <label for="" class="labels">Contraseña:</label>
                                    <div class="uk-form-icon uk-width-1-1">
                                        <i class="uk-icon-key"></i>
                                        <input class="form-control input" type="password" placeholder="Contraseña" id="clave" value="<?php echo $resultado[4];?>">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label for="" class="labels">Apellidos:</label>
                                    <input type="text" class="form-control input" id="apellidos" value="<?php echo $resultado[2];?>">
                                    <br>
                                    <label for="" class="labels">Confirmar contraseña:</label>
                                    <div class="uk-form-icon uk-width-1-1">
                                        <i class="uk-icon-check"></i>
                                        <input class="form-control omitir" type="password" placeholder="Contraseña" id="clave" value="<?php echo $resultado[4];?>">
                                  </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-8 col-xs-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
                                    <br>
                                    <br>
                                    <button class="btn btn-info btn-large pull-left col-lg-6 col-md-6 col-sm-12 col-xs-12 omitir" onclick="javascript:valores(1)">ACTUALIZAR</button>
                                    <button class="btn btn-danger btn-large pull-right col-lg-5 col-md-5 col-sm-12 col-xs-12 omitir">CERRA MI CUENTA</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="frm">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php 
                                    $panelc = "<div class='panel panel-default'>";
                                        $panelc .= "<div class='panel-body'>";
                                            require '../privado/procesos/conexion.php';
                                            $comprobar = "SELECT COUNT(id_comentario) AS coment FROM comentarios WHERE id_cliente=?";
                                            $stmt = $con->prepare($comprobar);
                                            $stmt->execute(array($resultado[0]));
                                            $coment = $stmt->fetch(PDO::FETCH_BOTH);
                                            if($coment[0] > 0){
                                                $sql = "SELECT c.id_comentario,p.nombre_producto,c.comentario FROM comentarios c, productos p WHERE c.id_cliente=$resultado[0]";
                                                foreach ($con->query($sql) as $datos) {
                                                    $panelc .= "<label for='' class='labels'>Producto:</label>";
                                                    $panelc .= "<textarea type='text' class='form-control input' id='nombre'>$datos[1]</textarea>";
                                                }   
                                            }
                                            else{
                                                $panelc .= "<h4>NO HAY COMENTARIOS QUE MOSTRAR</h4>";
                                            }
                                        $panelc .= "</div>";
                                    $panelc .= "</div>";
                                    print($panelc);
                                    $con = null;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <?php include 'scripts.php' ?>
</body>
</html>