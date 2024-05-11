<?php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Cambia esto si usas otro servidor SMTP aqui se esta usando los servidores SMTP otorgados por GMAIL
$mail->SMTPAuth = true;
$mail->Username = 'nomigo339@gmail.com';
$mail->Password = 'cynijisdvrsgmkor ';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$opinion = $_POST['opinion'];

try {
    $mail->setFrom('nomigo339@gmail.com', 'Hijueputa');
    $mail->addAddress($correo);
    $mail->isHTML(true);
    $mail->Subject = 'Opinión recibida';
    $mail->Body = "Nombre: $nombre <br> Correo: $correo <br> Opinión: $opinion";

    $mail->send();
    echo 'El mensaje se envió correctamente.';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}
?>
