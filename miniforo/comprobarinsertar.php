<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";

session_start(); // Usaremos sesiones.

$brevedescripcion = "Insercion de un mensaje nuevo";
$indicaciones = "Comprobacion de insercion correcta de un mensaje nuevo";
include("cabecera.inc.php");
?>
<?php
if ($_SESSION['tipo'] == 'administrador' or $_SESSION['tipo'] == 'registrado') {

	echo "<br>Usuario: <b>" . $_SESSION['usuario'] . "</b> (" . $_SESSION['tipo'] . ").<br>\n";

	if (isset($_POST['tema']) and isset($_POST['mensaje'])) {
		// Si es un administrador o usuario podr� insertar.

		include("datos.php");

		$tabla = "mensajes";

		$conexion = setConnection("miniforo");

		$sql = "INSERT INTO $tabla VALUES(" .
			"NULL, '" .
			$_SESSION['usuario'] . "','" .
			date("Y/m/d h:i:s") . "','" .
			$_POST['tema'] . "','" .
			$_POST['mensaje'] . "');";

		$resultado = executeSQL($conexion, $sql, $tabla);

		echo "Mensaje nuevo guardado con exito:<br>\n";

		mysqli_close($conexion);

		echo "<a href='foro.php'>Volver al Foro</a><br>\n";
		echo "<a href='index.php'>Cambiar de usuario</a><br>\n";
	} else {
		echo "<a href='index.php'>" .
			"Inicie una sesion primero como usuario registrado o administrador</a><br>\n";
	}
} else {
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
}
?>
</body>

</html>