<?php
	$imagen_temporal = "";
	$final = "";
	$imagen = $_FILES['file'];
	$errorimg = false;
	if ($imagen['type'] == "image/jpeg" || $imagen['type'] == "image/png" || $imagen['type'] == "image/gif" || $imagen['type'] == "image/bmp") {
		if (!empty($imagen['name'])) {
			$imagen_temporal = $imagen['tmp_name'];
			$mTipo = exif_imagetype($imagen_temporal);
			if ($mTipo != IMAGETYPE_JPEG) && ($mTipo != IMAGETYPE_PNG)) {
				$errorimg = true;
			}
		}
		else{
			$imagen_temporal = "../img/default.jpg";
		}
		if (!$errorimg) {
			$fp = fopen($imagen_temporal, 'r+b');
			$data = fread($fp, filesize($imagen_temporal));
			$final = base64_encode($data);
			fclose($fp);
		}
	}
    echo json_encode($final);
?>