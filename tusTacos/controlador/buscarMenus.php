<?php
session_start();
include_once '../php/modelo/Menu.php';
include_once '../php/dao/DaoPdo.php';
include_once '../php/dao/DaoMenu.php';
include_once '../php/dao/DaoProducto.php';
$daoMenu = new DaoMenu('mysql:host='.$_SESSION["hostDB"].';dbname=rrotonda', 'tusTacosSw', 'tacos');
$menus = $daoMenu->getMenus();
foreach($menus as $menu){
	$daoProducto = new DaoProducto('mysql:host='.$_SESSION["hostDB"].';dbname=rrotonda', 'tusTacosSw', 'tacos');
	$productos = $daoProducto->getProductosPorMenu($menu->__get('id'));
	foreach ($productos as $producto)
		$menu->addProducto($producto);
}
$_SESSION["busquedaActual"] = "Menus";
$_SESSION["busqueda"] = serialize($menus);
header('Location: ../pedirMenus.php');
?>