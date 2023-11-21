<?php
// perform-sql.php
function executeSQL($conexion, $sql, $tabla) {
  $resultado = mysqli_query($conexion, $sql);
  if (!$resultado) {
    die("ERROR: Imposible ejecutar la consulta en la tabla $tabla.<br>\n");
  }

  return $resultado;
}
?>