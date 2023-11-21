<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";


session_start(); // Usaremos sesiones.

$brevedescripcion = "Foro de mensajes";
$indicaciones = "Consulta e insercion de mensajes";
include("cabecera.inc.php");
?>
<?php
if (isset($_SESSION['usuario']) && isset($_SESSION['clave']) && isset($_SESSION['tipo'])) {

	echo "<br>Usuario: <b>" . $_SESSION['usuario'] . "</b> (" . $_SESSION['tipo'] . ").<br>\n";

	if ($_SESSION['tipo'] == 'administrador' or $_SESSION['tipo'] == 'registrado') {

		include("datos.php");
		$tabla = "mensajes";

		$sql = "SELECT * FROM $tabla;";
		//echo "<br>$sql<br>";

		// Se establece conexion con la base de datos
		$conexion = setConnection("miniforo");

		$resultado = executeSQL($conexion, $sql, $tabla);

		$numeroregistros = mysqli_num_rows($resultado);

		echo "SE ENCONTRARON $numeroregistros MENSAJES EN EL FORO:<br>";


		while ($fila = mysqli_fetch_array($resultado)) {

			$fechahoracorrectas = date("d-m-Y H:i:s", strtotime($fila['fechahora']));

			echo "<hr>\n";
			echo "<b>Id:</b> " . $fila['id'] .
				" <b>Usuario:</b> " . $fila['usuario'] .
				" <b>FechaHora:</b> " . $fechahoracorrectas .
				" <b>Tema:</b> " . $fila['tema'] .
				"<br>\n<b>Mensaje:</b><br>\n" . nl2br($fila['mensaje']);

			// La funci�n nl2br cambia los \n por <br> para que se respeten
			// los saltos de l�nea (\n) del texto al mostrarlo en una p�gina
			// web, ya que en html los \n no saltan (aparecer�a todo el texto
			// en una �nica l�nea si no se transforman en <br>).

			if ($_SESSION['tipo'] == 'administrador') {
				echo "<br><a href='comprobareliminar.php?id=" .
					$fila['id'] . "'>Eliminar</a>";
			}
			echo "<hr>\n";


		}
		mysqli_close($conexion);


		echo "<a href='insertar.php'>Insertar nuevo mensaje</a><br>\n";
		echo "<a href='index.php'>Cambiar de usuario</a><br>\n";
	} else {
		echo "<a href='index.php'>" .
			"Inicie una sesion primero como usuario registrado o administrador.</a><br>\n";
	}
} else {
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
}
?>
</body>

</html>