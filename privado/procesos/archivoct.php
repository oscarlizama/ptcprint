<?php
	///CREO LA VARIABLE FINAL
	$final = "";
	$nombreblb = "";
	$tipo = "";
	$datos = [];
	//$archivo = "../img/slider4.png";
	//OBTENGO EL ARCHIVO QUE EL CLIENTE SUBIRA
	$archivo = $_FILES['file'];
	$respuesta = 0;
	//$archivo = "../img/default.jpg";
	//VEO QUE NO ESTA VACIO
	if (!empty($archivo['name'])) {
		$nombreblb = $archivo['name'];
		///OBTENGO EL TAMANIO
		$tamanio = $archivo['size'];
		//TENGO EL TIPO DE ARCHIVO
		$tipo = $archivo['type'];
		if ($tipo == "application/pdf" || $tipo == "image/gif" || $tipo == "image/png" || $tipo == "image/jpeg") {
			//CONVERTIR DE BYTES A MB
			$filesize = (($tamanio) * .0009765625) * .0009765625; // bytes to MB
			if($filesize > 0){
				//SACO EL NOMBRE TEMPORAL PARA LA CONVERSION
				$temporal = $archivo['tmp_name'];
				if (file_exists($temporal)) {
					$fp = fopen($temporal, "r");
					fseek($fp, 0);
					$dat = fread($fp, 5);
					if (strcmp($dat, "%PDF-")==0 || strcmp($dat, "%PNG-")==0 || @exif_imagetype($temporal) || @is_array(getimagesize($temporal))) {
						$data = fread($fp, filesize($temporal));
						$final = base64_encode($data);
						//CIERRO EL ARCHIVO
						fclose($fp);
					}else{
						$respuesta = 2;
					}
				}
				//LO ABRO
				//$fp = fopen($temporal, 'r+b');
				//LO LEO
				//$data = fread($fp, filesize($temporal));
				//LO CONVIERTO PARA BLOB
				//$final = base64_encode($data);
				//CIERRO EL ARCHIVO
				//fclose($fp);
			}else{
				//SI ES TAMANIO NO PRMITIO NO SE ENVIARA
				$respuesta = 2;
			}
		}else{
			$respuesta = 2;
		}
	}else{
		$respuesta = 2;
	}
	array_push($datos, $final);
	array_push($datos, $nombreblb);
	array_push($datos, $tipo);
	array_push($datos, $respuesta);
	//ME REGRESA LOS DATOS
    echo json_encode($datos);
?>