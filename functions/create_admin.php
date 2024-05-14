    <?php

    


    function generarTokenSeguro() {
        return bin2hex(random_bytes(32/ 2));
    }

    function crearAdministrador($nro_documento, $idTipoDocumento, $fechaExpedicion, $nombre1, $nombre2, $nombre3, $apellido1, $apellido2, $idRol, $correo, $telefono, $estado, $contrasena, $conn) {
        $token = generarTokenSeguro();
    
        $resultado_insercion_empleado = insertarEmpleado($nro_documento, $idTipoDocumento, $fechaExpedicion, $nombre1, $nombre2, $nombre3, $apellido1, $apellido2, $idRol, $correo, $telefono, $estado, $contrasena, $conn);
        if (strpos($resultado_insercion_empleado, "Error") !== false) {
            return $resultado_insercion_empleado;
        }
    
        $resultado_insercion_token = insertarTokenVerificacion($token,$nro_documento, $conn);
        if (strpos($resultado_insercion_token, "Error") !== false) {
            return $resultado_insercion_token; 
        }
        include '../functions/generate_mails.php';

        $resultado_envio_token = enviarToken($nombre1, $apellido1, $correo, $token); // Faltaba un punto y coma al final de esta línea
        
        if (strpos($resultado_envio_token, "Error") !== false) {
            return $resultado_envio_token; 
        }

    
    }
    
    function insertarEmpleado($nro_documento, $idTipoDocumento, $fechaExpedicion, $nombre1, $nombre2, $nombre3, $apellido1, $apellido2, $idRol, $correo, $telefono, $estado, $contrasena, $conn) {
        $sql = "INSERT INTO empleado (nroDocumento, idTipoDocumento, fechaExpedicion, nombre1, nombre2, nombre3, apellido1, apellido2, idRol, correo, telefono, estado, contrasena)
                VALUES ('$nro_documento', '$idTipoDocumento', '$fechaExpedicion', '$nombre1', '$nombre2', '$nombre3', '$apellido1', '$apellido2', '$idRol', '$correo', '$telefono', '$estado', '$contrasena')";
        if ($conn->query($sql) === TRUE) {
            return "Empleado registrado correctamente.";
        } else {
            return "Error al registrar el empleado: " . $conn->error;
        }
    }
    
    function insertarTokenVerificacion($token, $nro_documento, $conn) {
        $fechaCreacion = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tokenverificacion (token, nroDocumento, fechaCreacion) VALUES ('$token', '$nro_documento', '$fechaCreacion')";
        if ($conn->query($sql) === TRUE) {
            return "Token de verificación generado correctamente.";

        } else {
            return "Error al generar el token de verificación: " . $conn->error;
        }
    }
    
    
    function obtenerTiposDocumento($conn) {
        $tiposDocumento = array();
        $query = "SELECT idTipoDocumento, descTipoDocumento FROM tipodocumento";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $tiposDocumento[$row['idTipoDocumento']] = $row['descTipoDocumento'];
        }
        return $tiposDocumento;
    }

    ?>

