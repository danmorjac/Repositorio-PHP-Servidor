<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
 // page1.php
 session_start();
 echo 'Bienvenido a la página #1';
 // El formato para inicializar una variable de sesión es:
 //$_SESSION[‘nombre_var_sesión’] = ‘Valor de la variable’;
 $_SESSION['favcolor'] = 'verde';
 $_SESSION['animal'] = 'gato';
 $_SESSION['time'] = time();
 // Esta sesión opera si la cookie es aceptada
 echo '<br /><a href="page2.php">página 2</a>';
 // O puede ser que la sesión ID sea necesaria
 echo '<br /><a href="page2.php?' . SID . '">página 2</a>';
?>

</body>
</html>