<?php
// Archivo php para el administrador para crear la base de datos necesaria
// y las tablas, con los campos requeridos.

// Importar mis librerias
require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";

function createDB($dbName, $tablas) {
  // Establecer la conexion con MySQL
  echo "Conectando con la base de datos \"$dbName\"...<br>\n";
  $conexion = setConnection($dbName);
  echo "Conexion con \"$dbName\" establecida.<br><br>\n";

  // Procesar cada tabla
  foreach ($tablas as $nombreTabla => $infoTabla) {
    // Crear Tabla
    echo "Creando la tabla \"$nombreTabla\"...<br>\n";
    executeSQL(
      $conexion,
      "CREATE TABLE IF NOT EXISTS $nombreTabla"
      . "(" . implode(",", $infoTabla["estructura"]) . ")",
      $nombreTabla
    );
    echo "Tabla \"$nombreTabla\" creada.<br>\n";

    /*
    Procesar cada fila de "registros":
    - Convertir valores, aplicar comillas y tratar 'NULL' como NULL
    */
    $registros = []; // Reinicializar el array
    foreach ($infoTabla['registros'] as $registro) {
      $registro = array_map(fn($value) =>
        ($value === null) ? 'NULL'
        : "'" . mysqli_real_escape_string($conexion, $value) . "'", $registro);

      $registros[] = '(' . implode(',', $registro) . ')';
    }

    // Insertar datos en la tabla
    echo "Insertando datos en \"$nombreTabla\"...<br>\n";
    executeSQL(
      $conexion,
      "INSERT INTO $nombreTabla VALUES " . implode(',', $registros),
      $nombreTabla
    );
    echo "Datos añadidos a \"$nombreTabla\".<br><br>\n";
  }

  // Cerrar la conexión con el servidor
  echo "Cerrando la conexión con el servidor...<br>\n";
  mysqli_close($conexion);

  echo "Fin del programa.<br>\n";
}
?>