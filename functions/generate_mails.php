<?php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarToken($nombre, $apellido, $correo, $token) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nomigo339@gmail.com';
    $mail->Password = 'cynijisdvrsgmkor';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    try {
        $mail->setFrom('tu_correo@gmail.com', 'Token de verificación');
        $mail->addAddress($correo);
        $mail->isHTML(true);
        $mail->Subject = 'Bienvenido a la familia NomiGo!';
        $mail->Body = "Gracias por preferirnos, para acceder a este maravilloso mundo de nomina interactiva veriffica tu cuenta.<br><br>";
        $mail->Body .= "Hola $nombre $apellido <br><br>";
        $mail->Body .= "Tu token de verificación es : <br><br> $token  <br><br>";
        $mail->Body .= "<a href='http://localhost/nomigo/public/verificar_token.php'> Copie y pegue el token aqui</a>";

        $mail->send();
        return 'El mensaje se envió correctamente.';
    } catch (Exception $e) {
        return "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>