<?php
// Datos generales para la aplicación web:
$servidor="127.0.0.1"; // "localhost"
$usuario_bd="root"; // Usuario Administrador de MySQL
$clave_bd=""; // Clave del Usuario Administrador de MySQL
$basedatos="inmobiliaria";
$tabla="ofertas";

$sql_crearbasedatos = "CREATE DATABASE $basedatos";

$sql_creartabla = "CREATE TABLE $tabla(";
$sql_creartabla.= "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,"; 
$sql_creartabla.= "tipo VARCHAR(20) NOT NULL,"; 
$sql_creartabla.= "descripcion VARCHAR(600) NOT NULL,";
$sql_creartabla.= "direccion VARCHAR(50) NOT NULL,";
$sql_creartabla.= "Venta_Alquiler VARCHAR(20) NOT NULL,"; 
$sql_creartabla.= "precio_venta VARCHAR(20) NOT NULL,";
$sql_creartabla.= "precio_alquiler VARCHAR(20) NOT NULL,";
$sql_creartabla.= "caracteristicas VARCHAR(500)NOT NULL,"; 
$sql_creartabla.= "foto VARCHAR(500) NOT NULL);";

$sql_insertarregistros = "INSERT INTO $tabla VALUES ";

$sql_insertarregistros.= "(null,' casa ','casa muy bonita ','Calle Pedro ','Alquiler ','No ','500 euros/mes ','Tiene ascensor ','https://www.vivus.es/blog/wp-content/uploads/2019/04/hacerse-una-casa.jpeg'),";
$sql_insertarregistros.= "(null,' apartamento ','perfecta para ti ','Calle de la Risa ','Venta ','234.123 euros ','No ','El suelo no se cae ','https://media-cdn.tripadvisor.com/media/vr-splice-j/06/ee/93/7f.jpg');";

$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
if (! $conexion){
	echo "ERROR: Imposible establecer conexión con el servidor (puede que está desactivado o que no se encuentre en el servidor $servidor).<br>\n";
}
else{
 	// Como pudo conectarse con el servidor, intentaremos crear la base de datos, y después la seleccionaremos para poder trabajar sobre ella.
 	echo "Conexion realizada con el servidor.<br>\n";
	
	// CREAR LA BASE DE DATOS:
	$resultado=mysqli_query($conexion, $sql_crearbasedatos);
	if (! $resultado) {
		echo "ERROR: Imposible crear base de datos $basedatos (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
	}
	else{ 
	 	echo "Base de datos $basedatos creada.<br>\n"; 
	}
	
	// SELECCIONAR LA BASE DE DATOS:
	$resultado=mysqli_select_db($conexion, $basedatos); 
	if (! $resultado){
		echo "ERROR: Imposible seleccionar la base de datos $basedatos (puede que no exista o que no se tenga permiso para usarla).<br>\n";
	}
	else{
	 	// Como pudo seleccionarse la base de datos, entonces intentaremos crear las tablas dentro, junto con registros iniciales para pruebas.
	 	echo "Base de datos $basedatos seleccionada.<br>\n";
		// CREAR TABLA 1:
		$resultado=mysqli_query($conexion, $sql_creartabla);
		if (! $resultado) {
			echo "ERROR: Imposible crear la tabla $tabla (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
		}
		else
		{
			echo "Tabla $tabla creada.<br>\n";
		}
		// INSERTAR REGISTROS EN TABLA 1:
		$resultado=mysqli_query($conexion, $sql_insertarregistros);
		if (! $resultado) {
			echo "ERROR: Imposible insertar registros iniciales en tabla $tabla (puede que ya existan esos registros o que no se tengan los permisos).<br>\n";
		}
		else
		{
			echo "Registros iniciales insertados satisfactoriamente en la Tabla $tabla.<br>\n";
		}
	// Antes de terminar, debe cerrarse la conexión con el servidor (pues sigue abierta)).
	echo "Cerrando la conexion con el servidor...<br>\n";
	mysqli_close($conexion);
}

echo "Fin del programa.<br>\n";
}
?>