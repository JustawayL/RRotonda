<div class="row">
	<h3><?php echo $producto->__get('nombre')?></h3>
	<span><?php echo $producto->__get('categoria')?></span>
</div>
<div class="row">
	<?php if(isset($productoPrecio)&&$productoPrecio==true) {?>
	<h3 class="enLinea"><?php echo "$".$producto->__get('precio')?></h3>
	<?php } ?>
	<?php if(isset($productoPedir)&&$productoPedir==true) {?>
	<form action="" method="post" class="enLinea">
		<input id="cantidad" type="number" name="cantidad" value="1" class="form-control cant" required/>
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
	</form>
	<?php } ?>
	<?php if(isset($productoEditar)&&$productoEditar==true) {?>
	<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>
	<?php } ?>
	<?php if(isset($productoEliminar)&&$productoEliminar==true) {?>
	<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	<?php } ?>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<img src=<?php echo "'".$producto->__get('foto')."'" ?> class="img-responsive img-rounded center-block" alt=<?php echo "'".$producto->__get('nombre')."'" ?>>
		<p class="text-center"><?php echo $producto->__get('descripcion'); ?></p>
	</div>
	<div class="col-md-1"></div>
</div>