<?php
    //$correo=$_POST['correo'];
    //$correo = 'oslizama@gmail.com';
    //require '../privado/procesos/conexion.php';
    require_once '../privado/procesos/pass/PHPMailerAutoload.php';
    function limpiar($texto)
    {
        $textoLimpio = preg_replace('([^A-Za-z0-9])', '', $texto);                          
        return $textoLimpio;
    }
    //echo $correo;
    //SE CREA UNA FUNCION PARA GENERAR UNA CLAVE RANDOM
    $correoB64 = base64_encode($correo);
    $correoHash = limpiar($correoB64);
    //$pass = randomPassword();
    //FUNCION PARA ENCRIPTAR
    //POR DEFECTO VIENE PASSWORD_BCRYPT
    //CON UNA LONGITUD DE 60 CARACTERES
    ///PUEDE SER DEFAULT O EL BCRYPT
    //USA EL ALGORITMO CRPYT_BLOW_FISH
    //$passHash = password_hash($pass, PASSWORD_BCRYPT);
    /*$sql='SELECT id_cliente FROM clientes WHERE correo_cliente=?';
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $con->prepare($sql);
    $stmt->execute(array($correo));
    $con = null;
    $id = $stmt->fetch(PDO::FETCH_NUM);
    $idHash = password_hash($id[0], PASSWORD_BCRYPT);*/
    ///SE CREA UN NUEVO INSTANCIA DE PHPMailer
    $mail = new PHPMailer;
    //LE ASIGNAS EL CHARSET
    $mail->CharSet = 'UTF-8';

    $mail->SMTPDebug = 0;                               // Enable verbose debug output

    //AQUI ASIGNAS QUE VAS A OCUPAR SMTP
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;   
    $mail->Username = 'luxuryandstylesv@gmail.com';                 // SMTP username
    $mail->Password = 'osguillestyle';                        // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('puntoprint@gmail.com', 'PUNTO PRINT SV');
    $mail->addAddress($correo,'');     // Add a recipient
    $mail->Subject = 'Confirmacion de registro';
    $mail->Body    =    '<html>
                            <body>
                                <h3>BIENVENIDO A PUNTO PRINT</h3>
                                <p>Hemos recibido la noticia que te registraste en nuestro sistema. Para confirmarlo por favor sigue el enlace para confirmar tu registro y empezar a utilizar la cuenta.</p>
                                <a href=localhost/verificarcuenta&'.$correoHash.'>Enlace</a>
                                <h4>GRACIAS POR PREFERIRNOS</h4>
                            </body>
                        </html>';
    $mail->AltBody = 'prueba';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                            // Enable SMTP authentication
    //$mail->send()
    //header('Location: ../../index.php');
    //AQUI SE ENVIA
    if (!$mail->send()) {
        echo $mail->ErrorInfo;
    }
    //echo $id[0];
?>