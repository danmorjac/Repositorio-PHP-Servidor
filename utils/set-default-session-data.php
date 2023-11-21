<?php
session_start(); // Usaremos sesiones.

if (isset($_GET['reset'])) {
  $_SESSION = array();
}

// Si todavia no estan establecidas las variables de sesion obligatorias...
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo'])) {
  $_SESSION['usuario'] = "anonimo";
  $_SESSION['tipo'] = "invitado"; // En principio todos son usuarios invitados.
}
?>