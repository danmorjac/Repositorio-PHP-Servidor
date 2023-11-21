<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";


session_start(); // Usaremos sesiones.

$brevedescripcion = "Eliminar un mensaje";
$indicaciones = "Comprobacion de eliminacion correcta de un mensaje";
include("cabecera.inc.php");
?>
<?php
if (
	isset($_SESSION['usuario']) && isset($_SESSION['clave']) && isset($_SESSION['tipo'])
	&& isset($_GET['id'])
) {

	echo "<br>Usuario: <b>" . $_SESSION['usuario'] . "</b> (" . $_SESSION['tipo'] . ").<br>\n";

	if ($_SESSION['tipo'] == 'administrador') {
		// Si es un administrador o usuario podr� insertar.

		include("datos.php");
		$tabla = "mensajes";

		$sql = "DELETE FROM $tabla WHERE id=" . $_GET['id'] . ";";
		//echo "<br>$sql<br>";

		$conexion = setConnection("miniforo");

		$resultado = executeSQL($conexion, $sql, $tabla);
		echo "Mensaje " . $_GET['id'] . " eliminado<br>\n";

		mysqli_close($conexion);

		echo "<a href='foro.php'>Volver al Foro</a><br>\n";
		echo "<a href='index.php'>Cambiar de usuario</a><br>\n";
	} else {
		echo "<a href='index.php'>" .
			"Inicie una sesion primero como usuario administrador</a><br>\n";
	}
} else {
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
}
?>
</body>

</html>