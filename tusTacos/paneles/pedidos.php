<h1>Historial Pedidos</h1>
<?php if(count($pedidos)==0) echo 'No se ha realizado ningun pedido'; else{ ?>
<div class="row">
	<?php
	$i=0;
	foreach ($pedidos as $pedido) {?>
	<div class="jpanel2 col-md-6">
		<?php
		$pedidoIsActual=false;
		include 'paneles/pedido.php';
		$i++; ?>
	</div>
	<?php if($i%5==0){ ?>
</div>
<div class="row">
	<?php }} ?>
</div>
<?php } ?>