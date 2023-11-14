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

        .mb-1 {
          margin-bottom: 1em;
        }
    </style>
</head>
<body>
  <h2>EDITAR ALUMNO</h2>
  <?php
    require_once "connection.php";

    $id = $_GET['id'];

    $stmt = mysqli_prepare($connection, "SELECT * FROM alumne WHERE id_alumne = ?");    
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $id = $row["id_alumne"];
        $nom = $row["nom"];
        $adre = $row["adre"];
        $my_grup = $row["grup"];
      }      
?> 

<form action="update.php" method="post" class="mb-1">
      <ul>
        <li>                    
          <label for="">Id alumne: </label>          
          <?php echo '<input type="text" name="id_alumne" value="'.$id.'" required>';?>                    
        </li>
        <li>
          <label for="">Nom: </label>
          <?php echo '<input type="text" name="nom" value="'.$nom.'" required>';?>
        </li>
        <li>
          <label for="">Adressa: </label>
          <?php echo '<input type="text" name="adre" value="'.$adre.'" required>';?>
        </li>
        <li>
          <label for="">Grup: </label>
          <?php
            $result = mysqli_query($connection, "SELECT grup FROM alumne GROUP BY grup");
          
            if($result){
              echo '<select name="grup">';

              while($row = $result->fetch_assoc()){                
                $grup = $row["grup"];
                
                if($grup == $my_grup){
                  echo '<option value="'. $grup .'" selected>';
                  echo "$grup";
                  echo '</option>';
                } 
                else {
                  echo '<option value="'. $grup .'">';
                  echo "$grup";
                  echo '</option>';
                }               
              }              
              echo '</select>';
            }
          ?>                   
        </li>
      </ul>
      <input type="submit" value="Actualizar">
    </form>
    <a href="index.php">Inicio</a>
</body>
</html>