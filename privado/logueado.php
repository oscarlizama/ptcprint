<?php 
   echo "holaaa";
   $id_cl = 0;
   $nombre = "INICIAR";
   if(!empty($_SESSION['autenticado'])){       
      $nombre = $_SESSION['autenticado'];
      require 'conexion.php';
      $sql = "SELECT * FROM clientes WHERE correo_cliente=?";
      $correo = $_SESSION['email'];
      $stmt = $con->prepare($sql);
      $stmt->execute(array($correo));
      $nomb = $stmt->fetch(PDO::FETCH_BOTH);
      $nombre = $nomb[1];
      $id_cl = $nomb[0];
      //$con = null;
   }
   else{
      $nombre = "INICIAR";
   }
   echo $nombre;
?>