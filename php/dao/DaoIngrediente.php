<?php


/**
 * DAO para el ingrediente
 */
class DaoIngrediente extends DaoPdo
{

    /**
     * Obtiene una lista con todos los ingredientes disponibles
     */
    public function getIngredientes()
    {
        try
        {
        	$result = array();

        	$stm = $this->pdo->prepare("SELECT * FROM ingredientes");
        	$stm->execute();

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$ingr = new Ingrediente($r->id);

        		$ingr->__SET('nombre', $r->nombre);
        		$ingr->__SET('existencias', $r->existencias);

        		$result[] = $ingr;
        	}

        	return $result;
        }
        catch(Exception $e)
        {
        	die($e->getMessage());
        }
    }

    /**
     * Obtiene el ingrediente con el ID dado
     * @param int $id
     */
    public function getIngrediente($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("SELECT * FROM ingredientes WHERE id = ?");
        			          

        	$stm->execute(array($id));
        	$r = $stm->fetch(PDO::FETCH_OBJ);

        	$ingr = new Ingrediente($r->id);

        	$ingr->__SET('nombre', $r->nombre);
        	$ingr->__SET('existencias', $r->existencias);

        	return $ingr;
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Elimina el ingrediente con el ID dado
     * @param int $id
     */
    public function eliminar($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("DELETE FROM ingredientes WHERE id = ?");			          

        	$stm->execute(array($id));
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Actualiza en la BD el ingrediente dado
     * @param \Ingrediente $data
     */
    public function actualizar($data)
    {
        try 
        {
        	$sql = "UPDATE ingredientes SET 
        				nombre          = ?, 
        				existencias     = ?
        		    WHERE id = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('nombre'),  
        			$data->__GET('existencias'),
        			$data->__GET('id')
        			)
        		);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Pone como alternativa de un ingrediente a otro
     * @param int $ing
     * @param int $alt
     */
    public function crearAlternativa($ing, $alt)
    {
        try 
        {

        $sql = "INSERT INTO alternativas_ingredientes (ingrediente,alternativa) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(array($ing,$alt));
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Crea un ingrediente en la BD con los datos del ingrediente dado
     * @param \Ingrediente $data
     */
    public function crear($data)
    {
        try{
        $sql = "INSERT INTO ingredientes (nombre,existencias) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('nombre'), 
        		$data->__GET('existencias'),
        		)
        	);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Retorna una lista de ingredientes que son alternativas de un ingrediente
     * @param int $id
     */
    public function getAlternativas($id)
    {
        try
        {
        	$result = array();

        	$stm = $this->pdo->prepare("SELECT * FROM ingredientes b, alternativas_ingredientes c WHERE c.ingrediente=? AND b.id=c.alternativa");
        	$stm->execute(array($id));

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$ingr = new Ingrediente($r->id);
                
        		$ingr->__SET('nombre', $r->nombre);
        		$ingr->__SET('existencias', $r->existencias);

        		$result[] = $ingr;
        	}

        	return $result;
        }
        catch(Exception $e)
        {
        	die($e->getMessage());
        }
    }

    /**
     * @param int $idProducto
     */
    public function getIngredientesPorProducto($idProducto)
    {
        // TODO: implement here
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ingredientes b, productos_ingredientes c WHERE c.producto=? AND b.id=c.ingrediente");
            $stm->execute(array($idProducto));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ingr = new Ingrediente($r->id);
                
                $ingr->__SET('nombre', $r->nombre);
                $ingr->__SET('existencias', $r->existencias);

                $result[] = $ingr;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    /**
     * @param int $idIngrediente
     * @param int $idAlternativa
     */
    public function eliminarAlternativa($idIngrediente, $idAlternativa)
    {
        // TODO: implement here
         try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM alternativas_ingredientes WHERE ingrediente = ? and alternativa= ?");                     

            $stm->execute(array($idIngrediente,$idAlternativa));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
