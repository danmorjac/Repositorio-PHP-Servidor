<?php
        if(!isset($_POST['marca'])) {
            echo "Rellena los datos de busqueda.";  
            echo "<a href='buscarMarca.php'><--Volver atrás</a>";
        } else {

            $marca=$_POST['marca'];
            $sql="SELECT * FROM $tabla WHERE marca='$marca';";

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
                            echo "ERROR: No se ha podido listar las marcas.<br>\n";
                    } else {
                            $numeroregistros=mysqli_num_rows($resultado);
        
                            echo "Se encontraron $numeroregistros marcas:<br>";
        
                            
                            while($fila=mysqli_fetch_array($resultado)){
                                $foto=$fila['foto'];
                                echo "<hr>\n";
                                echo "<b>Id:</b> " . $fila['id'] . 
                                    " <b>Marca:</b> " . $fila['marca'] .

                                $id=$fila['id'];

                                echo "<br><a href='borrar.php?id=$id'>Borrar</a>";

                                echo "<br><a href='editar.php?id=$id'>Editar</a>";
                                
                            }

                            echo "<br><br><a href='buscarMarca.php'>Volver atrás</a>";

                            echo "<br><br><a href='buscar.php'>Volver a la página de búsqueda</a>";
                        }
                    }
                mysqli_close($conexion);
            }
        }
    ?><?php
if (!isset($_POST['marca'])) {
    echo "Rellena los datos de busqueda.";
    echo "<a href='buscarMarca.php'><--Volver atrás</a>";
} else {
    include("crearbasededatosytablas.php");

    $marca = $_POST['marca'];
    $sql = "SELECT * FROM $tabla WHERE marca='$marca';";

    $conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);
    if (!$conexion) {
        echo "ERROR: Imposible establecer conexión con el servidor $servidor.<br>\n";
    } else {

        $resultado = mysqli_select_db($conexion, $basedatos);
        if (!$resultado) {
            echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
        } else {
            $resultado = mysqli_query($conexion, $sql);
            if (!$resultado) {
                echo "ERROR: No se ha podido listar las marcas.<br>\n";
            } else {
                $numeroregistros = mysqli_num_rows($resultado);

                echo "Se encontraron $numeroregistros marcas:<br>";

                while ($fila = mysqli_fetch_array($resultado)) {
                    $foto = $fila['foto'];
                    echo "<hr>\n";
                    echo "<b>Id:</b> " . $fila['id'] .
                        " <b>Marca:</b> " . $fila['marca'];

                    $id = $fila['id'];

                    echo "<br><a href='borrar.php?id=$id'>Borrar</a>";

                    echo "<br><a href='editar.php?id=$id'>Editar</a>";

                }

                echo "<br><br><a href='buscarMarca.php'>Volver atrás</a>";

                echo "<br><br><a href='buscar.php'>Volver a la página de búsqueda</a>";
            }
            mysqli_close($conexion);
        }
    }
}
?>