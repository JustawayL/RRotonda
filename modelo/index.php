<?php
require_once 'Ingrediente.php';
require_once 'CRUD_Ingrediente.php';

// Logica
$alm = new Ingrediente();
$model = new CRUD_Ingrediente();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id',              $_REQUEST['id']);
			$alm->__SET('nombre',          $_REQUEST['nombre']);
			$alm->__SET('restaurante',     $_REQUEST['restaurante']);
			$alm->__SET('existencias',     $_REQUEST['existencias']);

			$model->Actualizar($alm);
			header('Location: index.php');
			break;

		case 'registrar':
            $alm->__SET('nombre',          $_REQUEST['nombre']);
            $alm->__SET('restaurante',     $_REQUEST['restaurante']);
            $alm->__SET('existencias',     $_REQUEST['existencias']);

			$model->Registrar($alm);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id']);
			header('Location: index.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['id']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Id</th>
                            <td><input type="text" name="id" value="<?php echo $alm->__GET('id'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Restaurante</th>
                            <td><input type="text" name="restaurante" value="<?php echo $alm->__GET('restaurante'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Existencias</th>
                            <td><input type="text" name="existencias" value="<?php echo $alm->__GET('existencias'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">id</th>
                            <th style="text-align:left;">nombre</th>
                            <th style="text-align:left;">restaurante</th>
                            <th style="text-align:left;">existencias</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('restaurante'); ?></td>
                            <td><?php echo $r->__GET('existencias'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>