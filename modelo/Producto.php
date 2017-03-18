
<?php
class Producto
{
    private $id;
    private $nombre;
    private $categoria;
    private $precio;
    private $foto;
    private $descripcion;
    private $restaurante;
    private $existencias;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    public function cambiarIngrediente($Ingrediente)
    {
        // TODO: implement here
    }
}
