<?php
session_start(); // Usaremos sesiones.

// Si todav�a no est�n establecidas las variables de sesi�n obligatorias...
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo']))
{
	$_SESSION['usuario']="anonimo";
	$_SESSION['tipo']="invitado"; // En principio todos son usuarios invitados.
}
// En la cabecera de cada p�gina informaremos del usuario y su tipo:
echo "<br><br>Usuario: " . $_SESSION['usuario'] . " - Tipo: " . $_SESSION['tipo'] . "<br>\n";
?>

<html><head><title>ANUNCIOS - Prescribir un anuncio</title></head>
<body>

<?php
// Si es un administrador...
if($_SESSION['tipo']=="administrador")
{
	// Si se recibi� el campo "id" por el m�todo GET desde el enlace en foro.php...
	if (isset($_GET['id']))
	{ 
		// Datos generales para la aplicaci�n web:
		$servidor="127.0.0.1"; // "localhost"
		$usuario_bd="root"; // Usuario Administrador de MySQL
		$clave_bd=""; // Clave del Usuario Administrador de MySQL
		$basedatos="anuncios";
		$tabla2="tablon";
		
		// Por comodidad...
		$id=$_GET['id'];
		
		// Instrucci�n SQL que modifica (actualiza) un registro existente en la tabla.
		$sql = "UPDATE $tabla2 SET prescrito = 'S' WHERE id = $id;"; // Como el campo id es num�rico, no necesita comillas simples en la cl�usula WHERE.
	
		// Inicialmente intentaremos conectar con el servidor MySQL instalado en el servidor web.
		$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
		if (! $conexion){
			echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
		}else{
		 	// Como pudo conectarse con el servidor, intentaremos seleccionar la base de datos, para poder operar sobre ella.
			$resultado=mysqli_select_db($conexion, $basedatos);
			if (! $resultado){
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			}else{
				// Como pudo seleccionarse la base de datos, entonces intentaremos realizar una operaci�n en una de sus tablas.
				$resultado = mysqli_query($conexion, $sql);
				// Si no pudo realizarse la operaci�n...
				if(!$resultado){
				 	echo "ERROR: No pudo realizarse la operaci�n sobre la tabla $tabla2.<br>\n";
				}
				else{
				 	$numero_registros_afectados=mysqli_affected_rows($conexion);
				 	echo "CORRECTO: Modificaci�n correcta de $numero_registros_afectados registros en la tabla $tabla2.<br>\n";
				}
			}
			// Antes de terminar, debe cerrarse la conexi�n con el servidor (pues sigue abierta)).
			mysqli_close($conexion);
		}

	} // if (isset($_GET['id']))
	else
	{
		echo "ERROR: Necesita cargar esta p�gina desde el listado de anuncios.<br>\n";
	}
} // if($_SESSION['tipo']=="administrador")
else
{
	echo "ERROR: Acceso restringido. �nicamente los administradores pueden acceder a esta p�gina.<br>\n";
}
?>

<br><a href='tablon.php'>Ir al tablon de anuncios</a>
<br><a href='index.php'>Cambiar de usuario</a>

</body></html>

