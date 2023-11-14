<html>
<head><title>Guardar Libros</title></head>
<body>
<?php
if(isset($_POST['titulo']) && isset($_POST['tipo']) && isset($_POST['observaciones']))
{
	$fichero=fopen("libros.txt","a");
	if($fichero)
	{
	 	$cadena  = "Titulo: " . $_POST['titulo'] . "\r\n";
		$cadena .= "Tipo: " . $_POST['tipo'] . "\r\n";
		$cadena .= "Observaciones: " . $_POST['observaciones'] . "\r\n";
		fputs($fichero, $cadena);
		fclose($fichero);
		echo "Datos guardados satisfactoriamente<br>\n";
	}
	else
	{
		echo "Imposible guardar los datos<br>\n";
	}
}
else
{
	echo "Faltan datos. Acceda a esta página desde el formulario<br>\n";
}
?>
<br>
<a href="libros.html">Volver</a>
</body>
</html>

