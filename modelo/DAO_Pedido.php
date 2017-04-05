<?php
class DAO_Pedido
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

			$stm = $this->pdo->prepare("SELECT * FROM pedidos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$ped = new Pedido();

				$ped->__SET('id', $r->id);
				$ped->__SET('estado', $r->estado);
				$ped->__SET('cliente', $r->cliente);
				$ped->__SET('restaurante', $r->restaurante);
				$ped->__SET('fecha', $r->fecha);

				$result[] = $ped;
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
			          ->prepare("SELECT * FROM pedidos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$ped = new Pedido();

			$ped->__SET('id', $r->id);
			$ped->__SET('estado', $r->estado);
			$ped->__SET('cliente', $r->cliente);
			$ped->__SET('restaurante', $r->restaurante);
			$ped->__SET('fecha', $r->fecha);

			return $ped;
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
			          ->prepare("DELETE FROM pedidos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Pedido $data)
	{
		try 
		{
			$sql = "UPDATE pedidos SET 
						estado          = ?, 
						cliente     	= ?,
						restaurante     = ?,
				    	fecha     		= ?
				    	WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('estado'), 
					$data->__GET('cliente'), 
					$data->__GET('restaurante'),
					$data->__GET('fecha')
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Pedido $data)
	{
		$consec=0;
		try 
		{
		$sql_aux= "SELECT id FROM pedidos";
		$stmt=$this->pdo->prepare($sql_aux);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $row) { 
        	echo $row["id"];
        	$consec = $row["id"];
    	}
    	$consec+=1;
		$sql = "INSERT INTO pedidos (id,estado,cliente,restaurante,fecha) 
		        VALUES ($consec, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('estado'), 
				$data->__GET('cliente'), 
				$data->__GET('restaurante'),
				$data->__GET('fecha'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}