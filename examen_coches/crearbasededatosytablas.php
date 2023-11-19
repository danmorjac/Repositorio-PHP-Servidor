<?php

include("data.php");

$sql_crearbasedatos = "CREATE DATABASE IF NOT EXISTS $basedatos";

$sql_creartabla = "CREATE TABLE IF NOT EXISTS $tabla (";
$sql_creartabla .= "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, ";
$sql_creartabla .= "marca VARCHAR(20) NOT NULL,";
$sql_creartabla .= "modelo VARCHAR(20) NOT NULL,";
$sql_creartabla .= "foto VARBINARY(255) NOT NULL";
$sql_creartabla .= ")";

$sql_insertarregistros = "INSERT INTO $tabla (marca, modelo, foto) VALUES ";
$sql_insertarregistros .= "('Fiat', 'Fiat 500', 'fiat.jpg'),";
$sql_insertarregistros .= "('Kia', 'Kia Niro', 'kia.jpg')";

$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);

if (!$conexion) {
    echo "ERROR: Imposible establecer conexión con el servidor (puede que está desactivado o que no se encuentre en el servidor $servidor).<br>\n";
} else {
    // Successfully connected to the server, try to create the database and then select it to work on it.
    echo "Conexion realizada con el servidor.<br>\n";

    // CREATE DATABASE:
    $resultado = mysqli_query($conexion, $sql_crearbasedatos);

    if (!$resultado) {
        echo "ERROR: " . mysqli_error($conexion) . "<br>\n";
    } else {
        echo "Base de datos $basedatos creada o ya existente.<br>\n";

        // SELECT DATABASE:
        $resultado = mysqli_select_db($conexion, $basedatos);

        if (!$resultado) {
            echo "ERROR: Imposible seleccionar la base de datos $basedatos (puede que no exista o que no se tenga permiso para usarla).<br>\n";
        } else {
            // Successfully selected the database, now try to create the table inside it, along with initial records for testing.
            echo "Base de datos $basedatos seleccionada.<br>\n";

            // CREATE TABLE:
            $resultado = mysqli_query($conexion, $sql_creartabla);

            if (!$resultado) {
                echo "ERROR: " . mysqli_error($conexion) . "<br>\n";
            } else {
                echo "Tabla $tabla creada o ya existente.<br>\n";

                // INSERT RECORDS INTO TABLE:
                $resultado = mysqli_query($conexion, $sql_insertarregistros);

                if (!$resultado) {
                    echo "ERROR: " . mysqli_error($conexion) . "<br>\n";
                } else {
                    echo "Registros iniciales insertados satisfactoriamente en la Tabla $tabla.<br>\n";
                }

                // Before ending, close the connection to the server.
                echo "Cerrando la conexion con el servidor...<br>\n";
                mysqli_close($conexion);
            }
        }
    }

    echo "Fin del programa.<br>\n";
}
?>