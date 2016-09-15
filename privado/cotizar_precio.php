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
		</div>
		<br><br><br><br>
		<!--espacio para las inputs-->
		<div class="col-lg-6">
			<label for="" class="labels">Visualizar producto</label>
            <select class="form-control" name="producto" id="producto" >
	        	<option value="0" selected="">SELECCIONE EL PRODUCTO</option>
				<?php 
	                $sql = "SELECT p.id_producto id, p.nombre_producto nombre, f.foto_producto FROM productos p, fotos_productos f WHERE p.id_producto = f.id_producto WHERE estado_producto = ?";
	                $stmt = $con->prepare($sql);
	    			$stmt->execute(array(1));
					while ($datos = $stmt->fetch(PDO::FETCH_BOTH))  {
	                    echo "<option value='$datos[0]'>$datos[1]</option>";
	                }
	            ?>
			</select>
			<br>
			<label for="" class="labels">Tiempo de elaboración</label>
            <input type="text" class="form-control input" id="tiempo" autocomplete='off'>
            <br>
            <label for="" class="labels">Equipo utilizado</label>
            <select class="form-control" name="equipo" id="equipo" >
	        	<option value="0" selected="">SELECCIONE EL EQUIPO</option>
				<?php 
	                $sql2 = "SELECT * FROM equipos WHERE estado_equipo=?";
	                $stmt2 = $con->prepare($sql2);
	    			$stmt2->execute(array(1));
					while ($datos2 = $stmt2->fetch(PDO::FETCH_BOTH))  {
	                    echo "<option value='$datos2[0]'>$datos2[1]</option>";
	                }
	            ?>
			</select>
			<br>
			<label for="" class="labels">Actividad Realizada</label>
            <select class="form-control" name="actividad" id="actividad" >
	        	<option value="0" selected="">ELIGA LA ACTIVIDAD</option>
				<?php 
	                $sql3 = "SELECT * FROM mano_obra WHERE estado_obra=?";
	                $stmt3 = $con->prepare($sql3);
	    			$stmt3->execute(array(1));
					while ($datos3 = $stmt3->fetch(PDO::FETCH_BOTH))  {
	                    echo "<option value='$datos3[0]'>$datos3[1]</option>";
	                }
	            ?>
			</select>
		</div>
		<div class="col-lg-6">
			<div class="">
				<center><img src="" alt="Seleccione un producto" class="centro-img"></center>
			</div>
			<br>
			<label for="" class="labels">Precio Base</label>
            <input type="text" class="form-control input" id="PrecioBase" autocomplete='off' data-toggle="tooltip" data-placement="bottom" title="Considerar tinta, costo de materiales, etc.">
		</div>
	</div>
	<br>
	<?php include 'scripts.php';?>
</body>
</html>
