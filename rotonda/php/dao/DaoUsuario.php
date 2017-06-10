<?php
require_once '/../modelo/Usuario.php';

/**
 * DAO para el Usuario
 */
class DaoUsuario extends DaoPdo
{

    /**
     * @param \Usuario $usuario
     */
    public function crear($usuario)
    {
        // TODO: implement here
         try 
        {
        $sql = "INSERT INTO usuarios (nombre,clave)
                VALUES (?, ?)";

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

    /**
     *
     */
    public function getUsuarios()
    {
        // TODO: implement here
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $usu = new Usuario($r->nombre,$r->clave);
                $usu->roles=$this->consultarRoles($r->nombre);
                        
                $result[] = $usu;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    /**
     * @param string $nombre
     */
    public function getUsuario($nombre)
    {
        try
        {
            $stm = $this->pdo
            ->prepare("SELECT * FROM usuarios WHERE nombre = ?");
            $stm->execute(array($nombre));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $usu = null;
            if($r!=null)
                $usu = new Usuario($r->nombre,$r->clave);
            return $usu;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param string $rol
     */
    public function getUsuariosPorRol($rol)
    {
        // TODO: implement here
        
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios u, usuarios_roles ur WHERE ur.rol=? AND u.nombre=ur.usuario");
            $stm->execute(array($rol));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $usu = new Usuario($r->nombre,$r->clave);
                        
                $result[] = $usu;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    /**
     * @param \Usuario $usuario
     */
    public function actualizar($usuario)
    {
        // TODO: implement here
         try 
        {
            $sql = "UPDATE usuarios SET 
                        clave    = ?

                    WHERE nombre = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $usuario->__GET('clave'),
                    $usuario->__GET('nombre')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /**
     * @param string $nombre
     */
    public function eliminar($nombre)
    {
        // TODO: implement here
         try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM usuarios WHERE nombre = ?");                     

            $stm->execute(array($nombre));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function consultarRoles($usuario)
    {
        # code...
          try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios_roles ur WHERE ur.usuario=?");
            $stm->execute(array($usuario));

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
}
