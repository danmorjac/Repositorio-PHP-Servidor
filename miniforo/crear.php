<?php
// Archivo php para el administrador para crear la base de datos necesaria
// y las tablas, con los campos requeridos.

include("datos.php");

$sql_crearbasedatos = "CREATE DATABASE $basedatos";

$tabla1 = "usuarios";
$sql_creartabla1 = "CREATE TABLE $tabla1(";
$sql_creartabla1 .= "usuario VARCHAR(20) PRIMARY KEY NOT NULL, ";
$sql_creartabla1 .= "clave VARCHAR(20) NOT NULL, tipo VARCHAR(20) NOT NULL);";

$sql_insertarregistros1 = "INSERT INTO $tabla1 VALUES ";
$sql_insertarregistros1 .= "('usuario','usuario','registrado'),";
$sql_insertarregistros1 .= "('admin','admin','administrador'),";
$sql_insertarregistros1 .= "('invitado','invitado','invitado');";

$tabla2 = "mensajes";
$sql_creartabla2 = "CREATE TABLE $tabla2(";
$sql_creartabla2 .= "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, ";
$sql_creartabla2 .= "usuario VARCHAR(20) NOT NULL, fechahora DATETIME NOT NULL, ";
$sql_creartabla2 .= "tema CHAR(50) NOT NULL, mensaje TEXT NOT NULL);";

$sql_insertarregistros2 = "INSERT INTO $tabla2 VALUES ";
$sql_insertarregistros2 .= "(NULL,'admin','2007-12-31 15:50:55','Bienvenidos','Un saludo');";

echo "Base de datos miniforo creada<br><br>\n";

$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);
if (!$conexion) {
	echo "ERROR: Imposible establecer conexi�n con el servidor.<br>\n";
} else {
	$resultado = mysqli_query($conexion, $sql_crearbasedatos);
	if (!$resultado) {
		echo "ERROR: Imposible crear base de datos $basedatos.<br>\n";
	}

	$resultado = mysqli_select_db($conexion, $basedatos);
	if (!$resultado) {
		echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
	} else {
		// TABLA 1:
		$resultado = mysqli_query($conexion, $sql_creartabla1);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla1.<br>\n";
		}
		$resultado = mysqli_query($conexion, $sql_insertarregistros1);
		if (!$resultado) {
			echo "ERROR: Imposible insertar en tabla $tabla1.<br>\n";
		}
		// TABLA 2:
		$resultado = mysqli_query($conexion, $sql_creartabla2);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla2.<br>\n";
		}
		$resultado = mysqli_query($conexion, $sql_insertarregistros2);
		if (!$resultado) {
			echo "ERROR: Imposible insertar en tabla $tabla2.<br>\n";
		}
	}
	mysqli_close($conexion);
}
?>