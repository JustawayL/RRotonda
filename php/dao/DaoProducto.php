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

        	$prod = new Producto($r->id);

        	$prod->__SET('nombre', $r->nombre);
        	$prod->__SET('categoria', $r->categoria);
        	$prod->__SET('precio', $r->precio);
        	$prod->__SET('foto', $r->foto);
        	$prod->__SET('descripcion', $r->descripcion);
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
        try{
        $sql = "INSERT INTO productos (nombre,categoria,precio,foto,descripcion,existencias) 
                VALUES (?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
        	array(
        		$data->__GET('nombre'), 
        			$data->__GET('categoria'), 
        			$data->__GET('precio'),
        			$data->__GET('foto'),
        			$data->__GET('descripcion'),
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
    /**
     * @param string $categoria
     */
    public function getProductosPorCategoria($categoria)
    {
        // TODO: implement here
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM productos WHERE categoria=?");
            $stm->execute(array($categoria));

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

    /**
     * @param int $idMenu
     */
    public function getProductosPorMenu($idMenu)
    {
        // TODO: implement here
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM productos b, menus_productos c WHERE c.menu=? AND b.id=c.producto");
            $stm->execute(array($idMenu));

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
