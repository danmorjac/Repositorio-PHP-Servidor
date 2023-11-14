<?php
session_start(); // Usaremos sesiones.

// Si todavía no están establecidas las variables de sesión obligatorias...
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo']))
{
	$_SESSION['usuario']="anonimo";
	$_SESSION['tipo']="invitado"; // En principio todos son usuarios invitados.
}
?>

<html><head><title>FILMOTECA - Eliminación de una opinión</title></head>
<body>

<?php	
// Si es un administrador...
if($_SESSION['tipo']=="administrador")
{
	// Si se recibió el campo "id" por el método GET desde el enlace en foro.php...
	if (isset($_GET['id']))
	{ 
		// Datos generales para la aplicación web:
		$servidor="127.0.0.1"; // "localhost"
		$usuario_bd="root"; // Usuario Administrador de MySQL
		$clave_bd=""; // Clave del Usuario Administrador de MySQL
		$basedatos="filmoteca";
		$tabla2="opiniones";
		
		// Por comodidad...
		$id=$_GET['id'];
		
		// Instrucción SQL que inserta un nuevo registro en la tabla.
		$sql = "DELETE FROM $tabla2 WHERE id=$id;"; // Como el campo id es numérico, no necesita comillas simples en la cláusula WHERE.
	
		// Inicialmente intentaremos conectar con el servidor MySQL instalado en el servidor web.
		$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
		if (! $conexion){
			echo "ERROR: Imposible establecer conexión con el servidor $servidor.<br>\n";
		}else{
		 	// Como pudo conectarse con el servidor, intentaremos seleccionar la base de datos, para poder operar sobre ella.
			$resultado=mysqli_select_db($conexion, $basedatos);
			if (! $resultado){
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			}else{
				// Como pudo seleccionarse la base de datos, entonces intentaremos realizar una operación en una de sus tablas.
				$resultado = mysqli_query($conexion, $sql);
				// Si no pudo realizarse la operación...
				if(!$resultado){
				 	echo "ERROR: No pudo realizarse la operación sobre la tabla $tabla2.<br>\n";
				}
				else{
				 	$numero_registros_afectados=mysqli_affected_rows($conexion);
				 	echo "CORRECTO: Eliminación correcta de $numero_registros_afectados registros en la tabla $tabla2.<br>\n";
				}
			}
			// Antes de terminar, debe cerrarse la conexión con el servidor (pues sigue abierta)).
			mysqli_close($conexion);
		}

	} // if (isset($_GET['id']))
	else
	{
		echo "ERROR: Necesita cargar esta página desde el listado de opiniones.<br>\n";
	}
} // if($_SESSION['tipo']=="administrador")
else
{
	echo "ERROR: Acceso restringido. Únicamente los administradores pueden acceder a esta página.<br>\n";
}

// Enlace para navegar por las páginas...
echo "<br><a href='listado.php'>Ir al listado de opiniones</a><br>\n";
echo "<br><a href='index.php'>Cambiar de usuario</a><br>\n";

// En el pie de cada página informaremos del usuario y su tipo:
echo "<br>Bienvenido: <b>" . $_SESSION['usuario'] . "</b> - Tipo de usuario: <b>" . $_SESSION['tipo'] . "</b>";
?>
</body></html>

