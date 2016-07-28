<?php
	///CREO LA VARIABLE FINAL
	$final = "";
	$nombreblb = "";
	$tipo = "";
	$datos = [];
	///$archivo = "../img/slider4.png";
	//OBTENGO EL ARCHIVO QUE EL CLIENTE SUBIRA
	$archivo = $_FILES['file'];
	//VEO QUE NO ESTA VACIO
	if (!empty($archivo['name'])) {
		$nombreblb = $archivo['name'];
		///OBTENGO EL TAMANIO
		$tamanio = $archivo['size'];
		//TENGO EL TIPO DE ARCHIVO
		$tipo = $archivo['type'];
		//CONVERTIR DE BYTES A MB
		$filesize = (($tamanio) * .0009765625) * .0009765625; // bytes to MB
		if($filesize > 0){
			//SACO EL NOMBRE TEMPORAL PARA LA CONVERSION
			$temporal = $archivo['tmp_name'];
			//LO ABRO
			$fp = fopen($temporal, 'r+b');
			//LO LEO
			$data = fread($fp, filesize($temporal));
			//LO CONVIERTO PARA BLOB
			$final = base64_encode($data);
			//CIERRO EL ARCHIVO
			fclose($fp);
		}else{
			//SI ES TAMANIO NO PRMITIO NO SE ENVIARA
			$respuesta = 2;
		}
	}
	array_push($datos, $final);
	array_push($datos, $nombreblb);
	array_push($datos, $tipo);
	//ME REGRESA LOS DATOS
    echo json_encode($datos);
?>