<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Token</title>
</head>
<body>
    <h2>Verificar Token</h2>
    <form action="../includes/procesar_verificacion.php" method="POST">
        <div>
            <label for="numero_cedula">Número de Cédula:</label>
            <input type="text" id="numero_cedula" name="numero_cedula" required>
        </div>
        <div>
            <label for="token">Token de Verificación:</label>
            <input type="text" id="token" name="token" required>
        </div>
        <button type="submit">Activa tu cuenta</button>
    </form>
</body>
</html>
