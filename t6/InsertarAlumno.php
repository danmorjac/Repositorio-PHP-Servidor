<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Insertar Alumno</h1>
    <?php
    $idAlumno = $_POST["idAlumno"];
    $nombre =  "\"".$_POST["nombre"]."\"";
    $direccion =  "\"".$_POST["direccion"]."\"";
    $grupo =  $_POST["grupo"];

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "institut";

    $query =  "INSERT INTO alumne(id_alumne, nom, adre, grup) VALUES ($idAlumno,$nombre,$direccion,$grupo)";

    $conector = mysqli_connect($host, $user, $password, $dbname);
    if ($conector->query($query) === TRUE) {
        echo "Alumno insertado";
      } else {
        echo "Fallo, datos incorrecto";
      }
    ?>
    <br />
    <a href="InsertarAlumno.html">Volver</a>
    <br />
    <a href="tabla.php">Ver tabla</a>
</body>
</html>