<?php
if(!isset($_SESSION["initR"])){
	$_SESSION["initR"] = true;
	$_SESSION["init"] = null;
	$_SESSION["titulo"] = "Rotonda de Comidas";
	$_SESSION["subtitulo"] = "Rotonda de Comidas Virtual";
	$_SESSION["version"] = "1.0";
	$_SESSION["hostDB"] = "localhost";
	$_SESSION["usuario"] = null;
	$_SESSION["msjAutenticacion"] = null;
	header('Location: controlador/buscarMenus.php');
}
?>