<div class="jpanel3">
	<h2><?php echo $menu->__get('nombre')?></h2>
	<h2 class="enLinea">$<?php echo $menu->__get('precio')?></h2>
	<form action="" method="post" class="enLinea">
		<input id="cantidad" type="number" name="cantidad" value="1" class="form-control cant" required/>
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
	</form>
	<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>
</div>
<div>
	<h2>Productos</h2>
	<?php
	$productos = $menu->__get('productos');
	foreach ($productos as $producto) {
		echo '<hr>';
		include 'paneles/producto.php';
	}
	?>
</div>
