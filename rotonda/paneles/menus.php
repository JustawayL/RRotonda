<h1>Lista de Menús</h1>
<div class="row">
<?php
$i=0;
foreach ($menus as $menu) {?>
<div class="jpanel2 col-md-4">
	<?php include 'paneles/menu.php'; $i++;?>
</div>
<?php if($i%3==0){ ?>
</div>
<div class="row">
<?php }} ?>
</div>
