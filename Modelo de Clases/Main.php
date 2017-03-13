<?php 
include "Restaurante.php";
include "Ingrediente.php";

$sal=new Ingrediente();

$sal->nombre="sal";
$sal->restaurante="Tus Tacos";
$sal->existensias=1000;
$restaurante = new Restaurante();

$restaurante->registrarIngrediente($sal);










 ?>