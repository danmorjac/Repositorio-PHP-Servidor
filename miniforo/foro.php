<?php
session_start(); // Usaremos sesiones.

$brevedescripcion="Foro de mensajes";
$indicaciones="Consulta e insercion de mensajes";
include("cabecera.inc.php");
?>
<?php
if (isset($_SESSION['usuario']) && isset($_SESSION['clave']) && isset($_SESSION['tipo'])){
 
	echo "<br>Usuario: <b>".$_SESSION['usuario']."</b> (".$_SESSION['tipo'].").<br>\n";
	
	if($_SESSION['tipo']=='administrador' or $_SESSION['tipo']=='registrado'){ 
		
		include("datos.php");
		$tabla="mensajes";
		
		$sql = "SELECT * FROM $tabla;";
		//echo "<br>$sql<br>";
		
		$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
		if (! $conexion){
			echo "ERROR: Imposible establecer conexi�n con el servidor $servidor.<br>\n";
		}
		else{
			$resultado=mysqli_select_db($conexion, $basedatos);
			if (! $resultado){
				echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
			}
			else{
				
				$resultado = mysqli_query($conexion, $sql);
				if(!$resultado){
					echo "ERROR: Imposible consultar los mensajes.<br>\n";
				}
				else{
				 	$numeroregistros=mysqli_num_rows($resultado);

					echo "SE ENCONTRARON $numeroregistros MENSAJES EN EL FORO:<br>";

					
					while($fila=mysqli_fetch_array($resultado)){
					 
					 	// Separamos la fecha de la hora (mediante el espacio intermedio).
					 	// La fecha est� en formato a�o-mes-d�a (mal), la hora est� bien.
					 	$vectorfechahora=explode(" ",$fila['fechahora']);
					 	// $vectorfechahora[0] tiene la fecha y $vectorfechahora[1] la hora.
					 	// Dentro de la fecha, separamos el a�o, mes y d�a (por el gui�n).
					 	$vectorfecha=explode("-",$vectorfechahora[0]);
					 	// Reconstruimos la cadena: "d�a-mes-a�o hora:minutos:segundos"
					 	$fechahoracorrectas=$vectorfecha[2]."-".$vectorfecha[1]."-".
							$vectorfecha[0]." ".$vectorfechahora[1];
							
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
						
						if($_SESSION['tipo']=='administrador'){
						 	echo "<br><a href='comprobareliminar.php?id=" . 
								$fila['id'] . "'>Eliminar</a>";
						}
						echo "<hr>\n";
					}
				}
			}
			mysqli_close($conexion);
		}		

		echo"<a href='insertar.php'>Insertar nuevo mensaje</a><br>\n";
		echo"<a href='index.php'>Cambiar de usuario</a><br>\n";
	}
	else {
		echo "<a href='index.php'>" .
			"Inicie una sesion primero como usuario registrado o administrador.</a><br>\n";
	}	
} 
else {
	echo "<a href='index.php'>Inicie una sesion primero.</a><br>\n";
}
?>
</body></html>
