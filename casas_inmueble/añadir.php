<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir vivienda</title>
</head>
<body>
    <form action="comprobarAñadir.php" method="POST">
        Tipo:<input type="text" name="tipo" required> <br><br>
        Descripcion:<input type="text" name="descripcion"> <br><br>
        Direccion: <input type="text" name="direccion"> <br><br>
        Venta <input type="radio" name="VentaAlquiler" id="venta" value="venta"> <br>
        Alquiler <input type="radio" name="VentaAlquiler" id="alquiler" value="alquiler"> <br><br>
        Precio de venta: <input type="text" name="precioVenta"  value="No" required></p>
        Precio de alquiler: <input type="text" name="precioAlquiler" value="No" required></p>
        Caracteristicas: <input type="text" name="caracteristicas"></p>
        Foto: <input type="text" name="foto"></p>
        <input type="submit" value="Enviar">
    </form>
    <br><br><a href='index.php'>Volver al índice</a>
</body>
</html>