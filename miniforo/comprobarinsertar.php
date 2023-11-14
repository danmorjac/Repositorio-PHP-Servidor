<?php
session_start(); // Usaremos sesiones.

$brevedescripcion="Insercion de un mensaje nuevo";
$indicaciones="Comprobacion de insercion correcta de un mensaje nuevo";
include("cabecera.inc.php");
?>
<?php
if (isset($_POST['tema']) and isset($_POST['mensaje']) and 
	isset($_SESSION['usuario']) && isset($_SESSION['clave']) && isset($_SESSION['tipo'])){
	 
	echo "<br>Usuario: <b>".$_SESSION['usuario']."</b> (".$_SESSION['tipo'].").<br>\n";

	if($_SESSION['tipo']=='administrador' or $_SESSION['tipo']=='registrado'){ 
		// Si es un administrador o usuario podrá insertar.
		
		include("datos.php");
		$tabla="mensajes";

		$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
		if (! $conexion){
			echo "ERROR: Imposible establecer conexión con el servidor $servidor.<br>\n";
		}else{
			$resultado=mysqli_select_db($conexion, $basedatos);
			if (! $resultado){
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			}else{
			 
				//$fechahoraactual = date("d/m/Y h:i:s"); en formato español
				$fechahoraactual = date("Y/m/d h:i:s"); // en formato campo MySQL
				
				$sql = "INSERT INTO $tabla VALUES(" .
					"NULL, '" .
					$_SESSION['usuario'] . "','" .
					$fechahoraactual . "','" .
					$_POST['tema'] . "','" . 
					$_POST['mensaje']."');";
					
				echo "<br>Mensaje insertado<br>\n";
				$resultado = mysqli_query($conexion, $sql);
				// Si no pudo realizarse la inserción...
				if(!$resultado){
					echo "ERROR: Imposible insertar el mensaje nuevo.<br>";
				}
				else{
					echo "Mensaje nuevo guardado con exito:<br>\n";
				}
			}
			mysqli_close($conexion); 
		}
		echo"<a href='foro.php'>Volver al Foro</a><br>\n";
		echo"<a href='index.php'>Cambiar de usuario</a><br>\n";	
	}
	else{
		echo "<a href='index.php'>" .
			"Inicie una sesion primero como usuario registrado o administrador</a><br>\n";
	}
} 
else {
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
}
?>
</body></html>
