<?php

include '../functions/conexion.php';
include '../functions/create_admin.php';

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
    $contrasena = $_POST['contrasena'];


    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $resultado_creacion = crearAdministrador($nro_documento, $idTipoDocumento, $fechaExpedicion, $nombre1, $nombre2, $nombre3, $apellido1, $apellido2, $idRol, $correo, $telefono, $estado, $contrasena_encriptada, $conn);

    if(strpos($resultado_creacion, "Error") === false) {

        echo '<script>alert("Se ha enviado un token de verificación al correo.");';
        echo 'window.location.href = "../public/form_create_emple.php";</script>';
    } else {
        echo $resultado_creacion;
    }
}

?>
