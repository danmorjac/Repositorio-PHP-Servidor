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
    $id = $_GET["id"];

    if(isset($id)){
      require_once "connection.php";

      $stmt = mysqli_prepare($connection, "DELETE FROM alumne WHERE id_alumne = ?");
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
    }    
  ?>
  <p>Alumno borrado correctamente</p>
  <a href="index.php">Inicio</a>
</body>
</html>

