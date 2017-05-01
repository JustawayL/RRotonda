<?php


/**
 * DAO  para los roles de usuario
 */
class DaoRolUsuario extends DaoPdo
{

    /**
     * @param string $rol
     */
    public function crear($rol)
    {
        // TODO: implement here
        try 
        {
        $sql = "INSERT INTO roles (rol)
                VALUES (?)";

        $this->pdo->prepare($sql)
             ->execute(
            array($rol));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /**
     *
     */
    public function getRoles()
    {
        // TODO: implement here
         try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM roles");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                        
                $result[] = $r->rol;
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
            $sql = "UPDATE roles SET 
                        rol          = ?
                    WHERE rol = ?";

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
     * @param string $rol
     */
    public function eliminar($rol)
    {
        // TODO: implement here
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM roles WHERE rol = ?");                     

            $stm->execute(array($rol));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    
}
