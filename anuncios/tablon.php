<?php
session_start(); // Usaremos sesiones.

// Si todav�a no est�n establecidas las variables de sesi�n obligatorias...
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo']))
{
	$_SESSION['usuario']="anonimo";
	$_SESSION['tipo']="invitado"; // En principio todos son usuarios invitados.
}
// Aqu� NO informaremos del usuario y su tipo, pues puede cambiar en la identificaci�n del usuario.
?>

<html><head><title>ANUNCIOS - Identificaci�n y Tabl�n de Anuncios</title></head>
<body>

<?php
// Si se recibieron los campos usuario y clave del formulario de index.php...
if (isset($_POST['usuario']) && isset($_POST['clave'])) 
{ 
	// Si ambos campos del formulario est�n rellenos... (si no son cadena vac�a)
	if($_POST['usuario']!="" && $_POST['clave']!="") 
	{
	 
		// Datos generales para la aplicaci�n web:
		$servidor="127.0.0.1"; // "localhost"
		$usuario_bd="root"; // Usuario Administrador de MySQL
		$clave_bd=""; // Clave del Usuario Administrador de MySQL
		$basedatos="anuncios";
		$tabla="usuarios"; // En esta tabla s�lo hay administradores y usuarios registrados.
	
		$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd, $basedatos);
		if (! $conexion)
		{
			echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
		}
		else
		{
				// Por comodidad...
			 	$usuario=$_POST['usuario'];
			 	$clave=$_POST['clave'];
			 	
				$sql = "SELECT * FROM $tabla WHERE usuario='$usuario' and clave='$clave';";
				
				$resultado = mysqli_query($conexion,$sql);
				if(!$resultado){ // Si no pudo realizarse la consulta
					echo "ERROR: Imposible ejecutar la consulta en la tabla $tabla.<br>\n";
				}
				else{
					$numeroregistros=mysqli_num_rows($resultado);
					if($numeroregistros>0){ // Si se encontr� al menos un usuario con esa clave.
						$fila=mysqli_fetch_array($resultado); // Obtenemos el registro (la fila) de la tabla con los datos del usuario.
						if(!$fila) // Si no pudo conseguirse la fila...
						{
							echo "ERROR: Imposible obtener los datos guardados del usuario encontrado<br>\n";
						}
						else
						{	// Establecemos las variables de sesi�n usuario y tipo al nombre y tipo del usuario encontrado.
							$_SESSION['tipo']=$fila['tipo'];
							$_SESSION['usuario']=$fila['usuario'];
							echo "Usuario encontrado con tipo: " . $_SESSION['tipo'] . "<br>\n";
						}
					}
					else
					{
						echo "Usuario no encontrado<br>\n";
					}
				}
			}
			mysqli_close($conexion); // Debe cerrarse la conexi�n, que todav�a sigue abierta.
		} // Si alg�n campo no est� relleno: no hace nada. Pues los invitados no los rellenar�n. No debe mostrar mensajes de error aqu�.
} // Si no recibe los campos de index.php: no hace nada.


// En la cabecera de cada p�gina informaremos del usuario y su tipo:
echo "<br><br>Usuario: " . $_SESSION['usuario'] . " - Tipo: " . $_SESSION['tipo'] . "<br>\n";


// Datos generales para la aplicaci�n web:
$servidor="127.0.0.1"; // "localhost"
$usuario_bd="root"; // Usuario Administrador de MySQL
$clave_bd=""; // Clave del Usuario Administrador de MySQL
$basedatos="anuncios";
$tabla="tablon";

$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd, $basedatos);
if (! $conexion){
	echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
}
else{
	    $sql = "SELECT * FROM $tabla WHERE prescrito='N';";
		
		$resultado = mysqli_query($conexion, $sql);
		if(!$resultado){
			echo "ERROR: Imposible consultar los datos en la tabla $tabla.<br>\n";
		}
		else{
		 	$numeroregistros=mysqli_num_rows($resultado);

		 	echo "SE ENCONTRARON $numeroregistros ANUNCIOS NO PRESCRITOS:<br>\n";
			// Mostraremos los datos: Si no hubiese registros ni siquiera entrar�a en el bucle while.
			while($fila=mysqli_fetch_array($resultado))
			{
					
				echo "<hr>\n";
				echo "<b>Id: </b>" . $fila['id'];
				
				// Si es administrador o usuario registrado...
				if($_SESSION['tipo']=='administrador' || $_SESSION['tipo']=='registrado')
				{
					echo " <b>Usuario: </b>" . $fila['usuario']; // Mostrar el autor de la opini�n.
				}
				
				echo " <b>Fecha y Hora: </b>" . $fila['fechahora'] . 
					"<br>\n<b>Anuncio:</b><br>\n" . nl2br($fila['mensaje']);

				$id=$fila['id'];
				if($_SESSION['tipo']=='administrador') // Si es administrador...
				{
				 	// En el enlace enviamos el id por el m�todo GET a la p�gina eliminar.php.
					$enlace="prescribir.php?id=$id";
				 	echo "<br><a href='$enlace'>Prescribir</a>"; // Mostrar el enlace Eliminar.
				}
				echo "<hr>\n";
			}
		}
	mysqli_close($conexion); // Debe cerrarse la conexi�n, que todav�a sigue abierta.
}		
?>

<br><a href='index.php'>Cambiar de usuario</a>

</body></html>
