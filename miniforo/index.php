<?php
session_start(); // Usaremos sesiones.

$brevedescripcion="Inicio de Sesion";
$indicaciones="Introduzca su nombre de usuario y su password";
include("cabecera.inc.php");
?>

<form method="POST" action="comprobarlogin.php">
  Nombre de Usuario: <input type="text" name="usuario"><br>
  Password: <input type="password" name="clave"><br>
  <input type="submit" value="Aceptar" name="comprobarlogin">
</form>

</body></html>