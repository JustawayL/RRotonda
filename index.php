<!DOCTYPE html>
<?php include 'parametros.php' ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $_SESSION["titulo"]." ".$_SESSION["version"] ?></title>
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
				<section class="jpanel col-md-9">
					Hola!!
				</section>
				<aside class="jpanel col-md-3">
					<?php
						if($_SESSION["usuario"]===null){
							include 'paneles/loginCliente.php';
						}else{
							include 'paneles/menuCliente.php';
						}
					?>
				</aside>
			</div>
		</div>
		<footer  class="container">
			<?php include 'plantillas/footer.php' ?>
		</footer>
	</body>
</html>
