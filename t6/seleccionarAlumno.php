<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Borrar Alumno</title>
</head>

<body>
    <h1>Editar alumno</h1>
    <?php
        $idAlumno = $_POST["idAlumno"];
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "institut";
        
        $conector = mysqli_connect($host, $user, $password, $dbname);
        $query =  "SELECT * FROM alumne WHERE id_alumne = '$idAlumno'";

        if (!$conector) {
            echo "No pudo conectarse a la BD: ".$dbname;
        } else {
            $resultado = mysqli_query($conector, $query);
            echo "<form action='editarAlumno.php' method='POST'>";
            $fila = $resultado->fetch_row();
            echo "id_Alumno: <input type='number' name='idAlumno' value='".$fila[0]."' readonly><br />";
            echo "Nombre: <input type='text' name='nombre' value='".$fila[1]."'><br />";
            echo "Dirección: <input type='text' name='direccion' value='".$fila[2]."'><br />";
            echo "Grupo: <input type='text' name='grupo' value='".$fila[3]."'><br />";
            echo "<input type='submit' value='enviar'>";
            echo "</form>";
        }
    ?>
    <br />
    <a href="editarAlumno.html">Volver</a>
    <br />
    <a href="tabla.php">Ver tabla</a>
</body>

</html>