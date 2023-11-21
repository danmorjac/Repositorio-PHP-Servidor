<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";

session_start(); // Usaremos sesiones.

$brevedescripcion = "Comprobacion del Inicio de Sesion";
$indicaciones = "Autentificacion de la identidad del usuario";
include("cabecera.inc.php");
?>
<?php
if (isset($_POST['usuario']) && isset($_POST['clave'])) {

	$_SESSION['usuario'] = $_POST['usuario'];
	$_SESSION['clave'] = $_POST['clave'];
	$_SESSION['tipo'] = 'invitado';

	include("datos.php");
	$tabla = "usuarios";

	$sql = "SELECT * FROM $tabla WHERE (usuario='" . $_SESSION['usuario'] . "'";
	$sql .= " and clave='" . $_SESSION['clave'] . "');";

	$conexion = setConnection("miniforo");

	$resultado = executeSQL($conexion, $sql, $tabla);


	$numeroregistros = mysqli_num_rows($resultado);
	if ($numeroregistros < 1) { // Si no se encontr� un usuario con esa clave.

		echo "ERROR: Usuario no registrado o clave incorrecta.<br>\n";
		echo "<a href='index.php'>Volver a intentarlo</a><br>\n";

	} else { // Usuario encontrado con clave correcta...

		echo "Bienvenido: <b>" . $_SESSION['usuario'] . "</b>.<br>\n";
		echo "<a href='foro.php'>Entrar en el foro</a><br>\n";
		$fila = mysqli_fetch_array($resultado);

		if (!$fila) {

			echo "ERROR: Imposible obtener su tipo.<br>\n";

		} else {

			$_SESSION['tipo'] = $fila['tipo'];

		}

		echo "Tipo de usuario: <b>" . $_SESSION['tipo'] . "</b><br>\n";
	}


	mysqli_close($conexion);

} else {
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
}
?>
</body>

</html>