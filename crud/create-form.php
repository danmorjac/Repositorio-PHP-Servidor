<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
        label {
            display: inline-block;
            width: 70px;
            text-align: right;
        }
    </style>
</head>
<body>
  <h2>AÑADIR ALUMNO</h2>
    <form action="create.php" method="post">
      <ul>
        <li>                    
          <label for="">Id alumne: </label>
          <input type="text" name="id_alumne" required>                    
        </li>
        <li>
          <label for="">Nom: </label>
          <input type="text" name="nom" required>
        </li>
        <li>
          <label for="">Adressa: </label>
          <input type="text" name="adre" required>
        </li>
        <li>
          <label for="">Grup: </label>
          <?php
            require_once "connection.php";

            $result = mysqli_query($connection, "SELECT grup FROM alumne GROUP BY grup");
          
            if($result){
              echo '<select name="grup">';

              while($row = $result->fetch_assoc()){
                $grup = $row["grup"];
                echo '<option value="'. $grup .'">';
                echo "$grup";
                echo '</option>';
              }              
              echo '</select>';
            }
          ?>          
        </li>
      </ul>
      <input type="submit" value="Añadir">
    </form>
</body>
</html>