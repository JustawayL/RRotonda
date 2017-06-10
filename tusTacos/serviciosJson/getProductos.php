<?php
include_once '../php/modelo/Producto.php';
include_once '../php/modelo/Ingrediente.php';
include_once '../php/dao/DaoPdo.php';
include_once '../php/dao/DaoProducto.php';
include_once '../php/dao/DaoIngrediente.php';
$daoProductos = new DaoProducto('mysql:host='.'localhost'.';dbname=rrotonda', 'tusTacosSw', 'tacos');
$productos = $daoProductos->getProductos();
foreach ($productos as $producto) {
	$daoIngrediente = new DaoIngrediente('mysql:host='.'localhost'.';dbname=rrotonda', 'tusTacosSw', 'tacos');
	$producto->__set('ingredientes',$daoIngrediente->getIngredientesPorProducto($producto->__get('id')));
}
$count=count($productos);
$c=$count-1;
echo "[";
for ($i=0; $i<$count; $i++) {
	echo '{';
	echo '"nombre":';
	echo '"'.$productos[$i]->__get('nombre').'",';
	echo '"precio":';
	echo $productos[$i]->__get('precio').',';
	echo '"foto":';
	echo '"'.$productos[$i]->__get('foto').'",';
	echo '"ingredientes":';
	$ingredientes = $productos[$i]->__get('ingredientes');
	$countI=count($ingredientes);
	$cI=$countI-1;
	echo '[';
	for ($j=0; $j<$countI; $j++) {
		echo '"'.$ingredientes[$j]->__get('nombre').'"';
		if($j!=$cI)
			echo ',';
	}
	echo ']';
	echo "}";
	if($i!=$c)
		echo ',';
}
echo "]";
?>