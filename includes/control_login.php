<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["idTipoDocumento"]) && isset($_POST["nro_documento"]) && isset($_POST["contrasena"])) {
        $idTipoDocumento = $_POST["idTipoDocumento"];
        $nroDocumento = $_POST["nro_documento"];
        $contrasena = $_POST["contrasena"];

        require_once '../functions/conexion.php';
        require_once '../functions/verificate_login.php';

        $idRol = verificarLogeo($nroDocumento, $idTipoDocumento, $contrasena, $conn);

        if (is_numeric($idRol)) {

            $_SESSION['idRol'] = $idRol;
            $_SESSION['nroDocumento'] = $nroDocumento;

            switch ($idRol) {
                case 1:
                    header("Location: ../public/admin/main_admin.php");
                    exit();
                    break;
                case 2:
                    header("Location: ../public/operador/operador_admin.php");
                    exit();
                    break;
                default:
                    echo "Error: Rol no reconocido.";
            }
        } else {
            echo "Error: $idRol";
        }

        $conn->close();
    } else {
        echo "Error: No se recibieron todos los parámetros del formulario.";
    }
} else {
    echo "Error: El formulario no ha sido enviado.";
}
?>
