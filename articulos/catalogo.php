<?php
session_start(); // Usaremos sesiones.

$brevedescripcion="Catalogo de Articulos";
$indicaciones="Consulta y compra de articulos";
include("cabecera.inc.php");
?>
<?php
if ( isset($_SESSION['usuario']) && isset($_SESSION['tipo']) ){		
	include("datos.php");
	$tabla="articulos";
	
	$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
	if (! $conexion){
		echo "ERROR: Imposible establecer conexión con el servidor $servidor.<br>\n";
	}
	else{
		$resultado=mysqli_select_db($conexion, $basedatos);
		if (! $resultado){
			echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
		}
		else{
			$sql = "SELECT * FROM $tabla;";
			//echo "<br>$sql<br>";
			
			$resultado = mysqli_query($conexion, $sql);
			if(!$resultado){
				echo "ERROR: Imposible consultar los datos.<br>\n";
			}
			else{
			 	$numeroregistros=mysqli_num_rows($resultado);

				echo "SE ENCONTRARON $numeroregistros ARTICULOS:<br>";
				
				while($fila=mysqli_fetch_array($resultado)){
				 
				 	// La fecha de está $fila['fechaalta'] en formato año-mes-día (mal).
				 	// Dentro de la fecha, separamos el año, mes y día (por el guión).
				 	$vectorfecha=explode("-",$fila['fechaalta']);
				 	// Reconstruimos la cadena: "día-mes-año hora:minutos:segundos"
				 	$fechacorrecta=$vectorfecha[2]."-".$vectorfecha[1]."-".
						$vectorfecha[0];
						
					echo "<hr>\n";
					echo "<b>Id:</b> " . $fila['id'] . 
						" <b>Nombre:</b> " . $fila['nombre'] .
						" <b>FechaAlta:</b> " . $fechacorrecta .
						" <b>Precio:</b> " . $fila['precio'] . "€" .
						"<br>\n<b>Descripcion:</b><br>\n" . 
							nl2br($fila['descripcion']);
						
					// La función nl2br cambia los \n por <br> para que se respeten
					// los saltos de línea (\n) del texto al mostrarlo en una página
					// web, ya que en html los \n no saltan (aparecería todo el texto
					// en una única línea si no se transforman en <br>).
					
					if($_SESSION['tipo']=='administrador'){
					 	echo "<br><a href='comprobareliminar.php?id=" . 
							$fila['id'] . "'>Eliminar</a>";
					}
					echo "<hr>\n";
				}
			}
		}
		mysqli_close($conexion);
	}		

	echo"<a href='index.php'>Cambiar de usuario</a><br>\n";
	
} 
else {
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
}
?>
<?
include("pie.inc.php");
?>
