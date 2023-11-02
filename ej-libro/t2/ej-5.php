<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $temporal = "Juan";
    echo "El tipo de la variable \$temporal con valor $temporal es: " . gettype($temporal) . ".<br/>\n";
    $temporal = 3.14;
    echo "El tipo de la variable \$temporal con valor $temporal es: " . gettype($temporal) . ".<br/>\n";
    $temporal = false;
    echo "El tipo de la variable \$temporal con valor $temporal es: " . gettype($temporal) . ".<br/>\n";
    $temporal = 3;
    echo "El tipo de la variable \$temporal con valor $temporal es: " . gettype($temporal) . ".<br/>\n";
    $temporal = null;
    echo "El tipo de la variable \$temporal con valor $temporal es: " . gettype($temporal) . ".<br/>\n";
    ?>
</body>

</html>