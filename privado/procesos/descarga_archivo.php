<?php 
	require 'conexion.php';
	//$id = $_POST['id'];
	//$id = 8;
	$id = $_GET['id'];
	$archivodw = "SELECT tipo_archivo,archivo,nombre_archivo FROM archivos WHERE id_archivo=?";
    $stmtdw = $con->prepare($archivodw);
    $stmtdw->execute(array($id));
    $dwl = $stmtdw->fetch(PDO::FETCH_BOTH);
    header("Content-type: $dwl[0]");
    //echo "Content-type: $dwl[0]";
    header("Content-Disposition: attachment; filename='$dwl[2]'");
    echo base64_decode($dwl[1]);
?>