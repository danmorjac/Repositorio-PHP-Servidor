<?php
// Archivo php para el "administrador" para crear la base de datos necesaria
// y las tablas, con los campos requeridos.

include("datos.php");

$sql_crearbasedatos = "CREATE DATABASE $basedatos";

$sql_creartabla = "CREATE TABLE $tabla(";
$sql_creartabla.= "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, tipo VARCHAR(20) NOT NULL, 
descripcion VARCHAR(600) NOT NULL, direccion VARCHAR(50) NOT NULL, Venta_Alquiler VARCHAR(20) NOT NULL, 
precio_venta VARCHAR(20) NOT NULL, precio_alquiler VARCHAR(20) NOT NULL, caracteristicas VARCHAR(500)NOT NULL, 
foto VARCHAR(500) NOT NULL);";

$sql_insertarregistros1 = "INSERT INTO $tabla VALUES ";

$sql_insertarregistros1.= "(null,'casa','casa en urbanizacion','Calle no 20','Alquiler','No','500 euros/mes','Dispone 3hab, 2 baños y piscina','https://www.vivus.es/blog/wp-content/uploads/2019/04/hacerse-una-casa.jpeg'),";
$sql_insertarregistros1.= "(null,'apartamento','apartamento amplio','Calle si 5','Venta','234.000 euros','No','Dispone 4hab, baño y cocina','https://media-cdn.tripadvisor.com/media/vr-splice-j/06/ee/93/7f.jpg');";
$




// Inicialmente intentaremos conectar con el servidor MySQL instalado en el servidor web.
$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
if (! $conexion){
	echo "ERROR: Imposible establecer conexi�n con el servidor (puede que est� desactivado o que no se encuentre en el servidor $servidor).<br>\n";
}
else{
 	// Como pudo conectarse con el servidor, intentaremos crear la base de datos, y despu�s la seleccionaremos para poder trabajar sobre ella.
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
		$resultado=mysqli_query($conexion, $sql_insertarregistros1);
		if (! $resultado) {
			echo "ERROR: Imposible insertar registros iniciales en tabla $tabla (puede que ya existan esos registros o que no se tengan los permisos).<br>\n";
		}
		else
		{
			echo "Registros iniciales insertados satisfactoriamente en la Tabla $tabla.<br>\n";
		}			
	}
	// Antes de terminar, debe cerrarse la conexi�n con el servidor (pues sigue abierta)).
	echo "Cerrando la conexion con el servidor...<br>\n";
	mysqli_close($conexion);
}

echo "Fin del programa.<br>\n";
?>
