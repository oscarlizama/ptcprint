<?php 
include("clases/conect.php");
$res1 = $sql=("SELECT * FROM mensajes WHERE tipo = '1' ");
$stmt = $con->prepare($sql);
$stmt->execute(array());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/fancywebsocket.js"></script>
</head>

<body>
<div >Martin<br />
<div id="1"><?php while($arr = $stmt->fetch(PDO::FETCH_BOTH)){ echo $arr['timestamp']." : ".$arr['mensaje']."<br>";}?></div></div>

</body>
</html>