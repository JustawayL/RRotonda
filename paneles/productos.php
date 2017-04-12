<h1>Lista de Productos</h1>
<?php
require_once 'modelo\Producto.php';
require_once 'modelo\CRUD_Producto.php';
$alm = new Producto();
$model = new CRUD_Producto();
?>                    

<!-- Se debe realizar un for en php para mostrar todos los menús -->
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Categoria</th>
				<th>Precio</th>
				<th>Descripcion</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($model->Listar() as $r): ?>
				<tr>
					<td><?php echo $r->__GET('nombre') ?></td>
					<td><?php echo $r->__GET('categoria') ?></td>
					<td>$<?php echo $r->__GET('precio') ?></td>
					<td><?php echo $r->__GET('descripcion') ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
