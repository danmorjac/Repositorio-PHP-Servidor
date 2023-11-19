<?php

//Incluimos la cabecera.
$brevedescripcion="Busqueda por Venta o Alquiler";
$indicaciones="Indica si es Venta o Alquiler";
include("cabecera.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda Venta/Alquiler - Inmobiliaria</title>
</head>
<body>
    <form action="comprobarBuscarVentaAlquiler.php" method="POST">
        Venta <input type="radio" name="Venta_Alquiler" id="venta" value="venta" checked> <br>
        Alquiler <input type="radio" name="Venta_Alquiler" id="alquiler" value="alquiler"> <br><br>
        <input type="submit" value="Buscar">
    </form>

    <br><br><a href='index.php'><-- Volver al índice</a>
</body>
</html>