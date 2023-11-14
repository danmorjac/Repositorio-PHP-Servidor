<html>
<head><title>Guardar Libros</title></head>
<body>
<?php
	$fichero=fopen("libros.txt","r");
	if($fichero)
	{
		while(!feof($fichero))
	 	{
	 	 	$texto = fread($fichero, 30); // Leeremos de 30 en 30 bytes.
	 	 	$texto = nl2br($texto);
	 	 	echo $texto;
		}
		fclose($fichero);
		echo "<br><br>Datos mostrados satisfactoriamente<br>\n";
	}
	else
	{
		echo "Imposible guardar los datos<br>\n";
	}
?>
<br>
<a href="libros.html">Volver</a>
</body>
</html>

