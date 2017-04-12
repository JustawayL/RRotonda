<?php


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
        		$ped = new Pedido();

        		$ped->__SET('id', $r->id);
        		$ped->__SET('estado', $r->estado);
        		$ped->__SET('cliente', $r->cliente);
        		$ped->__SET('restaurante', $r->restaurante);
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

        	$ped = new Pedido();

        	$ped->__SET('id', $r->id);
        	$ped->__SET('estado', $r->estado);
        	$ped->__SET('cliente', $r->cliente);
        	$ped->__SET('restaurante', $r->restaurante);
        	$ped->__SET('fecha', $r->fecha);

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
        				restaurante     = ?,
        		    	fecha     		= ?
        		    	WHERE id = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('estado'), 
        			$data->__GET('cliente'), 
        			$data->__GET('restaurante'),
        			$data->__GET('fecha')
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
        $consec=0;
        try 
        {
        $sql_aux= "SELECT id FROM pedidos";
        $stmt=$this->pdo->prepare($sql_aux);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row) { 
           	echo $row["id"];
           	$consec = $row["id"];
        }
        $consec+=1;
        $sql = "INSERT INTO pedidos (id,estado,cliente,restaurante,fecha) 
                VALUES ($consec, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('estado'), 
        		$data->__GET('cliente'), 
        		$data->__GET('restaurante'),
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
    }

    /**
     * @param string $estado
     */
    public function getPedidosPorEstado($estado)
    {
        // TODO: implement here
    }
}
