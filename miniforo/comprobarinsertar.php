<?php
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

		$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);
		if (!$conexion) {
			echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
		} else {
			$resultado = mysqli_select_db($conexion, $basedatos);
			if (!$resultado) {
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			} else {

				$sql = "INSERT INTO $tabla VALUES(" .
					"NULL, '" .
					$_SESSION['usuario'] . "','" .
					date("Y/m/d h:i:s") . "','" .
					$_POST['tema'] . "','" .
					$_POST['mensaje'] . "');";

				echo "<br>Mensaje insertado<br>\n";
				$resultado = mysqli_query($conexion, $sql);
				// Si no pudo realizarse la inserci�n...
				if (!$resultado) {
					echo "ERROR: Imposible insertar el mensaje nuevo.<br>";
				} else {
					echo "Mensaje nuevo guardado con exito:<br>\n";
				}
			}
			mysqli_close($conexion);
		}
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