<?php


/**
 * DAO para el producto
 */
class DaoProducto extends DaoPdo
{

    /**
     * Obtiene una lista de todos los productos
     */
    public function getProductos()
    {
        try
        {
        	$result = array();

        	$stm = $this->pdo->prepare("SELECT * FROM productos");
        	$stm->execute();

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$prod = new Producto();

        		$prod->__SET('id', $r->id);
        		$prod->__SET('nombre', $r->nombre);
        		$prod->__SET('categoria', $r->categoria);
        		$prod->__SET('precio', $r->precio);
        		$prod->__SET('foto', $r->foto);
        		$prod->__SET('descripcion', $r->descripcion);
        		$prod->__SET('restaurante', $r->restaurante);
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

    /**
     * Obtiene el producto con el ID dado
     * @param int $id
     */
    public function getProducto($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("SELECT * FROM productos WHERE id = ?");
        			          

        	$stm->execute(array($id));
        	$r = $stm->fetch(PDO::FETCH_OBJ);

        	$prod = new Producto();

        	$prod->__SET('id', $r->id);
        	$prod->__SET('nombre', $r->nombre);
        	$prod->__SET('categoria', $r->categoria);
        	$prod->__SET('precio', $r->precio);
        	$prod->__SET('foto', $r->foto);
        	$prod->__SET('descripcion', $r->descripcion);
        	$prod->__SET('restaurante', $r->restaurante);
        	$prod->__SET('existencias', $r->existencias);
        	return $prod;
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Elimina el producto con el ID dado
     * @param int $id
     */
    public function eliminar($id)
    {
        try 
        {
        	$stm = $this->pdo
        	          ->prepare("DELETE FROM productos WHERE id = ?");			          

        	$stm->execute(array($id));
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Actualiza en la BD el producto dado
     * @param \Producto $data
     */
    public function actualizar($data)
    {
        try 
        {
        	$sql = "UPDATE productos SET 
        				nombre          = ?, 
        				categoria    	= ?,
        				precio     		= ?,
        				foto          	= ?, 
        				descripcion     = ?,
        				restaurante     = ?,
        				existencias     = ?
        		    WHERE id = ?";

        	$this->pdo->prepare($sql)
        	     ->execute(
        		array(
        			$data->__GET('nombre'), 
        			$data->__GET('categoria'), 
        			$data->__GET('precio'),
        			$data->__GET('foto'),
        			$data->__GET('descripcion'),
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
     * Guarda en la BD el producto dado
     * @param \Producto $data
     */
    public function crear($data)
    {
        $consec=0;
        try 
        {
        $sql_aux= "SELECT id FROM productos";
        $stmt=$this->pdo->prepare($sql_aux);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row) { 
           	echo $row["id"];
           	$consec = $row["id"];
        }
        $consec+=1;
        $sql = "INSERT INTO productos (id,nombre,categoria,precio,foto,descripcion, restaurante,existencias) 
                VALUES ($consec, ?, ?, ?,?,?,?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('nombre'), 
        			$data->__GET('categoria'), 
        			$data->__GET('precio'),
        			$data->__GET('foto'),
        			$data->__GET('descripcion'),
        			$data->__GET('restaurante'),
        			$data->__GET('existencias')
        		)
        	);
        } catch (Exception $e) 
        {
        	die($e->getMessage());
        }
    }

    /**
     * Pone como alternativa a un produto otro producto
     * @param int $prod
     * @param int $alt
     */
    public function crearAlternativa($prod, $alt)
    {
        try 
        {

        $sql = "INSERT INTO alternativas_productos (producto,alternativa) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(array($prod,$alt));
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

        	$stm = $this->pdo->prepare("SELECT * FROM productos b, alternativas_productos c WHERE c.producto=? AND b.id=c.alternativa");
        	$stm->execute(array($id));

        	foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        	{
        		$prod = new Producto();

        		$prod->__SET('id', $r->id);
        		$prod->__SET('nombre', $r->nombre);
        		$prod->__SET('categoria', $r->categoria);
        		$prod->__SET('precio', $r->precio);
        		$prod->__SET('foto', $r->foto);
        		$prod->__SET('descripcion', $r->descripcion);
        		$prod->__SET('restaurante', $r->restaurante);
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

    /**
     * @param string $restaurante
     */
    public function getProductosPorRestaurante($restaurante)
    {
        // TODO: implement here
    }

    /**
     * @param string $categoria
     */
    public function getProductosPorCategoria($categoria)
    {
        // TODO: implement here
    }

    /**
     * @param int $idMenu
     */
    public function getProductosPorMenu($idMenu)
    {
        // TODO: implement here
    }

    /**
     * @param int $idPedido
     */
    public function getProductosPorPedido($idPedido)
    {
        // TODO: implement here
    }

    /**
     * @param int $idProducto
     * @param int $idAlternativa
     */
    public function eliminarAlternativa($idProducto, $idAlternativa)
    {
        // TODO: implement here
    }
}
