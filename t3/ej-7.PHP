<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Verificar si se han enviado los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Recuperar los valores del formulario
        $operando1Str = $_GET["operando1"];
        $operando2Str = $_GET["operando2"];
        $operador = $_GET["operador"];

        // Convertir los operandos a números
        $operando1 = doubleval($operando1Str);
        $operando2 = doubleval($operando2Str);

        // Realizar la operación según el operador
        $resultado = 0;

        // Realizar la operación según el operador seleccionado
        switch ($operador) {
            case "+":
                $resultado = $operando1 + $operando2;
                break;
            case "-":
                $resultado = $operando1 - $operando2;
                break;
            case "*":
                $resultado = $operando1 * $operando2;
                break;
            case "/":
                // Verificar si el segundo operando es cero para evitar la división por cero
                if ($operando2 != 0) {
                    $resultado = $operando1 / $operando2;
                } else {
                    $resultado = "Error: División por cero";
                }
                break;
            default:
                $resultado = "Operador no válido";
        }

        // Mostrar el resultado
        echo "Resultado: $resultado";
    } else {
        echo "No se han enviado datos del formulario.";
    }
    ?>

</body>

</html>