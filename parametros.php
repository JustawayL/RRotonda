<?php
	include 'modelo/Cliente.php';
	$_SESSION["titulo"] = "Restaurante Tus Tacos";
	$_SESSION["version"] = "1.0";
	$_SESSION["usuario"] = new Cliente('Jeisson','Clave');
?>