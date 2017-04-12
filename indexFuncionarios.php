<!DOCTYPE html>
<?php
	$_SESSION["titulo"] = "Tus Tacos";
	$_SESSION["subtitulo"] = "Portal Funcionarios";
	$_SESSION["version"] = "1.0";
	$_SESSION["usuario"] = null;
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Funcionarios, <?php echo $_SESSION["titulo"]?></title>
		<link rel="icon" href="imagenes/favicon.png" type="image/png" sizes="16x16">
		<!-- Librerias -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- Estilo de página -->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body  id="body" class="centrado">
		<header class="container-fluid">
			<?php include 'plantillas/header.php' ?>
		</header>
		<!--<nav>
			<?php include 'plantillas/nav.php' ?>
		</nav>-->
		<div  class="container">
			<div class="row">
				<section class="jpanel col-md-4 col-md-offset-4">
					<?php include 'paneles/loginFuncionario.php' ?>
				</section>
			</div>
		</div>
		<footer  class="container">
			<?php include 'plantillas/footer.php' ?>
		</footer>
	</body>
</html>
