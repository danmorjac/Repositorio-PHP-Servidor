<?php

//Incluimos la cabecera.
$brevedescripcion="Comprobación añadir";
$indicaciones="Comprobación de los datos recibidos";
include("cabecera.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir - Inmobiliaria</title>
</head>
<body>
<?php

    $tipo=$_POST['tipo'];
    $descripcion=$_POST['descripcion'];
    $direccion=$_POST['direccion'];
    $Venta_Alquiler=$_POST['VentaAlquiler'];
    $precio_venta=$_POST['precioVenta'];
    $precio_alquiler=$_POST['precioAlquiler'];
    $caracteristicas=$_POST['caracteristicas'];
    $foto=$_POST['foto'];

    include("datos.php");

    $sql = "INSERT INTO $tabla VALUES ";
    $sql .= "(null, '$tipo', '$descripcion', '$direccion', '$Venta_Alquiler', '$precio_venta', '$precio_alquiler','$caracteristicas','$foto');";


    $conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
    if (! $conexion){
            echo "ERROR: Imposible establecer conexión con el servidor $servidor.<br>\n";
    } else {

        $resultado=mysqli_select_db($conexion, $basedatos);
        if (! $resultado){
                echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
        } else {
            $resultado = mysqli_query($conexion, $sql);
            if(!$resultado){
                    echo "ERROR: Imposible añadir el inmueble.<br>\n";
            } else {
                echo "Inmueble insertado correctamente.";

            }
            echo "<br><br><a href='añadir.php'><-- Añadir otro inmueble</a>";
            echo "<br><br><a href='index.php'><-- Volver al índice</a>";

        }
        mysqli_close($conexion);
    }

?>
</body>
</html>