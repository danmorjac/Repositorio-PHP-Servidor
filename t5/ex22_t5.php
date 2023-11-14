<?php
//Leo el valor de la variable
$value = $_POST['txtNombreUsr'];
//Incializo la cookie con el valor tra�do
$_COOKIE['CookieUsuario'] = $value;
//echo "valor ".$value;
//echo "cookie ".$_COOKIE['CookieUsuario'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>
		Cap&iacute;tulo 5. Actividad 5.2 � Respuesta
	</title>
	<link href="ex1_t5.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php
	//Leo si la cookie existe o no.
	if (empty($_COOKIE['CookieUsuario'])) {
		//NO ENCUENTRA la cookie creada. Se muestra un mensaje diciendo que no tiene permiso deingresar a la p�gina.
		?>
		<br />
		<h2>Mensaje de Rechazo </h2>
		<br />
		Lo siento, NO hemos encontrado registro de su
		nombre. Por favor vuelva a la p&aacute;gina principal
		e ingrese un nombre de usuario y apellido.
		<br /><br />
		<a href="ex2_t5.php">
			&lt;&lt; Volver a p&aacute;gina de Inicio
		</a>
		<?php
	} else {
		//SI ENCUENTRA la variable de sesi�n nombre_usuario. Se muestra un mensaje de bienvenida.
		?>
		<br />
		<h2>Mensaje de Aceptaci&oacute;n</h2>
		<br />
		Se ha podido comprobar que ya nos ha
		proporcionado un nombre y un apellido de
		usuario. <br /><br />
		Bienvenido
		<?php
		echo $_COOKIE['CookieUsuario'];
		//Vac�o la cookie
		setcookie('CookieUsuario');
	}
	?>
</body>

</html>