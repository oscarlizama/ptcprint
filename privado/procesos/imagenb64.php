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
	//$imagen = $_FILES['file'];
	$errorimg = false;
	if (true) {
		try {
			if (!empty($imagen['name'])) {
				$imagen_temporal = $imagen['tmp_name'];
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
    echo json_encode($final);
?>