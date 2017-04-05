<?php
class DAO_Producto
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

			$stm = $this->pdo->prepare("SELECT * FROM productos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$prod = new Producto();

				$prod->__SET('id', $r->id);
				$prod->__SET('nombre', $r->nombre);
				$prod->__SET('categoria', $r->categoria);
				$prod->__SET('precio', $r->precio);
				$prod->__SET('foto', $r->foto);
				$prod->__SET('descripcion', $r->descripcion);
				$prod->__SET('restaurante', $r->restaurante);
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

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM productos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$prod = new Producto();

			$prod->__SET('id', $r->id);
			$prod->__SET('nombre', $r->nombre);
			$prod->__SET('categoria', $r->categoria);
			$prod->__SET('precio', $r->precio);
			$prod->__SET('foto', $r->foto);
			$prod->__SET('descripcion', $r->descripcion);
			$prod->__SET('restaurante', $r->restaurante);
			$prod->__SET('existencias', $r->existencias);
			return $prod;
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
			          ->prepare("DELETE FROM productos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Producto $data)
	{
		try 
		{
			$sql = "UPDATE productos SET 
						nombre          = ?, 
						categoria    	= ?,
						precio     		= ?,
						foto          	= ?, 
						descripcion     = ?,
						restaurante     = ?,
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

	public function Registrar(Producto $data)
	{
		$consec=0;
		try 
		{
		$sql_aux= "SELECT id FROM productos";
		$stmt=$this->pdo->prepare($sql_aux);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $row) { 
        	echo $row["id"];
        	$consec = $row["id"];
    	}
    	$consec+=1;
		$sql = "INSERT INTO productos (id,nombre,categoria,precio,foto,descripcion, restaurante,existencias) 
		        VALUES ($consec, ?, ?, ?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
					$data->__GET('categoria'), 
					$data->__GET('precio'),
					$data->__GET('foto'),
					$data->__GET('descripcion'),
					$data->__GET('restaurante'),
					$data->__GET('existencias')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}