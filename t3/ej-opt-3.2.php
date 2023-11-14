<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $codigo = 1;

    switch ($codigo) {
        case 0:
            echo "Has seleccionado el 0";
            break;
        case 1:
            echo "Has seleccionado el 1";
            break;
        case 2:
            echo "Has seleccionado el 2";
            break;
        case 3:
            echo "Has seleccionado el 3";
            break;
        default:
            echo  $codigo;
    }

    ?>
</body>

</html>