<?php
session_start();
include_once '../php/modelo/Producto.php';
//Conexión a Tus Tacos
$productosJson = file('http://192.168.0.20/RRotonda/tusTacos/serviciosJson/getProductos.php')[0];
$objetos = json_decode($productosJson);
$productos = array();
foreach ($objetos as $objeto) {
	$producto=new Producto();
	$producto->__set('nombre',$objeto->nombre);
	$producto->__set('precio',$objeto->precio);
	$producto->__set('foto',''.$objeto->foto);
	$productos[]=$producto;
}
//Conexión a Hamburguesas
$productosJson = file('http://192.168.0.10:8000/ws/productos/')[0];
$objetos = json_decode($productosJson);
foreach ($objetos as $objeto) {
	$producto=new Producto();
	$producto->__set('nombre',$objeto->nombre);
	$producto->__set('precio',$objeto->precio);
	$producto->__set('foto','http://192.168.0.10:8000'.$objeto->imagen);
	$productos[]=$producto;
}
//Conexión a ...


$_SESSION["busquedaActual"] = "Productos";
$_SESSION["busqueda"] = serialize($productos);
header('Location: ../pedirProductos.php');
?>