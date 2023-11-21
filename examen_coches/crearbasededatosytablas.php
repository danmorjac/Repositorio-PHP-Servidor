<?php
// Importar mis librerias
require_once "../utils/database/create.php";

// Definir la estructura de las tablas y los datos para insertar
$tablas = [
  "coches" => [
    "estructura" => [
      "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL",
      "marca VARCHAR(20) NOT NULL",
      "modelo VARCHAR(20) NOT NULL",
      "foto VARBINARY(255) NOT NULL"
    ],
    "registros" => [
      [null,'Fiat', 'Fiat 500', 'fiat.jpg'],
      [null,'Kia', 'Kia Niro', 'kia.jpg']
    ],
  ],
];

createDB("concesionario", $tablas);
?>