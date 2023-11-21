<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar - Inmobiliaria</title>
</head>

<body>
	<?php

	require_once "../utils/database/set-connection.php";
	require_once "../utils/database/execute-sql.php";

	$tabla = "coches";

	$id = $_GET['id'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$foto = $_POST['foto'];

	$sql = "UPDATE $tabla SET marca = '$marca', modelo = '$modelo', foto='$foto' WHERE id='$id';";

	$conexion = setConnection('concesionario');

	$resultado = executeSQL($conexion, $sql, $tabla);

	echo "Datos del coche con marca " . $marca . " cambiada.";

	mysqli_close($conexion);

	echo "<br><br><a href='index.php'>Volver a la página de búsqueda</a>";
	?>
</body>

</html>