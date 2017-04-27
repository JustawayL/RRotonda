<h1>Lista de Menús</h1>
<?php
require_once '../php/modelo/Menu.php';
require_once '../php/dao/DaoPdo.php';
require_once '../php/dao/DaoMenu.php';
$alm = new Menu();
$model = new DaoMenu('mysql:host=localhost;dbname=rotonda', 'root', '');
?>                    

<!-- Se debe realizar un for en php para mostrar todos los menús -->
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Menú</th>
				<th>Precio</th>
				<th>Personalizar</th>
				<th>Solicitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($model->getMenus() as $r): ?>
				<tr>
					<td><?php echo $r->__GET('nombre') ?></td>
					<td>$<?php echo $r->__GET('precio') ?></td>
					<td><button type="button" class="btn btn-default" >
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button></td>
					<td><button type="button" class="btn btn-default" >
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>