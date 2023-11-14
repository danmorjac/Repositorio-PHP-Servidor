<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $id = $_POST['id_alumne'];
        $name = $_POST['nom'];
        $adre = $_POST['adre'];
        $grup = $_POST['grup'];
        
        require_once "connection.php";
        
        $stmt = mysqli_prepare($connection, "UPDATE alumne SET id_alumne = ?, nom = ?, adre = ?, grup = ? WHERE id_alumne = ?");

        mysqli_stmt_bind_param($stmt, "issii", $id, $name, $adre, $grup, $id);
        
        mysqli_stmt_execute($stmt);
        
        echo "<p>Alumno actualizado correctamente</p>";        
    ?>
    <a href="index.php">Inicio</a>
</body>
</html>