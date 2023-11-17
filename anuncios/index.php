<?php
session_start(); // Usaremos sesiones.

// Si todav�a no est�n establecidas las variables de sesi�n obligatorias...
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo'])) {
    $_SESSION['usuario'] = "anonimo";
    $_SESSION['tipo'] = "invitado"; // En principio todos son usuarios invitados.
}
// En la cabecera de cada p�gina informaremos del usuario y su tipo:
echo "<br><br>Usuario: " . $_SESSION['usuario'] . " - Tipo: " . $_SESSION['tipo'] . "<br>\n";
?>

<html>

<head>
    <title>ANUNCIOS - Inicio de Sesion</title>
</head>

<body>

  <form method="POST" action="tablon.php">
    Nombre de Usuario: <input type="text" name="usuario"><br>
    Password: <input type="password" name="clave"><br>
    <input type="submit" value="Entrar">
  </form>

</body>

</html>