<?php
session_start(); // Usaremos sesiones.

// Si todav�a no est�n establecidas las variables de sesi�n obligatorias...
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo'])) {
	$_SESSION['usuario'] = "anonimo";
	$_SESSION['tipo'] = "invitado"; // En principio todos son usuarios invitados.
}
?>

<html>

<head>
	<title>FILMOTECA - Comprobaci�n de la identificaci�n del usuario</title>
</head>

<body>

	<?php
	// Si se recibieron los campos del formulario de index.php...
	if (isset($_POST['usuario']) && isset($_POST['clave'])) {
		// Si ambos campos del formulario est�n rellenos...
		if ($_POST['usuario'] != "" && $_POST['clave'] != "") {

			// Datos generales para la aplicaci�n web:
			$servidor = "127.0.0.1"; // "localhost"
			$usuario_bd = "root"; // Usuario Administrador de MySQL
			$clave_bd = ""; // Clave del Usuario Administrador de MySQL
			$basedatos = "filmoteca";
			$tabla = "usuarios"; // En esta tabla s�lo hay administradores y usuarios registrados.
	
			$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);
			if (!$conexion) {
				echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
			} else {
				$resultado = mysqli_select_db($conexion, $basedatos);
				if (!$resultado) {
					echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
				} else {
					// Por comodidad...
					$usuario = $_POST['usuario'];
					$clave = $_POST['clave'];

					$sql = "SELECT * FROM $tabla WHERE usuario='$usuario' and clave='$clave';";
					//echo "<br>$sql<br>";
	
					$resultado = mysqli_query($conexion, $sql);
					if (!$resultado) { // Si no pudo realizarse la consulta
						echo "ERROR: Imposible ejecutar la consulta en la tabla $tabla.<br>\n";
					} else {
						$numeroregistros = mysqli_num_rows($resultado);
						if ($numeroregistros > 0) { // Si se encontr� al menos un usuario con esa clave.
							$fila = mysqli_fetch_array($resultado); // Obtenemos el registro (la fila) de la tabla con los datos del usuario.
							if (!$fila) // Si no pudo conseguirse la fila...
							{
								echo "ERROR: Imposible obtener el nombre del usuario<br>\n";
							} else { // Establecemos las variables de sesi�n usuario y tipo al nombre y tipo del usuario encontrado.
								$_SESSION['tipo'] = $fila['tipo'];
								$_SESSION['usuario'] = $fila['usuario'];
								echo "Nuevo tipo del usuario: <b>" . $_SESSION['tipo'] . "</b><br>\n";
							}
						} else {
							echo "Usuario no encontrado<br>\n";
						}
					}
				}
				mysqli_close($conexion); // Debe cerrarse la conexi�n, que todav�a sigue abierta.
			}
		} // Si alg�n campo no est� relleno: no hace nada. Pues los invitados no los rellenar�n. No debe mostrar mensajes de error aqu�.
	}

	// Enlace para navegar por las p�ginas...
	echo "<br><a href='listado.php'>Ir al listado de opiniones</a><br>\n";
	echo "<br><a href='index.php'>Cambiar de usuario</a><br>\n";

	// En el pie de cada p�gina informaremos del usuario y su tipo:
	echo "<br>Bienvenido: <b>" . $_SESSION['usuario'] . "</b> - Tipo de usuario: <b>" . $_SESSION['tipo'] . "</b>";
	?>
</body>

</html>