<?php
// En el pie de cada pagina informaremos del usuario, su tipo y permisos:
$userData = "Bienvenido: <b>". $_SESSION['usuario'].
  "</b> - Tipo de usuario: <b>" . $_SESSION['tipo'] . "</b>";

echo "<p>$userData</p>";

$userPermissions = ($_SESSION['tipo'] != "administrador")
  ? "Al ser invitado, unicamente puede consultar"
  : "Al ser administrador, puede consultar y eliminar";

echo "<p>$userPermissions</p>";
?>