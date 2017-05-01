<?php
require_once '/../modelo/Menu.php';
require_once '/../modelo/Pedido.php';
require_once '/../modelo/Producto.php';
/**
 * DAO para el pedido
 */
class DaoPedido extends DaoPdo
{

    /**
     * Obtiene la lista de todos los pedidos
     */
    public function getPedidos()
    {
        try
        {
        	$result = array();

        	$stm = $this->pdo->prepare("SELECT * FROM pedidos");
        	$stm->execute();

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$ped = new Pedido($r->id);

        		$ped->__SET('estado', $r->estado);
        		$ped->__SET('cliente',$r->cliente);
        		$ped->__SET('fecha', $r->fecha);
                $ped->__SET('menus', $this->getMenusPorPedido($r->id));
                $ped->__SET('productos', $this->getProductosPorPedido($r->id));

        		$result[] = $ped;
        	}

        	return $result;
        }
        catch(Exception $e)
        {
        	die($e->getMessage());
        }
    }

    /**
     * Obtiene el pedido con el ID dado
     * @param int $id
     */
    public function getPedido($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("SELECT * FROM pedidos WHERE id = ?");
        			          

        	$stm->execute(array($id));
        	$r = $stm->fetch(PDO::FETCH_OBJ);

        	$ped = new Pedido($r->id);

        	$ped->__SET('estado', $r->estado);
        	$ped->__SET('cliente', $r->cliente);
        	$ped->__SET('fecha', $r->fecha);
            $ped->__SET('menus', $this->getMenusPorPedido($r->id));
            $ped->__SET('productos', $this->getProductosPorPedido($r->id));



        	return $ped;
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Elimina el pedido con el ID dado
     * @param int $id
     */
    public function eliminar($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("DELETE FROM pedidos WHERE id = ?");			          

        	$stm->execute(array($id));
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Actualiza en la BD el pedido dado
     * @param \Pedido $data
     */
    public function actualizar($data)
    {
        try 
        {
        	$sql = "UPDATE pedidos SET 
        				estado          = ?, 
        				cliente     	= ?,
        		    	fecha     		= ?
        		    	WHERE id = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('estado'), 
        			$data->__GET('cliente'), 
        			$data->__GET('fecha'),
        			$data->__GET('id')
        			)
        		);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Crea en la BD el pedido dado
     * @param \Pedido $data
     */
    public function crear($data)
    {
        try{
        $sql = "INSERT INTO pedidos (estado,cliente,fecha) 
                VALUES (?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('estado'), 
        		$data->__GET('cliente'), 
        		$data->__GET('fecha'),
        		)
        	);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * @param string $idCliente
     */
    public function getPedidosPorCliente($idCliente)
    {
        // TODO: implement here
         try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM pedidos WHERE cliente=?");
            $stm->execute(array($idCliente));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ped = new Pedido($r->id);

                $ped->__SET('estado', $r->estado);
                $ped->__SET('cliente',$r->cliente);
                $ped->__SET('fecha', $r->fecha);

                $result[] = $ped;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    /**
     * @param string $estado
     */
    public function getPedidosPorEstado($estado)
    {
        // TODO: implement here
         try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM pedidos WHERE estado=?");
            $stm->execute(array($estado));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ped = new Pedido($r->id);

                $ped->__SET('estado', $r->estado);
                $ped->__SET('cliente',$r->cliente);
                $ped->__SET('fecha', $r->fecha);

                $result[] = $ped;
            }

            return $result;
        }
        catch(Exception $e)
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

        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM menus m, pedidos_menus p WHERE p.pedido=? AND m.id=p.menu");
            $stm->execute(array($idPedido));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $menu = new Menu($r->id);

                
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
     * @param int $idPedido
     */
    public function getProductosPorPedido($idPedido)
    {
        // TODO: implement here
        
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM productos p, pedidos_productos pp WHERE pp.pedido=? AND pp.producto=p.id");
            $stm->execute(array($idPedido));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $prod = new Producto($r->id);

                $prod->__SET('nombre', $r->nombre);
                $prod->__SET('categoria', $r->categoria);
                $prod->__SET('precio', $r->precio);
                $prod->__SET('foto', $r->foto);
                $prod->__SET('descripcion', $r->descripcion);
                $prod->__SET('existencias', $r->existencias);
                $result[] = $prod;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
       
    }
}
