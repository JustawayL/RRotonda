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
        		$ingr = new Ingrediente();

        		$ingr->__SET('id', $r->id);
        		$ingr->__SET('nombre', $r->nombre);
        		$ingr->__SET('restaurante', $r->restaurante);
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

        	$ingr = new Ingrediente();

        	$ingr->__SET('id', $r->id);
        	$ingr->__SET('nombre', $r->nombre);
        	$ingr->__SET('restaurante', $r->restaurante);
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
        				restaurante     = ?,
        				existencias     = ?
        		    WHERE id = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('nombre'), 
        			$data->__GET('restaurante'), 
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
        $consec=0;
        try 
        {
        $sql_aux= "SELECT id FROM ingredientes";
        $stmt=$this->pdo->prepare($sql_aux);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row) { 
           	echo $row["id"];
           	$consec = $row["id"];
        }
        $consec+=1;
        $sql = "INSERT INTO ingredientes (id,nombre,restaurante,existencias) 
                VALUES ($consec, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('nombre'), 
        		$data->__GET('restaurante'), 
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
        		$ingr = new Ingrediente();

        		$ingr->__SET('id', $r->id);
        		$ingr->__SET('nombre', $r->nombre);
        		$ingr->__SET('restaurante', $r->restaurante);
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
     * @param string $restaurante
     */
    public function getIngredientesPorRestaurantes($restaurante)
    {
        // TODO: implement here
    }

    /**
     * @param int $idProducto
     */
    public function getIngredientesPorProducto($idProducto)
    {
        // TODO: implement here
    }

    /**
     * @param int $idIngrediente
     * @param int $idAlternativa
     */
    public function eliminarAlternativa($idIngrediente, $idAlternativa)
    {
        // TODO: implement here
    }
}
