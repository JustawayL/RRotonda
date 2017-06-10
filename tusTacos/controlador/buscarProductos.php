<?php
session_start();
include_once '../php/modelo/Producto.php';
include_once '../php/dao/DaoPdo.php';
include_once '../php/dao/DaoProducto.php';
$daoProductos = new DaoProducto('mysql:host='.$_SESSION["hostDB"].';dbname=rrotonda', 'tusTacosSw', 'tacos');
$productos = $daoProductos->getProductos();
$_SESSION["busquedaActual"] = "Productos";
$_SESSION["busqueda"] = serialize($productos);
header('Location: ../pedirProductos.php');
?>