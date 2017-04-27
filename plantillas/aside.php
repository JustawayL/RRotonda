<?php
if($_SESSION["usuario"]===null){
	include 'paneles/autenticacion.php';
}else{
	include 'paneles/menuOpciones.php';
}
?>