<?php
class DAO_Ingrediente
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

	public function Obtener($id)
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

	public function Eliminar($id)
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

	public function Actualizar(Ingrediente $data)
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

	public function Registrar(Ingrediente $data)
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
}