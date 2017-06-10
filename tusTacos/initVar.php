<?php
if(!isset($_SESSION["init"])){
	include_once 'php/modelo/Pedido.php';
	$_SESSION["init"] = true;
	$_SESSION["initR"] = null;
	$_SESSION["titulo"] = "Tus Tacos";
	$_SESSION["subtitulo"] = "La mejor comida tradicional Mexicana";
	$_SESSION["version"] = "1.0";
	$_SESSION["hostDB"] = "localhost";
	$_SESSION["usuario"] = null;
	$_SESSION["msjAutenticacion"] = null;
	$_SESSION["pedidoActual"] = serialize(new Pedido());
	header('Location: controlador/buscarMenus.php');
}
?>