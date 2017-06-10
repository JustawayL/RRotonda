<!DOCTYPE html>
<?php
session_start();
include_once 'initVar.php';
if($_SESSION["busquedaActual"]!="Productos")
	header('Location: controlador/buscarProductos.php');
include_once 'php/modelo/Producto.php';
$phbusqueda = "Nombre de producto";
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $_SESSION["titulo"] ?></title>
		<link rel="icon" href="imagenes/favicon.png" type="image/png" sizes="16x16">
		<!-- Librerias -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- Estilo de página -->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <!-- Scripts necesarios -->
        <script src="js/controlador.js"></script>
	</head>
	<body  id="body" class="centrado">
		<header class="container-fluid">
			<?php include 'plantillas/header.php' ?>
		</header>
		<nav class="navbar navbar-inverse"><?php include 'plantillas/nav.php' ?></nav>
		<div  class="container">
			<div class="row">
				<section class="jpanel col-md-9">
					<?php
					$productos = unserialize($_SESSION["busqueda"]);
					include 'paneles/productos.php';
					?>
				</section>
				<aside class="jpanel col-md-3">
					<?php include 'plantillas/aside.php' ?>
				</aside>
			</div>
		</div>
		<footer  class="container">
			<?php include 'plantillas/footer.php' ?>
		</footer>
		<!-- Librerías -->
		<script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
	</body>
</html>
