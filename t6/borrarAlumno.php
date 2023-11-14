<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Borrar Alumno</title>
</head>

<body>
    <h1>Borrar alumno</h1>
    <?php
        $idAlumno = $_POST["idAlumno"];
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "institut";
        
        $conector = mysqli_connect($host, $user, $password, $dbname);
        $query =  "DELETE FROM alumne WHERE id_alumne = '$idAlumno'";

        mysqli_query($conector, $query);
        if (mysqli_affected_rows($conector) > 0) {
            echo "Alumno $idAlumno borrado";
        } else {
            echo "Fallo al borrar alumno".$idAlumno.", por favor introduce ID valido";
        }

        /*if (!empty("$idAlumno")) {
            mysqli_query($conector, $query);
            echo "Alumno $idAlumno borrado";
        } else {
            echo "Fallo, por favor introduce ID del alumno";
        }*/
    ?>
    <br />
    <a href="borrarAlumno.html">Volver</a>
    <br />
    <a href="tabla.php">Ver tabla</a>
</body>

</html>