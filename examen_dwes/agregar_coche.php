<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Coche - Concesionario</title>
</head>

<body>
    <h2>Agregar Coche</h2>
    <form action="procesar_agregar_coche.php" method="POST">
        Marca: <input type="text" name="marca" required><br>
        Modelo: <input type="text" name="modelo" required><br>
        Foto (URL): <input type="text" name="foto"><br>
        <input type="submit" value="Agregar Coche">
    </form>
    <br>
    <a href="index.php">Volver a la página de búsqueda</a>
</body>

</html>