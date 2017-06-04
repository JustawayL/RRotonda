<?php
session_start();
include '../php/modelo/Usuario.php';
include '../php/dao/DaoPdo.php';
include '../php/dao/DaoUsuario.php';
include '../php/dao/DaoRolUsuario.php';
$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$daoUsiario = new DaoUsuario('mysql:host='.$_SESSION["hostDB"].';dbname=rrotonda', 'tusTacosSw', 'tacos');
$user = $daoUsiario->getUsuario($nombre);
if($user!=null&&$user->__get('clave')===$clave){
	$daoRol = new DaoRolUsuario('mysql:host='.$_SESSION["hostDB"].';dbname=rrotonda', 'tusTacosSw', 'tacos');
	$roles = $daoRol -> getRolesPorUsuario($nombre);
	foreach ($roles as $rol)
		$user->addRol($rol);
	$_SESSION["usuario"] = serialize($user);
	header('Location: ../tusTacos/');
}else{
	header('Location: ../tusTacos/');
	//Colocar error de autenticación
}
?>