<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $operador1 = 13;
    $operador2 = 4;


    print "Suma: <br/>";

    $resultado = $operador1 + $operador2;
    echo "$operador1 + $operador2 = $resultado<br/>";

    print "Resta: <br/>";

    $resultado = $operador1 - $operador2;
    echo "$operador1 - $operador2 = $resultado<br/>";

    print "Multiplicacion: <br/>";

    $resultado = $operador1 * $operador2;
    echo "$operador1 * $operador2 = $resultado<br/>";

    print "Division entera: <br/>";

    $resultado = $operador1 / $operador2;
    echo "$operador1 / $operador2 = $resultado<br/>";

    print "Resto(modulo) de la division entera: <br/>";

    $resultado = $operador1 % $operador2;
    echo "$operador1 % $operador2 = $resultado<br/>";
    ?>
</body>

</html>