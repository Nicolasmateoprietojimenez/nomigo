<?php

require_once ('../functions/empleado.php');

if(isset($_POST['registro'])) {
    $nro_documento = $_POST['nro_documento']; 
    $idTipoDocumento = $_POST['idTipoDocumento'];
    $fechaExpedicion = $_POST['fechaExpedicion'];
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $nombre3 = $_POST['nombre3'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $idRol = $_POST['idRol']; 
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];

    echo insertarEmpleado($nro_documento, $idTipoDocumento, $fechaExpedicion, $nombre1, $nombre2, $nombre3, $apellido1, $apellido2, $idRol, $correo, $telefono, $estado, $conn);

    $conn->close();
}
?>
