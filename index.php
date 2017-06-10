<!DOCTYPE html>
<?php session_start(); $_SESSION["init"]=null; $_SESSION["initR"]=null;?>
<html>
<head>
	<meta charset="UTF-8">
	<title>RRotonda</title>
	<!-- Librerias -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Estilo de página -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body  id="body" class="centrado">
	<div class="container">
		<div class="relleno"></div>
		<div class="row">
			<div class="jcol col-md-6">
				<a href="rotonda">
					<button type="button" class="btn btn-primary btn-lg btn-block jbutton">Rotonda de Comidas</button>
				</a>
			</div>
			<div class="jcol col-md-6">
				<a href="tusTacos">
					<button type="button" class="btn btn-warning btn-lg btn-block jbutton">Restaurante Tus Tacos</button>
				</a>
			</div>
		</div>
	</div>
</body>
</html>