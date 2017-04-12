<?php


/**
 * DAO para Cliente
 */
class DaoCliente extends DaoPdo
{

    /**
     * Genera una lista de todos los clientes
     */
    public function getClientes()
    {
        try
        {
        	$result = array();

        	$stm = $this->pdo->prepare("SELECT * FROM clientes");
        	$stm->execute();

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$cli = new Cliente();

        		$cli->__SET('id', $r->id);
        		$cli->__SET('nombre', $r->nombre);
        		$cli->__SET('clave', $r->clave);
        				
        		$result[] = $cli;
        	}

        	return $result;
        }
        catch(Exception $e)
        {
        	die($e->getMessage());
        }
    }

    /**
     * Obtiene el cliente del ID correspondiente
     * @param string $id
     */
    public function getCliente($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("SELECT * FROM clientes WHERE id = ?");
        			          

        	$stm->execute(array($id));
        	$r = $stm->fetch(PDO::FETCH_OBJ);

        	$cli = new Cliente();

        	$cli->__SET('id', $r->id);
        	$cli->__SET('nombre', $r->nombre);
        	$cli->__SET('clave', $r->clave);

        	return $cli;
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Elimina el cliente con el ID dado
     * @param string $id
     */
    public function eliminar($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("DELETE FROM clientes WHERE id = ?");			          

        	$stm->execute(array($id));
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Actualiza los datos en la BD del cliente dado
     * @param \Cliente $data
     */
    public function actualizar($data)
    {
        try 
        {
        	$sql = "UPDATE clientes SET 
        				nombre          = ?, 
        				clave 		    = ?
        		    WHERE id = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('nombre'), 
        			$data->__GET('clave'), 
        			$data->__GET('id')
        			)
        		);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Crea un Cliente en la BD con los datos del cliente dado
     * @param \Cliente $data
     */
    public function crear($data)
    {
        $consec=0;
        try 
        {
        $sql_aux= "SELECT id FROM clientes";
        $stmt=$this->pdo->prepare($sql_aux);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row) { 
           	echo $row["id"];
           	$consec = $row["id"];
        }
        $consec+=1;
        $sql = "INSERT INTO clientes (id,nombre,clave) 
                VALUES ($consec, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('nombre'), 
        		$data->__GET('clave')
        		)
        	);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }
}
