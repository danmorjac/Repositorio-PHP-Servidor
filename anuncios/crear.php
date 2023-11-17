<?php
// Archivo php para el "administrador" para crear la base de datos necesaria
// y las tablas, con los campos requeridos.

// Datos generales para la aplicacion web:
$servidor = "127.0.0.1"; // "localhost"
$usuario_bd = "root"; // Usuario Administrador de MySQL
$clave_bd = ""; // Clave del Usuario Administrador de MySQL
$basedatos = "anuncios";
$tabla1 = "usuarios";
$tabla2 = "tablon";

$sql_crearbasedatos = "CREATE DATABASE $basedatos";

$sql_creartabla1 = "CREATE TABLE $tabla1(";
$sql_creartabla1 .= "usuario CHAR(15) PRIMARY KEY NOT NULL, clave CHAR(15) NOT NULL, tipo CHAR(15) NOT NULL);";

$sql_insertarregistros1 = "INSERT INTO $tabla1 VALUES ";

$sql_insertarregistros1 .= "('felipe','feli','registrado'),";
$sql_insertarregistros1 .= "('ana','anita','registrado'),";
$sql_insertarregistros1 .= "('joan','admin','administrador');";

$sql_creartabla2 = "CREATE TABLE $tabla2(";
$sql_creartabla2 .= "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, usuario CHAR(15) NOT NULL, ";
$sql_creartabla2 .= "fechahora DATETIME NOT NULL, mensaje TEXT NOT NULL, prescrito CHAR(1) NOT NULL);";

$sql_insertarregistros2 = "INSERT INTO $tabla2 VALUES ";
$sql_insertarregistros2 .= "(null,'felipe','2009-01-25 12:30:12','Se alquila casa bien comunicada, en pleno centro.\nEmail:alguien@servidor.com','N'),";
$sql_insertarregistros2 .= "(null,'ana','2009-02-10 14:10:00','Fiesta de la primavera\nLo mejor el curso.\nNO FALTEIS.','N'),";
$sql_insertarregistros2 .= "(null,'ana','2009-02-10 14:10:00','Se venden libros de texto de segunda mano\nInteresados preguntar por Marcos en la cafeteria.','N');";

// Inicialmente intentaremos conectar con el servidor MySQL instalado en el servidor web.
$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);
if (!$conexion) {
	echo "ERROR: Imposible establecer conexi�n con el servidor (puede que esto desactivado o que no se encuentre en el servidor $servidor).<br>\n";
} else {
	// Como pudo conectarse con el servidor, intentaremos crear la base de datos, y despu�s la seleccionaremos para poder trabajar sobre ella.
	echo "Conexion realizada con el servidor.<br>\n";

	// CREAR LA BASE DE DATOS:
	$resultado = mysqli_query($conexion, $sql_crearbasedatos);
	if (!$resultado) {
		echo "ERROR: Imposible crear base de datos $basedatos (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
	} else {
		echo "Base de datos $basedatos creada.<br>\n";
	}

	// SELECCIONAR LA BASE DE DATOS:
	$resultado = mysqli_select_db($conexion, $basedatos);
	if (!$resultado) {
		echo "ERROR: Imposible seleccionar la base de datos $basedatos (puede que no exista o que no se tenga permiso para usarla).<br>\n";
	} else {
		// Como pudo seleccionarse la base de datos, entonces intentaremos crear las tablas dentro, junto con registros iniciales para pruebas.
		echo "Base de datos $basedatos seleccionada.<br>\n";
		// CREAR TABLA 1:
		$resultado = mysqli_query($conexion, $sql_creartabla1);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla1 (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
		} else {
			echo "Tabla $tabla1 creada.<br>\n";
		}
		// INSERTAR REGISTROS EN TABLA 1:
		$resultado = mysqli_query($conexion, $sql_insertarregistros1);
		if (!$resultado) {
			echo "ERROR: Imposible insertar registros iniciales en tabla $tabla1 (puede que ya existan esos registros o que no se tengan los permisos).<br>\n";
		} else {
			echo "Registros iniciales insertados satisfactoriamente en la Tabla $tabla1.<br>\n";
		}

		// CREAR TABLA 2:
		$resultado = mysqli_query($conexion, $sql_creartabla2);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla2 (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
		} else {
			echo "Tabla $tabla2 creada.<br>\n";
		}
		// INSERTAR REGISTROS EN TABLA 2:
		$resultado = mysqli_query($conexion, $sql_insertarregistros2);
		if (!$resultado) {
			echo "ERROR: Imposible insertar registros iniciales en tabla $tabla2 (puede que ya existan esos registros o que no se tengan los permisos).<br>\n";
		} else {
			echo "Registros iniciales insertados satisfactoriamente en la Tabla $tabla2.<br>\n";
		}

	}
	// Antes de terminar, debe cerrarse la conexion con el servidor (pues sigue abierta)).
	echo "Cerrando la conexion con el servidor...<br>\n";
	mysqli_close($conexion);
}

echo "Fin del programa.<br>\n";
?>