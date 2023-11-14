<?php
session_start(); // Usaremos sesiones.

// Si todavía no están establecidas las variables de sesión obligatorias...
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo']))
{
	$_SESSION['usuario']="anonimo";
	$_SESSION['tipo']="invitado"; // En principio todos son usuarios invitados.
}
?>

<html><head><title>FILMOTECA - Listado de opiniones sobre películas</title></head>
<body>

<?php	

// Datos generales para la aplicación web:
$servidor="127.0.0.1"; // "localhost"
$usuario_bd="root"; // Usuario Administrador de MySQL
$clave_bd=""; // Clave del Usuario Administrador de MySQL
$basedatos="filmoteca";
$tabla="opiniones";

$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
if (! $conexion){
	echo "ERROR: Imposible establecer conexión con el servidor $servidor.<br>\n";
}
else{
	$resultado=mysqli_select_db($conexion, $basedatos);
	if (! $resultado){
		echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
	}
	else{
		$sql = "SELECT * FROM $tabla;";
		//echo "<br>$sql<br>";
		
		$resultado = mysqli_query($conexion, $sql);
		if(!$resultado){
			echo "ERROR: Imposible consultar los datos en la tabla $tabla.<br>\n";
		}
		else{
		 	$numeroregistros=mysqli_num_rows($resultado);
			if($numeroregistros>0)
			{
			 	echo "SE ENCONTRARON $numeroregistros OPINIONES:<br>\n";
				// Mostraremos los datos: Si no hubiese registros ni siquiera entraría en el bucle while.
				while($fila=mysqli_fetch_array($resultado))
				{
						
					echo "<hr>\n";
					echo "<b>Id: </b>" . $fila['id'];
					
					// Si es administrador o usuario registrado...
					if($_SESSION['tipo']=='administrador' || $_SESSION['tipo']=='registrado')
					{
						echo " <b>Usuario: </b>" . $fila['usuario']; // Mostrar el autor de la opinión.
					}
					
					echo " <b>Fecha y Hora: </b>" . $fila['fechahora'] . 
						" <b>Pelicula: </b>" . $fila['nombre'] .
						"<br>\n<b>Descripcion:</b><br>\n" . nl2br($fila['opinion']);
	
					$id=$fila['id'];
					if($_SESSION['tipo']=='administrador') // Si es administrador...
					{
					 	// En el enlace enviamos el id por el método GET a la página eliminar.php.
						$enlace="eliminar.php?id=$id";
					 	echo "<br><a href='$enlace'>Eliminar</a>"; // Mostrar el enlace Eliminar.
					}
					echo "<hr>\n";
				}
			}
			else
			{
				echo "No se encontraron opiniones para mostrar.<br>\n";
			}
		}
	}
	mysqli_close($conexion); // Debe cerrarse la conexión, que todavía sigue abierta.
}		

// Enlace para navegar por las páginas...
echo "<br><a href='listado.php'>Ir al listado de opiniones</a><br>\n";
echo "<br><a href='index.php'>Cambiar de usuario</a><br>\n";

// En el pie de cada página informaremos del usuario y su tipo:
echo "<br>Bienvenido: <b>" . $_SESSION['usuario'] . "</b> - Tipo de usuario: <b>" . $_SESSION['tipo'] . "</b>";
?>
</body></html>
