<?php

//Incluimos la cabecera.
$brevedescripcion="Busqueda por Venta o Alquiler";
$indicaciones="Resultador busqueda Venta/Alquiler ";
include("cabecera.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda Venta/Alquiler - Inmobiliaria</title>
</head>
<body>
    <?php
        if(!isset($_POST['Venta_Alquiler'])) {
            echo "Rellena los datos de busqueda.";
            echo "<a href='buscarVentaAlquiler.php'><--Volver atrás</a>";
        } else {
            include("datos.php");

            $Venta_Alquiler=$_POST['Venta_Alquiler'];
            $sql="SELECT * FROM $tabla WHERE Venta_Alquiler='$Venta_Alquiler';";

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
                            echo "ERROR: Imposible listar los inmuebles.<br>\n";
                    } else {
                            $numeroregistros=mysqli_num_rows($resultado);
        
                            echo "SE ENCONTRARON $numeroregistros INMUEBLES:<br>";
        
                            
                            while($fila=mysqli_fetch_array($resultado)){
                                $foto=$fila['foto'];
                                echo "<hr>\n";
                                echo "<b>Id:</b> " . $fila['id'] . 
                                    " <b>Tipo:</b> " . $fila['tipo'] .
                                    " <b>Descripcion:</b> " . $fila['descripcion'] .
                                    " <b>Direccion:</b> " . $fila['direccion'] .
                                    " <b>Venta_Alquiler:</b> " . $fila['Venta_Alquiler'] .
                                    " <b>precio_venta:</b> " . $fila['precio_venta'] .
                                    " <b>precio_alquiler:</b> " . $fila['precio_alquiler'] .
                                    " <b>caracteristicas:</b> " . $fila['caracteristicas'] .
                                    "<br>\n<b>Foto:</b><br>\n";
                                echo  "<img src='$foto' alt='No se puede mostrar la imagen.'style='height:200px; width:200px text-align:center'>";
                                
                                $id=$fila['id'];

                                echo "<br><a href='borrar.php?id=$id'>Borrar</a>";

                                echo "      <a href='editar.php?id=$id'>Editar</a>";

                            }
                            echo "<br><br><a href='buscarVentaAlquiler.php'><--Volver atrás</a>";

                            echo "<br><br><a href='index.php'><-- Volver al índice</a>";
                        }
                    }
                mysqli_close($conexion);
            }
        }
    ?>
</body>
</html>
