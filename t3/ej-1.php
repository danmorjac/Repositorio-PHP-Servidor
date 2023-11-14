<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $resultadophp=0;

    for ($i=10; $i <= 100 ; $i++) { 

        if($i%2==0){$resultado=$resultado+$i;}
    }
    echo "El resultado de la suma de los numeros pares de 10 a 100 es:" ,$resultado;

    ?>
</body>
</html>