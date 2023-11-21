<?php
function setConnection($dbName) {
  // Datos generales para la aplicación web:
  $server = "127.0.0.1"; // "localhost"
  $username = "root"; // Usuario Administrador de MySQL
  $password = ""; // Clave del Usuario Administrador de MySQL
  
  // Conecta con la base de datos. Para el script si hay un error.
  $conexion = mysqli_connect($server, $username, $password);
  if (!$conexion) {
    die("ERROR: Imposible establecer conexión con el server $server.<br>\n");
  }
  
  // Create DB if not exists
  $resultado = mysqli_query($conexion,
    "CREATE DATABASE IF NOT EXISTS $dbName");
  
  // Selecciona la base de datos. Para el script si hay un error.
  $resultado = mysqli_select_db($conexion, $dbName);
  if (!$resultado) {
    die("ERROR: Imposible seleccionar la base de datos $dbName.<br>");
  }

  return $conexion;
}
?>