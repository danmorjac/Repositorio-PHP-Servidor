<?php
session_start(); // Usaremos sesiones.

$brevedescripcion="Comprobacion del Inicio de Sesion";
$indicaciones="Autentificacion de la identidad del usuario";
include("cabecera.inc.php");
?>
<?php
if (isset($_POST['usuario']) && isset($_POST['clave'])) { 
	
	$_SESSION['usuario']=$_POST['usuario'];
	$_SESSION['tipo']='invitado'; // En principio todos son usuarios invitados.
	// No es necesario almacenar la clave en una variable de sesión.
	
	echo "AUTENTIFICACION DEL USUARIO:<br>\n";
	echo "Nuevo nombre de usuario: <b>" . $_SESSION['usuario'] . "</b><br>\n";
	
	include("datos.php");
	
	$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
	if (! $conexion){
		echo "ERROR: Imposible establecer conexion con el servidor.<br>\n";
	}else{
		$resultado=mysqli_select_db($conexion, $basedatos);
		if (! $resultado){
			echo "ERROR: Imposible seleccionar la base de datos.<br>\n";
		}else{
			$sql = "SELECT * FROM $tabla1 WHERE (usuario='".$_POST['usuario']."'";
			$sql.= " and clave='".$_POST['clave']."');";
			//echo "<br>$sql<br>";
			
			$resultado = mysqli_query($conexion, $sql);
			if(!$resultado){ // Si no pudo realizarse la consulta
				echo "ERROR: Imposible ejecutar la consulta.<br>\n";
			}
			else{
				$numeroregistros=mysqli_num_rows($resultado);
				if($numeroregistros<1){ // Si no se encontró un usuario con esa clave.
					echo "ERROR: Usuario no registrado o clave incorrecta.<br>\n";
					echo "<a href='index.php'>Volver a intentarlo</a><br>\n";
				}
				else{ 
				 	// Usuario encontrado con clave correcta en tabla de administradores...
					$_SESSION['tipo']="administrador"; // Le asignamos su tipo real.
					echo "Nuevo tipo del usuario: <b>".$_SESSION['tipo'] . "</b><br>\n";
				}

				echo "<br><a href='catalogo.php'>Ver el catalogo de articulos</a><br>\n";
			}		
		}
		mysqli_close($conexion);
	}
}else{
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
} 
?>
<?
include("pie.inc.php");
?>

