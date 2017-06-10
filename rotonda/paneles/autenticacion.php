<h1>Iniciar Sesión</h1>
<?php if(isset($_SESSION["msjAutenticacion"])){ ?>
<span class="msjAutenticacion"><?php echo $_SESSION["msjAutenticacion"]; ?></span>
<?php $_SESSION["msjAutenticacion"]=null;} ?>
<form id="autenticacion" action="controlador/autenticar.php" method="POST">
	<div class="form-group">
		<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de Usuario" required/><br>
		<input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña" required/>
	</div>
	<input type="submit" value="Ingresar" name="ingresar" class="btn btn-primary" disabled />
</form>
<br>
<a>Registrarse</a><br>