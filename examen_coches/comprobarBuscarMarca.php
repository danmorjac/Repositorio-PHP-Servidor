<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-query.php";

if (!isset($_POST['marca'])) {
    echo "Rellena los datos de busqueda.";
    echo "<a href='buscarModelo.php'><--Volver atrás</a>";
} else {

    $tabla = "coches";

    $marca = $_POST['marca'];
    $sql = "SELECT * FROM $tabla WHERE marca='$marca';";

    $conexion = setConnection($concesionario);

    $resultado = executeSQL($tabla, $sql, $tabla);

    $numeroregistros = mysqli_num_rows($resultado);

    echo "Se encontraron $numeroregistros marcas:<br>";


    while ($fila = mysqli_fetch_array($resultado)) {
        $foto = $fila['foto'];
        echo "<hr>\n";
        echo "<b>Id:</b> " . $fila['id'] .
            " <b>Marca:</b> " . $fila['marca'] .

            $id = $fila['id'];

        echo "<br><a href='borrar.php?id=$id'>Borrar</a>";

        echo "<br><a href='editar.php?id=$id'>Editar</a>";

    }

    echo "<br><br><a href='buscarModelo.php'><--Volver atrás</a>";

    echo "<br><br><a href='index.php'>Volver a la página de búsqueda</a>";


    mysqli_close($conexion);

}
?>