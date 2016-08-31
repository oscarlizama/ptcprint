<?php
    //$correo=$_POST['correo'];
    //$correo = 'oslizama@hotmail.com';
    //require '../conexion.php';
    require_once 'PHPMailerAutoload.php';
    //echo $correo;
    //SE CREA UNA FUNCION PARA GENERAR UNA CLAVE RANDOM
    function randomPassword() {
	   $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //DECLARAMOS PASS COMO ARRAY
        $alphaLength = strlen($alphabet) - 1; //DETERMINA LA LONGITUD DEL ALFABETO
        //AQUI SE CREA UN FOR PARA LA CLAVE RANDOM
        for ($i = 0; $i < 8; $i++) {
            //OCUPO LA FUNCION rand
            //ESCOGE UN NUMERO DESDE 0 HASTA LA LONGITUD DEL ALFABETO
    	   $n = rand(0, $alphaLength);
           //Y ESO LO VA AÑADIENDO AL ARREGLO DE LAS PASS
    	   $pass[] = $alphabet[$n];
        }
        return implode($pass); //RETORNA EL ARRGLO COMO UN STRING
    }
    $pass = randomPassword();
    //FUNCION PARA ENCRIPTAR
    //POR DEFECTO VIENE PASSWORD_BCRYPT
    //CON UNA LONGITUD DE 60 CARACTERES
    ///PUEDE SER DEFAULT O EL BCRYPT
    //USA EL ALGORITMO CRPYT_BLOW_FISH
    $passHash = password_hash($pass, PASSWORD_BCRYPT);
    $sql='update clientes set clave_cliente=? where correo_cliente=?';
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare($sql);
    $stmt->execute(array($passHash, $correo));
    $con = null;

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
    $mail->Subject = 'Recuperar Clave';
    $mail->Body    = 'Tu nueva contraseña es '.$pass;
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
    } else {
        header('Location: iniciarsesion');
    }

?>