<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $foto = $_POST['foto'];

    // Validar y sanitizar los datos según sea necesario

    // Insertar datos en la base de datos
    $tabla = "coches";
    $sql = "INSERT INTO $tabla (marca, modelo, foto) VALUES ('$marca', '$modelo', '$foto');";

    $conexion = setConnection('concesionario');
    $resultado = executeSQL($conexion, $sql, $tabla);

    if ($resultado) {
        echo "Coche agregado exitosamente.<br>";
    } else {
        echo "Error al agregar el coche.<br>";
    }

    mysqli_close($conexion);
} else {
    echo "Error: Acceso no permitido.";
}
?>

<br>
<a href="index.php">Volver a la página de búsqueda</a>