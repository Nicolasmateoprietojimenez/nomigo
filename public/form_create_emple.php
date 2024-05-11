<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <div class="container">
        <form action="../includes/control_registrar_usu.php" method="POST" class="formulario">
            <h2 class="titulo">REGISTRAR</h2>
            <div class="padre">
                <div class="nroDocumento">
                    <label for="nro_documento">Nro Documento</label>
                    <input type="text" name="nro_documento">
                </div>
                
                <div class="idTipoDocumento">
                    <label for="idTipoDocumento">Tipo de Documento</label>
                    <select name="idTipoDocumento" id="idTipoDocumento">
                        <option value="1">Cédula de ciudadanía</option>
                        <option value="2">Cédula de extranjería</option>
                        <option value="3">Pasaporte</option>
                        <option value="4">Registro Civil</option>
                    </select>
                </div>
                
                <div class="fechaExpedicion">
                    <label for="fechaExpedicion">Fecha de Expedicion</label>
                    <input type="date" name="fechaExpedicion">
                </div>

                <div class="nombre1">
                    <label for="nombre1">Primer Nombre</label>
                    <input type="text" name="nombre1">
                </div>

                <div class="nombre2">
                    <label for="nombre2">Segundo Nombre</label>
                    <input type="text" name="nombre2">
                </div>

                <div class="nombre3">
                    <label for="nombre3">Tercer Nombre</label>
                    <input type="text" name="nombre3">
                </div>

                <div class="apellido1">
                    <label for="apellido1">Primer Apellido</label>
                    <input type="text" name="apellido1">
                </div>

                <div class="apellido2">
                    <label for="apellido2">Segundo Apellido</label>
                    <input type="text" name="apellido2">
                </div>

                <div class="idRol">
                    <label for="idRol">Rol</label>
                    <select name="idRol" id="idRol">
                        <option value="1">Administrador</option>
                        <option value="2">Lector</option>
                    </select>
                </div>

                <div class="correo">
                    <label for="correo">Correo Electronico</label>
                    <input type="email" name="correo">
                </div>

                <div class="telefono">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono">
                </div>

                <div class="estado">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                
                <div class="cuenta">
                    <input class="boton" type="submit" value="Registrar" name="registro">
                    <a href="">Salir</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>