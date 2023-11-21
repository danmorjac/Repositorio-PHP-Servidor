<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Borrar coche</title>
</head>

<body>
	<?php

	require_once "../utils/database/set-connection.php";
	require_once "../utils/database/execute-sql.php";

	$id = $_GET['id'];
	$sql = "DELETE FROM $tabla WHERE id='$id';";

	$conexion = setConnection('concesionario');

	$resultado = executeSQL($conexion, $sql, $tabla);

	echo "Coche $id eliminado<br>\n";

	mysqli_close($conexion);

	echo "<br><br><a href='index.php'>Volver al índice</a>";
	?>
</body>

</html>