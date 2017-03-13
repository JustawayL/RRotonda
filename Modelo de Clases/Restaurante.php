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













    /**
     *
     */
    public function registrarProducto($producto):void
    {
        // TODO: implement here
        $mysqli = new mysqli("server", "user", "password", "BD");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        echo $mysqli->host_info . "\n";

        $sql = "INSERT INTO clientes (id, nombre, contrasena)
        VALUES ( '3' , 'Jhon', '111' )";


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
    public function registrarMenu():void
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function registrarIngrediente():void
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function consultarProductos():void
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function consultarMenus():void
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function consultarIngredientes():void
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function consultarIngredientesPersonalizables():void
    {
        // TODO: implement here
    }
}
