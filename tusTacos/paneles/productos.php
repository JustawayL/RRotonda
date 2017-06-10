<h1>Lista de Productos</h1>
<div class="row">
<?php
$i=0;
foreach ($productos as $producto) {?>
<div class="jpanel2 col-md-4">
	<?php
	$productoPrecio = true;
	$productoPedir = true;
	$productoEditar =true;
	include 'paneles/producto.php';
	$i++; ?>
</div>
<?php if($i%3==0){ ?>
</div>
<div class="row">
<?php }} ?>
</div>
