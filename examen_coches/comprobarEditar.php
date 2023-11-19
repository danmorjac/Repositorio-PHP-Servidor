<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Inmobiliaria</title>
</head>
<body>
<?php
    include("datos.php");
	
    $id = $_GET['id'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $foto=$_POST['foto'];

    $sql = "UPDATE $tabla SET marca = '$marca', modelo = '$modelo', foto='$foto' WHERE id='$id';";

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
					echo "ERROR: No fue posible editar el coche " . $_GET['id'] . "<br>\n";
				}
				else{
				 	echo "Datos del coche con " . $marca . " marca cambiada.";
				}
			}
			mysqli_close($conexion);
        }
        
        echo"<br><br><a href='buscar.php'>Volver a la página de búsqueda</a>";
?>
</body>
</html>