<?php
session_start();
include_once '../php/modelo/Usuario.php';
include_once '../php/dao/DaoPdo.php';
include_once '../php/dao/DaoUsuario.php';
include_once '../php/dao/DaoRolUsuario.php';
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
	header('Location: ../');
}else{
	$_SESSION["msjAutenticacion"]="Nombre de usuario o contraseña erroneos";
	header('Location: ../iniciarSesion.php');
}
?>