<?php
include '../php/modelo/Usuario.php';
$user = unserialize($_SESSION["usuario"]);
?>
<h1><?php echo $user->__get('nombre'); ?></h1>
<ul class="nav nav-pills nav-stacked">
	<?php
	if(in_array("Cliente", $user->__get("roles"))){
		?>
		<li><a href="../tusTacosindex.php">Menus</a></li>
		<li><a href="productos.php">Productos</a></li>
		<li><a href="#">Pedidos</a></li>
	<?php } ?>
	<li><a href="../controlador/salir.php">Salir</a></li>
</ul>