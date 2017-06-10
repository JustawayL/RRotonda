<?php


/**
 * DAO para los estados de los pedidos
 */
class DaoEstadoPedidos extends DaoPdo
{

    /**
     * @param string $estado
     */
    public function crear($estado)
    {
        // TODO: implement here
         try 
        {
        $sql = "INSERT INTO estados (tipo)
                VALUES (?)";

        $this->pdo->prepare($sql)
             ->execute(
            array($estado));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /**
     *
     */
    public function getEstadosPedidos()
    {
        // TODO: implement here
         try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM estados");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                        
                $result[] = $r->tipo;
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
     * @param string $nuevo
     */
    public function actualizar($anterior, $nuevo)
    {
        // TODO: implement here
        try 
        {
            $sql = "UPDATE estados SET 
                        tipo          = ?
                    WHERE tipo = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $nuevo,
                    $anterior
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /**
     * @param string $estado
     */
    public function eliminar($estado)
    {
        // TODO: implement here
         try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM estados WHERE tipo = ?");                     

            $stm->execute(array($estado));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
