<?php
include("clases/conect.php");
$mensaje = $_POST['mensaje'];
$tipo = $_POST['tipo'];

$timestamp = date("Y-m-d H:i:s");

//$q = "INSERT INTO mensajes values ('','$mensaje','$timestamp','1','$tipo')";
$sql = "INSERT INTO mensajes values ('','$mensaje','$timestamp','1','$tipo');";
$stmt = $con->prepare($sql);
$stmt->execute(array());
?>