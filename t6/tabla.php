<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Consulta a un base de datos en ASP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Ejempo de Consulta a una base de datos en ASP</h1>
    <table border="1px">
        <tr>
            <td>IdAlumno</td>
            <td>Nombre</td>
            <td>Dirección</td>
            <td>Grupo</td>
            <td></td>
            <td></td>
        </tr>
        <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "institut";

            $conector = mysqli_connect($host, $user, $password, $dbname);
            if (!$conector) {
                echo "No pudo conectarse a la BD: ".$dbname;
            } else {
                $resultado = $conector -> query("select * from alumne");
                if (!$resultado) {
                    echo "¡No existe el alumno!";
                } else {
                    while ($fila = $resultado->fetch_row()) {
                        echo "<tr><td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td>
                        <td><form action='borrarAlumno.php' method='POST'>
                            <input type='hidden' name='idAlumno' value='$fila[0]'>
                            <input type='submit' value='borrar'>
                            </form></td>
                        <td><form action='seleccionarAlumno.php' method='POST'>
                            <input type='hidden' name='idAlumno' value='$fila[0]'>
                            <input type='submit' value='editar'>
                        </form></td></tr>";
                    }
                }
            }
        ?>
    </table>
    <hr />
    <a href="InsertarAlumno.html">Insertar un alumno</a>
    <br />
    <a href="borrarAlumno.html">Borrar un alumno</a>
    <br />
    <a href="editarAlumno.html">Editar un alumno</a>
</body>
</html>