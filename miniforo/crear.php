<?php

require_once "../utils/database/set-connection.php";
require_once "../utils/database/execute-sql.php";

// Importar mis librerias
require_once "../utils/database/create.php";

// Definir la estructura de las tablas y los datos para insertar
$tablas = [
  "usuarios" => [
    "estructura" => [
      "usuario VARCHAR(20) PRIMARY KEY NOT NULL",
      "clave VARCHAR(20) NOT NULL",
      "tipo VARCHAR(20) NOT NULL"
    ],
    "registros" => [
      ["admin", "admin", "administrador"],
      ["usuario", "usuario", "registrado"],
      ["invitado", "invitado", "invitado"],
    ],
  ],
  "mensajes" => [
    "estructura" => [
      "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL",
      "usuario VARCHAR(20) NOT NULL",
      "fechahora DATETIME NOT NULL",
      "tema VARCHAR(50) NOT NULL",
      "mensaje TEXT NOT NULL",
      "FOREIGN KEY (usuario) REFERENCES usuarios(usuario)"
    ],
    "registros" => [
      [null, "admin", "2007-12-31 15:50:55", "Bienvenidos", "Un saludo"],
    ],
  ],
];

createDB("miniforo", $tablas);
?>