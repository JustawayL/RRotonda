<?php
include_once 'php/modelo/Usuario.php';
$user = unserialize($_SESSION["usuario"]);
?>
<div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-body" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbar-body">
    <ul class="nav navbar-nav">
      <?php
      if($_SESSION["usuario"]!=null){
        if(in_array("Funcionario", $user->__get("roles"))){?>
        <li><a href="adminIngredientes.php">Gestión Ingredientes</a></li>
        <li><a href="adminProductos.php">Gestión Productos</a></li>
        <li><a href="adminMenús.php">Gestión Menús</a></li>
        <?php 
      } ?>
      <?php
      if(in_array("Cliente", $user->__get("roles"))){
        ?>
        <li><a href="pedirMenus.php">Pedir Menú</a></li>
        <li><a href="pedirProductos.php">Pedir Producto</a></li>
        <li><a href="pedidos.php">Pedidos Realizados</a></li>
        <?php 
      } ?>
      <?php 
    } ?>
  </ul>

  <form id="busqueda" action="controlador/buscar.php" method="POST" class="navbar-form navbar-left">
    <div class="form-group">
      <input id="texto" class="form-control" type="text" name="texto" placeholder=<?php echo "'".$phbusqueda."'" ?> required/>
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
  </form>

  <ul class="nav navbar-nav navbar-right">
    <?php
    if($_SESSION["usuario"]===null){?>
    <li><a href="iniciarSesion.php">Iniciar Sesión</a></li>
    <?php }else{ ?>
    <li><a href="controlador/salir.php">Salir</a></li>
    <?php } ?>
  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->