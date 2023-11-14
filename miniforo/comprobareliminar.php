<?php
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

		$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);
		if (!$conexion) {
			echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
		} else {
			$resultado = mysqli_select_db($conexion, $basedatos);
			if (!$resultado) {
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			} else {

				$resultado = mysqli_query($conexion, $sql);
				if (!$resultado) {
					echo "ERROR: Imposible eliminar el mensaje " . $_GET['id'] . "<br>\n";
				} else {
					echo "Mensaje " . $_GET['id'] . " eliminado<br>\n";
				}
			}
			mysqli_close($conexion);
		}
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