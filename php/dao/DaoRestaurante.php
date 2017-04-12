<?php


/**
 * DAO para el restaurante
 */
class DaoRestaurante extends DaoPdo
{

    /**
     * Genera una lista de todos los restaurantes registrados
     */
    public function getRestaurantes()
    {
        try
        {
        	$result = array();

        	$stm = $this->pdo->prepare("SELECT * FROM restaurantes");
        	$stm->execute();

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$rest = new Restaurante();

        		$rest->__SET('nombre', $r->nombre);
        		$rest->__SET('direccion', $r->direccion);
        		$rest->__SET('telefono', $r->telefono);
        		$rest->__SET('descripcion', $r->descripcion);

        		$result[] = $rest;
        	}

        	return $result;
        }
        catch(Exception $e)
        {
        	die($e->getMessage());
        }
    }

    /**
     * Se obtiene un restaurante con el nombre dado
     * @param string $nombre
     */
    public function getRestaurante($nombre)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("SELECT * FROM restaurantes WHERE nombre = ?");
        			          

        	$stm->execute(array($nombre));
        	$r = $stm->fetch(PDO::FETCH_OBJ);

        	$rest = new Restaurante();

        	$rest->__SET('nombre', $r->nombre);
        	$rest->__SET('direccion', $r->direccion);
        	$rest->__SET('telefono', $r->telefono);
        	$rest->__SET('descripcion', $r->descripcion);

        	return $rest;
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Se elimina el restaurante con el nombre dado
     * @param string $nombre
     */
    public function eliminar($nombre)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("DELETE FROM restaurantes WHERE nombre = ?");			          

        	$stm->execute(array($nombre));
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Actualiza en la BD el restaurante dado
     * @param \Restaurante $data
     */
    public function actualizar($data)
    {
        try 
        {
        	$sql = "UPDATE restaurantes SET 
        				direccion     	= ?,
        				telefono     = ?,
        		    	descripcion     		= ?
        		    	WHERE nombre = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('direccion'), 
        			$data->__GET('telefono'), 
        			$data->__GET('descripcion'),
        			$data->__GET('nombre')
        			)
        		);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Guarda en la BD el restaurante dado
     * @param \Restaurante $data
     */
    public function crear($data)
    {
        $sql = "INSERT INTO restaurantes (nombre,direccion,telefono,descripcion) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('direccion'), 
        		$data->__GET('telefono'), 
        		$data->__GET('descripcion'),
        		)
        	);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }
}