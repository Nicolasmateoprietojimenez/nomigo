<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="../includes/control_login.php" method="post">
        <label for="tipo_documento">Tipo de documento:</label><br>
        <div class="idTipoDocumento">
                    <label for="idTipoDocumento">Tipo de Documento</label>
                    <select name="idTipoDocumento" id="idTipoDocumento">
                        <?php

                        require_once '../functions/conexion.php';
                        require_once '../functions/create_admin.php';

                        $tiposDocumento = obtenerTiposDocumento($conn);
                        foreach ($tiposDocumento as $id => $desc) {
                            echo "<option value='$id'>$desc</option>";
                        }
                        ?>
                    </select>
                </div>
        <label for="nro_documento">Número de documento:</label><br>
        <input type="text" id="nro_documento" name="nro_documento"><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena"><br><br>
        <input type="submit" value="Ingresar">
    </form>
    <p>¿Olvidaste tu contraseña? <a href="recuperar_contraseña.php">Recupérala aquí</a></p>
    <p>¿No tienes una cuenta? <a href="crear_cuenta.php">Crea una aquí</a></p>
</body>
</html>
