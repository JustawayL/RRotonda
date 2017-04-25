<?php


/**
 * Ingrediente necesario para hacer un producto
 */
class Ingrediente
{

    /**
     * @var int Identificador del ingrediente
     */
    private $id;

    /**
     * @var string Nombre del ingrediente
     */
    private $nombre;

    /**
     * @var int Número de existencias del ingrediente
     */
    private $existencias;

    /**
     * @var array Array con los ingredientes alternativos
     */
    private $alternativas;




    /**
     * Constructor clase Ingrediente
     * @param string $nombre Nombre del ingrediente
     * @param int $existencias Número de existencias
     */
    public function __construct($nombre, $existencias)
    {
        $this->id=null;
        $this->nombre=$nombre;
        $this->existencias=$existencias;
        $this->alternativas=[];
    }

    /**
     * Constructor solo con ID
     * @param int $id Identificador del ingrediente
     */
    public function __construct($id)
    {
        $this->id=$id;
        $this->nombre=null;
        $this->existencias=null;
        $this->alternativas=[];
    }

    /**
     * Get genérico de php para todos los atributos
     * @param void $k Nombre del atributo
     */
    public function __get($k)
    {
        return $this->$k;
    }

    /**
     * Set genérico para todos los atributos
     * @param void $k Nombre del atributo
     * @param void $v Valor que se le asigna al atributo
     */
    public function __set($k, $v)
    {
        return $this->$k = $v;
    }

    /**
     * Agrega un ingrediente alternativo al actual
     * @param \Ingrediente $alternativa Ingrediente alternativo
     */
    public function addAlternativa($alternativa)
    {
        $this->alternativas[]=$alternativa;
    }
}
