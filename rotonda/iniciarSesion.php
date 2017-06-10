<!DOCTYPE html>
<?php
session_start();
include_once 'initVar.php';
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
		<div  class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<section class="jpanel col-md-6">
					<?php
					$menus = unserialize($_SESSION["busqueda"]);
					include 'paneles/autenticacion.php';
					?>
				</section>
				<div class="col-md-3"></div>
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
