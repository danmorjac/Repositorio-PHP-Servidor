<hr>
<?php
// En el pie de cada página informaremos del usuario y su tipo:

if(isset($_SESSION['usuario'])){
	echo "Bienvenido: <b>" . $_SESSION['usuario'] . "</b>";
}
if(isset($_SESSION['tipo'])){
	echo " - Tipo de usuario: <b>".$_SESSION['tipo'] . "</b>";
}
if($_SESSION['tipo']=="invitado"){
	echo "<br>Al no estar registrado, unicamente puede consultar nuestro catalogo.";
}
if($_SESSION['tipo']=="administrador"){
	echo "<br>Al ser administrador, puede consultar y eliminar articulos.";
}
?>
</body></html>