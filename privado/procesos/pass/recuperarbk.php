<?php
    $correo=$_POST['correo'];
    //$correo = 'oslizama@hotmail.com';
    require '../conexion.php';
    require_once 'PHPMailerAutoload.php';
    //require_once 'password.php';
    //echo $correo;
    function randomPassword() {
	   $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
    	   $n = rand(0, $alphaLength);
    	   $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    $pass = randomPassword();
    $passHash = password_hash($pass, PASSWORD_BCRYPT);
    $sql='update usuarios set clave_usuario=? where correo_usuario=?';
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare($sql);
    $stmt->execute(array($passHash, $correo));
    $con = null;

    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';

    $mail->SMTPDebug = 0;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;   
    $mail->Username = 'luxuryandstylesv@gmail.com';                 // SMTP username
    $mail->Password = 'osguillestyle';                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('puntoprintsv@gmail.com', 'PUNTO PRINT SV');
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
    if (!$mail->send()) {
        echo $mail->ErrorInfo;
    } else {
        header('Location: ../private.php');
    }

?>