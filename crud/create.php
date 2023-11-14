<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php 
    $id = $_POST['id_alumne'];
    $name = $_POST['nom'];
    $adre = $_POST['adre'];
    $grup = $_POST['grup'];
    
    require_once "connection.php";
    
    $stmt = mysqli_prepare($connection, "INSERT INTO alumne (id_alumne, nom, adre, grup) VALUES (?,?,?,?) ");

    mysqli_stmt_bind_param($stmt, "issi", $id, $name, $adre, $grup);
    
    mysqli_stmt_execute($stmt);
    
    echo "<p>Alumno añadido correctamente</p>";    
  ?>
  <a href="index.php">Inicio</a>
</body>
</html>

