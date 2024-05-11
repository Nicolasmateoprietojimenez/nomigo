<?php

require_once 'conexion.php';
function insertarEmpleado($nro_documento, $idTipoDocumento, $fechaExpedicion, $nombre1, $nombre2, $nombre3, $apellido1, $apellido2, $idRol, $correo, $telefono, $estado, $conn) {
    $sql = "INSERT INTO empleado (nroDocumento, idTipoDocumento, fechaExpedicion, nombre1, nombre2, nombre3, apellido1, apellido2, idRol, correo, telefono, estado)
            VALUES ('$nro_documento', '$idTipoDocumento', '$fechaExpedicion', '$nombre1', '$nombre2', '$nombre3', '$apellido1', '$apellido2', '$idRol', '$correo', '$telefono', '$estado')";

    if ($conn->query($sql) === TRUE) {
        return "Registro exitoso";
    } else {
        return "Error al registrar el empleado: " . $conn->error;
    }
}
?>
