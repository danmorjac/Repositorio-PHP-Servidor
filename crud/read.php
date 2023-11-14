<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
        th, td, table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.5em;
            text-align: center;
        }

        .mb-1 {
          margin-bottom: 1em;
        }

        .mr-1 {
          margin-right: 1em;
        }
    </style>
</head>
<body>
<?php
  $id = $_GET['id'];

  if(isset($id)){
    require_once "connection.php";

    $stmt = mysqli_prepare($connection, "SELECT * FROM alumne WHERE id_alumne = ?");    
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
  }
?>        
  <table class="mb-1">
    <tr>
      <th>id_alumne</th>
      <th>Nom</th>
      <th>Adre</th>
      <th>Grup</th>    
    </tr>
  <?php                
    while($row = $result->fetch_assoc()) {
      $id = $row["id_alumne"];
      $nom = $row["nom"];
      $adre = $row["adre"];
      $grup = $row["grup"];

      echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$nom</td>";
        echo "<td>$adre</td>";
        echo "<td>$grup</td>";
        echo "<td>";               
          echo '<a href="read.php?id='. $id .'" class="mr-1">Abrir</a>';            
          echo '<a href="update-form.php?id='. $id .'" class="mr-1">Actualizar</a>';
          echo '<a href="delete.php?id='. $id .'" class="mr-1">Borrar</a>';
        echo "</td>";              
      echo "</tr>";
    }  
  ?>                
  </table>
    <a href="index.php">Inicio</a>
</body>
</html>
