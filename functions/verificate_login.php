<?php

function obtenerEmpleado($nroDocumento, $conn) {
    $nroDocumento = $conn->real_escape_string($nroDocumento);

    $sql = "SELECT * FROM empleado WHERE nroDocumento='$nroDocumento' LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}


function verificarLogeo($nroDocumento, $idTipoDocumento, $contrasena, $conn) {

    $empleado = obtenerEmpleado($nroDocumento, $conn);

    if ($empleado) {
        if ($empleado['idTipoDocumento'] == $idTipoDocumento) {
            if (password_verify($contrasena, $empleado['contrasena'])) {
                if ($empleado['estado'] == 1) {
                    return $empleado['idRol'];
                } else {
                    return "El empleado está inactivo.";
                }
            } else {
                return "La contraseña proporcionada es incorrecta.";
            }
        } else {
            return "El tipo de documento proporcionado no coincide.";
        }
    } else {
        return "No se encontró ningún empleado con el número de documento proporcionado.";
    }
}



function compararToken($nroDocumento, $token, $conexion) {

    $sql = "CALL ObtenerUltimoToken(?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nroDocumento);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $ultimoToken = $fila['UltimoToken'];

        if ($token === $ultimoToken) {
            
            $resultado->free();
            $stmt->close();

            $sqlActivarCuenta = "CALL activarCuenta(?)";
            $stmtActivar = $conexion->prepare($sqlActivarCuenta);
            $stmtActivar->bind_param("s", $nroDocumento);
            if ($stmtActivar->execute()) {
                echo "Cuenta activada correctamente.";
            } else {
                echo "Error al activar la cuenta: " . $stmtActivar->error;
            }
            $stmtActivar->close();
        } else {
            echo "Error: Los tokens no coinciden.";
        }
    } else {
        echo "Error: No se encontró ningún token asociado al número de documento proporcionado.";
    }
}
?>

