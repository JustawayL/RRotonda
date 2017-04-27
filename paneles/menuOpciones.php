<h1>Bienvenido <?php echo $_SESSION["usuario"]->nombre; ?></h1>
<ul class="nav nav-pills nav-stacked">
	<?php
	if(in_array("Cliente", $_SESSION["usuario"]->__get("roles"))){
		?>
		<li><a href="index.php">Menus</a></li>
		<li><a href="productos.php">Productos</a></li>
		<li><a href="#">Pedido</a></li>
	<?php } ?>
	<li><a href="#">Salir</a></li>
</ul>