<?php 
   $id_cl = 0;
   $nombre = "Iniciar sesión";
   //session_start();
   if(!empty($_SESSION['autenticado'])){       
      $nombre = $_SESSION['autenticado'];
      require '../privado/procesos/conexion.php';
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
      $nombre = "Iniciar sesión";
   }
?>