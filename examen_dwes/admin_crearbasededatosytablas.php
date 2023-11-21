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
      [null, 'Ford', 'Ford Fiesta', 'ford.jpg'],
      [null, 'Volvo', 'Volvo S40', 'https://quickbutik.imgix.net/13175t/products/5def9ad1dc540.jpeg?w=500&h=500&auto=format']
    ],
  ],
];

createDB("concesionario", $tablas);
?>