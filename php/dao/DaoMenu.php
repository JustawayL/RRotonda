<?php


/**
 * Clase DAO para el Menu
 */
class DaoMenu extends DaoPdo
{

    /**
     * Retorna una lista con todos los menus existentes
     */
    public function getMenus()
    {
        try
        {
        	$result = array();

        	$stm = $this->pdo->prepare("SELECT * FROM menus");
        	$stm->execute();

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$menu = new Menu();

        		$menu->__SET('id', $r->id);
        		$menu->__SET('nombre', $r->nombre);
        		$menu->__SET('precio', $r->precio);

        		$result[] = $menu;
        	}

        	return $result;
        }
        catch(Exception $e)
        {
        	die($e->getMessage());
        }
    }

    /**
     * Retorna el menú que corresponde con el ID dado
     * @param int $id
     */
    public function getMenu($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("SELECT * FROM menus WHERE id = ?");
        			          

        	$stm->execute(array($id));
        	$r = $stm->fetch(PDO::FETCH_OBJ);

        	$menu = new Menu();

        	$menu->__SET('id', $r->id);
        	$menu->__SET('nombre', $r->nombre);
        	$menu->__SET('precio', $r->precio);
        			

        	return $menu;
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Elimina el menú correspondiente al ID dado
     * @param int $id
     */
    public function eliminar($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("DELETE FROM menus WHERE id = ?");			          

        	$stm->execute(array($id));
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Actualiza en la BD con los datos del menú dado
     * @param \Menu $data
     */
    public function actualizar($data)
    {
        try 
        {
        	$sql = "UPDATE menus SET 
        				nombre          = ?, 
        				precio     		= ?
        		    WHERE id = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('nombre'), 
        			$data->__GET('precio'), 
        			$data->__GET('id')
        			)
        		);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Crea un menú en la BD con los datos del menu dado
     * @param \Menu $data
     */
    public function crear($data)
    {
        try{
        $sql = "INSERT INTO menus (nombre,precio) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('nombre'), 
        		$data->__GET('precio'), 
        		)
        	);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * @param int $idPedido
     */
    public function getMenusPorPedido($idPedido)
    {
        // TODO: implement here
    }

}
