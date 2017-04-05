<?php
class DAO_Cliente
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=rotonda', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
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

	public function Obtener($id)
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

	public function Eliminar($id)
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

	public function Actualizar(Cliente $data)
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

	public function Registrar(Cliente $data)
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