<?php
include_once 'php/modelo/Usuario.php';
$user = unserialize($_SESSION["usuario"]);
?>
<h1><?php echo $user->__get('nombre'); ?></h1>
<h2>Pedido Actual</h2>
<?php
$pedidoIsActual=true;
$pedidoEliminar=true;
include 'paneles/pedido.php';
?>
<br>
<button type="button" class="btn btn-primary">Realizar Pedido</button>
