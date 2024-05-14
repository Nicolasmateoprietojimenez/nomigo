<?php

require_once '../functions/verificate_login.php';
require_once '../functions/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_cedula = $_POST['numero_cedula'];
    $token = $_POST['token'];

    compararToken($numero_cedula, $token, $conn);

}
?>
