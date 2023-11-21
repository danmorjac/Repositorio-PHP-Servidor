<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php

    require_once "../utils/database/set-connection.php";
    require_once "../utils/database/execute-sql.php";

    $tabla = "coches";

    $id = $_GET['id'];

    $sql = "SELECT foto FROM $tabla WHERE id='$id';";

    $conexion = setConnection('concesionario');

    $resultado = executeSQL($conexion, $sql, $tabla);

    $fila = mysqli_fetch_array($resultado);
    $foto = $fila['foto'];
    echo "<img src='$foto' alt='No se puede mostrar la imagen.'style='height:200px; width:200px text-align:center'>";

    mysqli_close($conexion);

    ?>
    <br><br>
    <form action=<?php echo "comprobarEditar.php?id=$_GET[id]" ?> method="POST">
        Nueva Marca:<input type="text" name="marca" required> <br><br>
        Nuevo Modelo:<input type="text" name="modelo"> <br><br>
        Nueva Foto: <input type="text" name="foto"></p>
        <input type="submit" value="Enviar">
    </form>

    <br><br><a href='index.php'>Volver al índice</a>
</body>

</html>