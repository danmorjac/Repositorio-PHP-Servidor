<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Institut</title>
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

        .d-flex{
          display: flex;
        }
    </style>
</head>
<body>
  <div class="mb-1 d-flex">    
    <form action="read.php" method="get" class="mr-1">
          <input type="search" name="id">
          <input type="submit" value="Buscar">
    </form>
    <a href="create-form.php">Añadir alumno</a>
  </div>
  
  <?php
    require_once "connection.php";

    $result = mysqli_query($connection, "SELECT * FROM alumne");
  ?>    
    <table>
        <tr>
          <th>id_alumne</th>
          <th>Nom</th>
          <th>Adre</th>
          <th>Grup</th>
        </tr>
  <?php                
        if($result){
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
        }
    echo "</table>";
  ?>
</body>
</html>