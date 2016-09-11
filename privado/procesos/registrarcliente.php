<?php
    function agregarCliente($valores){
        $passHash = password_hash($valores[3],PASSWORD_BCRYPT);
        require_once 'conexion.php';
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //CONSTRUYO LA CONSULTA EN BASE AL FORMATO QUE LES DI EN EL FOREACH
        $sql = "INSERT INTO clientes(nombre_cliente,apellido_cliente,correo_cliente,clave_cliente,estado_cliente) VALUES (?,?,?,?,?);";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($valores[0],$valores[1],$valores[2],$passHash,0));
        //LIMPIO LA CONSULTA Y CIERRO LA CONXION
        $sql = null;
        $con = null;
        exit("success");
    }
?>