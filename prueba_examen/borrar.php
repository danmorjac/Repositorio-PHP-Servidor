<?php
    //Incluimos la cabecera.
    $brevedescripcion="Eliminación de un inmueble";
    $indicaciones="Proceso de eliminación de un inmueble";
    include("cabecera.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Borrar - Inmobiliaria</title>
</head>
<body>
<?php
    include("datos.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM $tabla WHERE id='$id';";

    $conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
		if (! $conexion){
			echo "ERROR: Imposible establecer conexión con el servidor $servidor.<br>\n";
		}
		else{
			$resultado=mysqli_select_db($conexion, $basedatos);
			if (! $resultado){
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			}else{
				
				$resultado = mysqli_query($conexion, $sql);
				if(!$resultado){
					echo "ERROR: Imposible eliminar el inmueble " . $_GET['id'] . "<br>\n";
				}
				else{
				 	echo "Inmueble " . $_GET['id'] . " eliminado<br>\n";
				}
			}
			mysqli_close($conexion);
        }
        echo "<br><br><a href='index.php'><-- Volver al índice</a>";
?>
</body>
</html>