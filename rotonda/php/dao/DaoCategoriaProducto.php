<?php


/**
 * DAO para la categoría del producto
 */
class DaoCategoriaProducto extends DaoPdo
{

    /**
     * @param string $categoria
     */
    public function crear($categoria)
    {
        try 
        {

        $sql = "INSERT INTO categorias_productos(nombre) values (?)";
        $this->pdo->prepare($sql)
             ->execute(
            array(
                $categoria
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /**
     *
     */
    public function getCategorias()
    {
        // TODO: implement here

        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM categorias_productos");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
               
                $result[] = $r->nombre;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    /**
     * @param string $anterior
     * @param string $nueva
     */
    public function actualizar($anterior, $nueva)
    {
        // TODO: implement here
        
    }

    /**
     * @param string $categoria
     */
    public function eliminar($categoria)
    {
        // TODO: implement here
         try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM categorias_productos WHERE nombre = ?");                     

            $stm->execute(array($categoria));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
