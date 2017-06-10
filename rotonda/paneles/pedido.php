<?php if(!isset($pedidoIsActual)||$pedidoIsActual==false){ ?>
<h2>Pedido <?php echo $pedido->__get('id') ?></h2>
<span><?php echo $pedido->__get('estado') ?></span>
<span><?php echo $pedido->__get('fecha') ?></span>
<?php } ?>
<div class="jtable table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Cant</th>
				<th>Artículo</th>
				<th>Precio</th>
				<?php if(isset($pedidoEliminar)&&$pedidoEliminar=true){ ?>
				<th>X</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>3</td>
				<td>Nombre del taco</td>
				<td>$5000</td>
				<?php if(isset($pedidoEliminar)&&$pedidoEliminar=true){ ?>
				<td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
				<?php } ?>
			</tr>
		</tbody>
	</table>
</div>