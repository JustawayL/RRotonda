<?php
session_start();
$_SESSION["init"] = true;
$_SESSION["titulo"] = "Tus Tacos";
$_SESSION["subtitulo"] = "La mejor comida tradicional Mexicana";
$_SESSION["version"] = "1.0";
$_SESSION["hostDB"] = "localhost";
$_SESSION["usuario"] = null;
header('Location: tusTacos/');
?>
