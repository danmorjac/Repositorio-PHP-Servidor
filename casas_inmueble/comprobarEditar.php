<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar viviendas</title>
</head>
<body>
<?php
    include("datos.php");
	
    $tipo=$_POST['tipo'];
    $descripcion=$_POST['descripcion'];
    $direccion=$_POST['direccion'];
    $Venta_Alquiler=$_POST['Venta_Alquiler'];
    $precio_venta=$_POST['precio_venta'];
    $precio_alquiler=$_POST['precio_alquiler'];
    $caracteristicas=$_POST['caracteristicas'];
    $foto=$_POST['foto'];
    $id = $_GET['id'];

    $sql = "UPDATE $tabla SET tipo = '$tipo', descripcion = '$descripcion', direccion = '$direccion',";
    $sql .= "Venta_Alquiler='$Venta_Alquiler', precio_venta='$precio_venta', precio_alquiler='$precio_alquiler', ";
    $sql .= "caracteristicas='$caracteristicas', foto='$foto' WHERE id='$id';";

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
					echo "ERROR: Imposible editar el inmueble " . $_GET['id'] . "<br>\n";
				}
				else{
				 	echo "Datos del inmueble con " . $id . " id cambiado.";
				}
			}
			mysqli_close($conexion);
        }
        
        echo"<br><br><a href='index.php'>Volver al índice</a>";
?>
</body>
</html>