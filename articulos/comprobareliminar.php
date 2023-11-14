<?php
session_start(); // Usaremos sesiones.

$brevedescripcion="Eliminar un articulo (solo administradores)";
$indicaciones="Comprobacion de eliminacion correcta de un articulo";
include("cabecera.inc.php");
?>
<?php
if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])
	&& isset($_GET['id'])){

	if($_SESSION['tipo']=='administrador'){ 
		// Si es un administrador podrá eliminar.
		
		include("datos.php");
		$tabla="articulos";
		
		$sql = "DELETE FROM $tabla WHERE id=" . $_GET['id'] . ";";
		//echo "<br>$sql<br>";
		
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
					echo "ERROR: Imposible eliminar el artículo " . $_GET['id'] . "<br>\n";
				}
				else{
				 	echo "Artículo " . $_GET['id'] . " eliminado<br>\n";
				}
			}
			mysqli_close($conexion);
		}
		echo"<a href='catalogo.php'>Volver al Catálogo</a><br>\n";
		echo"<a href='index.php'>Cambiar de usuario</a><br>\n";	
	}
	else{
		echo "<a href='index.php'>" .
			"Inicie una sesión primero como usuario administrador</a><br>\n";
	}
} 
else {
	echo "<a href='index.php'>Inicie una sesión primero.</a><br>\n";
}
?>
<?
include("pie.inc.php");
?>
