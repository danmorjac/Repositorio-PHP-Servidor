<html>

<head>
	<title>
		Ejemplo de Consulta a una base de datos en PHP
	</title>
</head>

<body>
	<h1>Ejemplo de Consulta a una base de datos en PHP</h1>
	<table border="1">
		<tr>
			<td>id_alumne</td>
			<td>Nom</td>
			<td>Adre</td>
			<td>Grup</td>
		</tr>
		<?php
		// Nos conectamos a mysql con el nombre de usuario y contrase�a correspondiente
		$servidor = "localhost";
		$usuari = "root";
		$password = "";
		$bdd = "institut";
		$link = mysqli_connect($servidor, $usuari, $password, $bdd);
		// Si no se conecta a la base de datos, se debe lanzar un error
		if (!$link) {
			echo "No pudo conectarse a la BD: " . mysqli_error();
		} else {
			// Seleccionamos todos los campos de la tabla Alumnos
			$sentencia = "SELECT * FROM alumne";
			$result = mysqli_query($link, $sentencia);
		}
		;
		if (!$result) {

			echo "�No existe el alumno!";
		} else {

			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["id_alumne"] . "</td>";
				echo "<td>" . $row["nom"] . "</td>";
				echo "<td>" . $row["adre"] . "</td>";
				echo "<td>" . $row["grup"] . "</td>";
				echo "</tr>";
			}
		}
		//mysql_free_result($result);
		mysqli_close($link);
		?>
	</table>
</body>

</html>