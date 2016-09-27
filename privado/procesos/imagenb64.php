<?php
	set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }
    	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
	});
	$imagen_temporal = "";
	$final = "";
	$imagenarray = array();
	$imagen = $_FILES['file'];
	$errorimg = false;
	if (!empty($imagen['name'])) {
		$imagen_temporal = $imagen['tmp_name'];
		try {
			if (@is_array(getimagesize($imagen_temporal))) {
				$mTipo = exif_imagetype($imagen_temporal);
				if (($mTipo != IMAGETYPE_JPEG) && ($mTipo != IMAGETYPE_PNG)) {
					$errorimg = true;	
				}
			}
			else{
				$imagen_temporal = "../img/default.jpg";
			}
		} catch (Exception $e) {
			$imagen_temporal = "../img/default.jpg";
		}
		if (!$errorimg) {
			$fp = fopen($imagen_temporal, 'r+b');
			$data = fread($fp, filesize($imagen_temporal));
			$final = base64_encode($data);
			fclose($fp);
			$data = getimagesize($imagen_temporal);
			if ($data[0]>800 || $data[0] > 600) {
				array_push($imagenarray, 1);
			}else{
				array_push($imagenarray, 0);
			}
			/*$myfile = fopen($imagen_temporal, "r") or die("Unable to open file!");
			//echo fread($myfile,filesize($imagen_temporal));
			while ($trozo = fgets($imagen_temporal, 1024)){
      			echo $trozo;
   			}
			fclose($myfile);*/
			/*if (file_exists($imagen_temporal)) {
				if (readfile($imagen_temporal)) {
					$fp = fopen($imagen_temporal, 'r+b');
					$data = fread($fp, filesize($imagen_temporal));
					$final = base64_encode($data);
					fclose($fp);
				}
			}*/
		}
	}
	array_push($imagenarray, $final);
    echo json_encode($imagenarray);
?>