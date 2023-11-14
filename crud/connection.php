<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "institut";

  $connection = mysqli_connect($server, $username, $password, $db); 

  if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>