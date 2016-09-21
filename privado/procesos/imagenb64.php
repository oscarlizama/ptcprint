<?php
	$imagen_temporal = "";
	$final = "";
	$imagen = $_FILES['file'];
	if ($imagen['type'] == "image/jpeg" || $imagen['type'] == "image/png" || $imagen['type'] == "image/gif" || $imagen['type'] == "image/bmp") {
		if (!empty($imagen['name'])) {
		$imagen_temporal = $imagen['tmp_name'];
		}
		else{
			$imagen_temporal = "../img/default.jpg";
		}
		$fp = fopen($imagen_temporal, 'r+b');
		$data = fread($fp, filesize($imagen_temporal));
		$final = base64_encode($data);
		fclose($fp);
	}
    echo json_encode($final);
?>