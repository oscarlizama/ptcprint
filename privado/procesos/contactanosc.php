<?php  
    require_once 'pass/PHPMailerAutoload.php';
    $asunto = $_POST['asunto'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $apellidos = $_POST['apellido'];
    $nombre = $_POST['nombre'];

    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';

    $mail->SMTPDebug = 0;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;   
    $mail->Username = 'oslizama@gmail.com';                 // SMTP username
    $mail->Password = 'omca1588.*';                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('oslizama@gmail.com', 'PUNTO PRINT');
    $mail->addAddress('oslizama@gmail.com','');     // Add a recipient
    $mail->Subject = $asunto;
    $mail->Body    = 'Tienes un nuevo correo de '.$correo .' Nombre: '.$nombre .' Apellido: '.$apellidos .' '.$mensaje;
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
        header('Location: ../../inicio');
    }
?>