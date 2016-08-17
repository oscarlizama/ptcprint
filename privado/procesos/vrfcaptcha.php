<?php
    /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Creamos el enlace para solicitar la verificación con la API de Google.
    $params = array();  // Array donde almacenar los parámetros de la petición
    $params['secret'] = '6LeVzScTAAAAAMM7wQXkF1iRCL32wq_aw_QK2DJ-'; // Clave privada
    if (!empty($_POST) && isset($_POST['g-recaptcha-response'])) {
    $params['response'] = urlencode($_POST['g-recaptcha-response']);
    }
    $params['remoteip'] = $_SERVER['REMOTE_ADDR'];
    
    // Generar una cadena de consulta codificada estilo URL
    $params_string = http_build_query($params);
    // Creamos la URL para la petición
    $requestURL = 'https://www.google.com/recaptcha/api/siteverify?' . $params_string;
    
    // Inicia sesión cURL
    $curl = curl_init(); 
    // Establece las opciones para la transferencia cURL
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $requestURL,
    ));
    
    // Enviamos la solicitud y obtenemos la respuesta en formato json
    $response = curl_exec($curl);
    // Cerramos la solicitud para liberar recursos
    curl_close($curl);
    // Devuelve la respuesta en formato JSON
    echo $response;
    }*/
    require_once "recaptchalib.php";
    // tu clave secreta
    $secret = "6LeVzScTAAAAAMM7wQXkF1iRCL32wq_aw_QK2DJ-";
     
    // respuesta vacía
    $response = null;
     
    $respuestav = "malo";

    // comprueba la clave secreta
    $reCaptcha = new ReCaptcha($secret);
    // si se detecta la respuesta como enviada
    if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }if ($response != null && $response->success) {
        $respuestav = "bueno";
        //echo json_encode($respuestav);
        //var_dump("ESTA BIEN");
      } else {
        //echo json_encode("HOLAAAA");
        //var_dump("ESTA MAL");
      }
      exit($respuestav);
?>