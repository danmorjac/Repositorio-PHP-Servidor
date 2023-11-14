<?php
// Archivo php para el administrador para crear la base de datos necesaria
// y las tablas, con los campos requeridos.

include("datos.php");

$sql_crearbasedatos = "CREATE DATABASE $basedatos";

$tabla1="administradores";
$sql_creartabla1 = "CREATE TABLE $tabla1(";
$sql_creartabla1.= "usuario VARCHAR(20) PRIMARY KEY NOT NULL, ";
$sql_creartabla1.= "clave VARCHAR(20) NOT NULL);";
$sql_insertarregistros1 = "INSERT INTO $tabla1 VALUES ";
$sql_insertarregistros1.= "('admin','admin');";

$tabla2="articulos";
$sql_creartabla2 = "CREATE TABLE $tabla2(";
$sql_creartabla2.= "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, ";
$sql_creartabla2.= "nombre VARCHAR(20) NOT NULL, fechaalta DATE NOT NULL, ";
$sql_creartabla2.= "precio DECIMAL(6,2) NOT NULL, descripcion TEXT NOT NULL);";
$sql_insertarregistros2 = "INSERT INTO $tabla2 VALUES ";
$sql_insertarregistros2.= "(NULL,'Cartucho','2007-12-31',6.50,'Cartucho Negro HPXXX')," .
"(NULL,'Impresora Laser','2008-01-01','120','Alta capacidad y velocidad.');";



// echo "<br>$sql_creartabla1<br>\n$sql_insertarregistros1<br>\n" .
//	"$sql_creartabla2<br>\n$sql_insertarregistros2<br><br><br>\n";

$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
if (! $conexion){
	echo "ERROR: Imposible establecer conexión con el servidor.<br>\n";
}
else{
	$resultado=mysqli_query($conexion, $sql_crearbasedatos);
	if (!$resultado) {
		echo "ERROR: Imposible crear base de datos $basedatos.<br>\n";
	}

	$resultado=mysqli_select_db($conexion, $basedatos); 
	if (!$resultado){
		echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
	}
	else{
		// TABLA 1:
		$resultado=mysqli_query($conexion, $sql_creartabla1);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla1.<br>\n";
		}
		$resultado=mysqli_query($conexion, $sql_insertarregistros1);
		if (!$resultado) {
			echo "ERROR: Imposible insertar en tabla $tabla1.<br>\n";
		}
		// TABLA 2:
		$resultado=mysqli_query($conexion, $sql_creartabla2);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla2.<br>\n";
		}
		$resultado=mysqli_query($conexion, $sql_insertarregistros2);
		if (!$resultado) {
			echo "ERROR: Imposible insertar en tabla $tabla2.<br>\n";
		}
	}
	mysqli_close($conexion);
}
?>
