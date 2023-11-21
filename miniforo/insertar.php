<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";


session_start(); // Usaremos sesiones.

$brevedescripcion="Insertar Mensaje nuevo";
$indicaciones="Introduzca los datos del nuevo mensaje y pulse Guardar";
include("cabecera.inc.php");
?>
<?php 
if (isset($_SESSION['usuario']) && isset($_SESSION['clave']) && isset($_SESSION['tipo'])){
 
	echo "<br>Usuario: <b>".$_SESSION['usuario']."</b> (".$_SESSION['tipo'].").<br>\n";

	if($_SESSION['tipo']=='administrador' or $_SESSION['tipo']=='registrado'){
		echo "<form method='POST' action='comprobarinsertar.php'>";
		echo "Tema: <input type='text' name='tema'><br>\n";
		echo "Mensaje:<br>\n<textarea name='mensaje' rows='5' cols='50'></textarea><br>";
		echo "<input type='submit' value='Guardar' name='comprobarinsertar'>";
		echo "</form>";
		
		echo"<a href='foro.php'>Volver al Foro</a><br>\n";
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
