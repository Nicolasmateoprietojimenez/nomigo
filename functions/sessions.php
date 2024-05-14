<?php
session_start();

function verificarAcceso($rolPermitido = null) {

    if (!isset($_SESSION['idRol']) || !isset($_SESSION['nroDocumento'])) {
        header("Location: login.php");
        exit();
    }

    if ($rolPermitido !== null && $_SESSION['idRol'] != $rolPermitido) {
        header("Location: ../../other/restricted_page.html");
        exit();
    }
}

function cerrarSesion() {
    session_unset();

    session_destroy();
    header("Location: ../public/login.php");
    exit();
}
?>
