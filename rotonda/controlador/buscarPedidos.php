<?php
session_start();
include_once '../php/modelo/Usuario.php';
include_once '../php/modelo/Peido.php';
include_once '../php/dao/DaoPdo.php';
include_once '../php/dao/DaoPedido.php';
$daoPedido = new DaoPedido('mysql:host='.$_SESSION["hostDB"].';dbname=rrotonda', 'tusTacosSw', 'tacos');
$pedidos = $daoPedido->getPedidosPorCliente(unserialize($_SESSION["usuario"])->__get('nombre'));
$_SESSION["busquedaActual"] = "Pedidos";
$_SESSION["busqueda"] = serialize($pedidos);
header('Location: ../pedidos.php');
?>