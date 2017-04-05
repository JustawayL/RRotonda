<?php
class DAO_Menu
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

			$stm = $this->pdo->prepare("SELECT * FROM menus");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$menu = new Menu();

				$menu->__SET('id', $r->id);
				$menu->__SET('nombre', $r->nombre);
				$menu->__SET('precio', $r->precio);
				$menu->__SET('restaurante', $r->restaurante);

				$result[] = $menu;
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
			          ->prepare("SELECT * FROM menus WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$menu = new Menu();

			$menu->__SET('id', $r->id);
			$menu->__SET('nombre', $r->nombre);
			$menu->__SET('precio', $r->precio);
			$menu->__SET('restaurante', $r->restaurante);
			

			return $menu;
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
			          ->prepare("DELETE FROM menus WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Menu $data)
	{
		try 
		{
			$sql = "UPDATE menus SET 
						nombre          = ?, 
						precio     		= ?,
						restaurante     = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('precio'), 
					$data->__GET('restaurante'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Menu $data)
	{
		$consec=0;
		try 
		{
		$sql_aux= "SELECT id FROM menus";
		$stmt=$this->pdo->prepare($sql_aux);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $row) { 
        	echo $row["id"];
        	$consec = $row["id"];
    	}
    	$consec+=1;
		$sql = "INSERT INTO menus (id,nombre,precio,restaurante) 
		        VALUES ($consec, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
				$data->__GET('precio'), 
				$data->__GET('restaurante'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}