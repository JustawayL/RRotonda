<?php
class DAO_Restaurante
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

			$stm = $this->pdo->prepare("SELECT * FROM restaurantes");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$rest = new Restaurante();

				$rest->__SET('nombre', $r->nombre);
				$rest->__SET('direccion', $r->direccion);
				$rest->__SET('telefono', $r->telefono);
				$rest->__SET('descripcion', $r->descripcion);

				$result[] = $rest;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($nombre)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM restaurantes WHERE nombre = ?");
			          

			$stm->execute(array($nombre));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$rest = new Restaurante();

			$rest->__SET('nombre', $r->nombre);
			$rest->__SET('direccion', $r->direccion);
			$rest->__SET('telefono', $r->telefono);
			$rest->__SET('descripcion', $r->descripcion);

			return $rest;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($nombre)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM restaurantes WHERE nombre = ?");			          

			$stm->execute(array($nombre));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Restaurante $data)
	{
		try 
		{
			$sql = "UPDATE restaurantes SET 
						direccion     	= ?,
						telefono     = ?,
				    	descripcion     		= ?
				    	WHERE nombre = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('direccion'), 
					$data->__GET('telefono'), 
					$data->__GET('descripcion'),
					$data->__GET('nombre')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Restaurante $data)
	{

		$sql = "INSERT INTO restaurantes (nombre,direccion,telefono,descripcion) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('direccion'), 
				$data->__GET('telefono'), 
				$data->__GET('descripcion'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}