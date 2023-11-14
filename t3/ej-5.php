<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Calculadora Simple</h1>
    
    <form action="resultadoPOST.php" method="POST">
        <label for="operando1">Operando 1:</label>
        <input type="number" id="operando1" name="operando1" required><br><br>

        <label for="operando2">Operando 2:</label>
        <input type="number" id="operando2" name="operando2" required><br><br>

        <label for="operador">Operador:</label>
        <select id="operador" name="operador">
            <option value="+">Suma (+)</option>
            <option value="-">Resta (-)</option>
            <option value="*">Multiplicación (*)</option>
            <option value="/">División (/)</option>
        </select><br><br>

        <input type="submit" value="Calcular">
    </form>

</body>

</html>