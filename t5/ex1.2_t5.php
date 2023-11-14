<?php
//Activo la sesi�n en PHP
session_start();
$_SESSION = array();
?>
<?php
if (isset($_POST['submit'])) {
	//Extraigo los datos de la variable POST y los pongo como datos de sesi�n.
	$_SESSION['nombre_usuario'] = $_POST['txtNombreUsr'];
	$_SESSION['apellido_usuario'] = $_POST['txtApellidoUsr'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN� �http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>
		Capitulo 5. Ejercicio 5.1 � Respuesta
	</title>
	<link href="ex1_t5.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php
	if (empty($_SESSION['nombre_usuario'])) {
		//NO ENCUENTRA la variable de sesi�n nombre_usuario, se muestra un mensaje
		//diciendo que no tiene permiso de ingresar a la p�gina.
		?>
		<br />
		<h2>Mensaje de Rechazo </h2>
		<br />
		Lo siento, NO tiene privilegios para entrar en
		esta pagina, por favor vuelva a la pagina
		principal e ingrese un nombre de usuario y
		apellido.
		<br /><br />
		<a href="ex1_t5.php"> &lt;&lt; Volver a pagina de Inicio
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
		Bienvenido <br />
		<a href="ex13_t5.php"> &lt;&lt; Comprueba tus datos
		</a>
		<?php
	}
	?>
</body>

</html>