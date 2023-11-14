<?php
//Activo la sesi�n en PHP
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Capitulo 5. Ejercicio 5.1</title>
    <link href="ex1_t5.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>
        Ejemplo de Soluci&Oacute;n - Ejercicio 5.1
    </h1>
    <p>
        <strong>
            Formulario de Petici&oacute;n de Datos
        </strong>
    </p>
    <form name="formularioEjemplo" method="post" action="ex12_t5.php">
        <p>Datos de Usuario Solicitados </p>
        <p>Nombre:
            <input name="txtNombreUsr" type="text" id="txtNombreUsr">
        </p>
        <p>Apellido :
            <input name="txtApellidoUsr" type="password" id="txtApellidoUsr">
        </p>
        <p>
            <input type="submit" name="submit" value="Enviar">
        </p>
    </form>
</body>

</html>