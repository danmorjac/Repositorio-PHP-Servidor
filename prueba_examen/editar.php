<?php

    //Incluimos la cabecera.
    $brevedescripcion="Edición de un inmueble";
    $indicaciones="Introduce los datos a cambiar";
    include("cabecera.inc.php");

?>

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
        $id=$_GET['id'];

        $sql = "SELECT foto FROM $tabla WHERE id='$id';";

        $conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
		if (! $conexion){
			echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
		}
		else{
			$resultado=mysqli_select_db($conexion, $basedatos);
			if (! $resultado){
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			}else{
				
				$resultado = mysqli_query($conexion, $sql);
				if(!$resultado){
					echo "ERROR: Imposible mostrar la imagen del inmueble " . $_GET['id'] . "<br>\n";
				}
				else{
                    $fila=mysqli_fetch_array($resultado);
                    $foto = $fila['foto'];
                    echo  "<img src='$foto' alt='No se puede mostrar la imagen.'style='height:200px; width:200px text-align:center'>";
                     
				}
			}
			mysqli_close($conexion);
        }
    ?>
    <br><br>
    <form action= <?php echo "comprobarEditar.php?id=$_GET[id]" ?> method="POST">
        Nuevo Tipo:<input type="text" name="tipo" required> <br><br>
        Nueva Descripcion:<input type="text" name="descripcion"> <br><br>
        Nueva Direccion: <input type="text" name="direccion"> <br><br>
        Venta <input type="radio" name="Venta_Alquiler" id="venta" value="venta"> <br>
        Alquiler <input type="radio" name="Venta_Alquiler" id="alquiler" value="alquiler"> <br><br>
        Nuevo Precio de venta: <input type="text" name="precio_venta"  value="No" required></p>
        Nuevo Precio de alquiler: <input type="text" name="precio_alquiler" value="No" required></p>
        Nuevas Caracteristicas: <input type="text" name="caracteristicas"></p>
        Nueva Foto: <input type="text" name="foto"></p>
        <input type="submit" value="Enviar">
    </form>
    <b>IMPORTANTE: Cambiar el precio según el tipo de oferta.</b>
    
    <br><br><a href='index.php'><-- Volver al índice</a>
</body>
</html>