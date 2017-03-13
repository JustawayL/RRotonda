<?php


/**
 *
 */
class Restaurante
{
    /**
     *
     */
    public function __construct()
    {
        $this->bd_info= array("servername" => "localhost", "username" => "user", "password" => "pass", "BD" => "rotonda");
    }
    /**
     * @var void
     */
    public $nombre;

    /**
     * @var void
     */
    public $direccion;

    /**
     * @var void
     */
    public $telefono;

    /**
     * @var void
     */
    public $descripcion;

    public $bd_info;


    /**
     *
     */

    public function registrarProducto($producto)
    {
        // TODO: implement here
        

        $mysqli = new mysqli($this->bd_info["servername"], $this->bd_info["username"], $this->bd_info["password"], $this->bd_info["BD"]);
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        echo $mysqli->host_info . "\n";

        $consec;
        $result=0;

        $sql = "SELECT id FROM productos";

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $consec = $row["id"];
                }
            }

        $consec+=1;
        
        $sql = "INSERT INTO productos (id, nombre, categoria, precio, foto, descripcion, restaurante, existencias)
        VALUES ( '$consec' , '$producto->nombre', '$producto->categoria', '$producto->precio', '$producto->foto' ,'$producto->descripcion', '$producto->restaurante','$producto->existencias')";


        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        

        $mysqli->close();

    }

    /**
     *
     */
    public function registrarMenu()
    {
        // TODO: implement here

    }

    /**
     *
     */
    public function registrarIngrediente($ingrediente)
    {
        // TODO: implement here
        $mysqli = new mysqli($this->bd_info["servername"], $this->bd_info["username"], $this->bd_info["password"],$this->bd_info["BD"]);
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $consec=0;

        $sql = "SELECT id FROM ingredientes";

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $consec = $row["id"];
                }
            }

        $consec+=1;
        
        $sql = "INSERT INTO ingredientes (id, nombre, restaurante, existencias)
        VALUES ( '$consec' , '$ingrediente->nombre', '$ingrediente->restaurante','$ingrediente->existencias')";


        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        

        $mysqli->close();
    }

    /**
     *
     */
    public function consultarProductos()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function consultarMenus()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function consultarIngredientes()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function consultarIngredientesPersonalizables()
    {
        // TODO: implement here
    }
}
