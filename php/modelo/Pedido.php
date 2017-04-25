<?php


/**
 * Pedido realizado por un cliente
 */
class Pedido
{

    /**
     * @var int Identificación del pedido
     */
    private $id;

    /**
     * @var string Estado del pedido (Por ejemplo: recibido)
     */
    private $estado;

    /**
     * @var \Cliente Cliente que realizó el pedido
     */
    private $cliente;

    /**
     * @var date Fecha y hora en la que se realizó el pedido
     */
    private $fecha;

    /**
     * @var array Menús que se pidieron en el pedido
     */
    private $menus;

    /**
     * @var array Productos del pedido
     */
    private $productos;

    /**
     * @var int
     */
    private $precio;




    /**
     * Constructor clase Pedido
     * @param string $estado Estado del pedido, de los que se encuentran definidos en la BD
     * @param \Cliente $cliente Cliente que realizó el pedido
     * @param date $fecha Fecha en que se realiza el pedido
     */
    public function __construct($estado, $cliente, $fecha)
    {
        $this->id=null;
        $this->estado=$estado;
        $this->cliente=$cliente;
        $this->fecha=$fecha;
        $this->menus=[];
        $this->productos=[];
        $this->precio=0;
    }

    /**
     * Constructor solo con ID
     * @param int $id Identificación del pedido
     */
    public function __construct($id)
    {
        $this->id=$id;
        $this->estado=null;
        $this->cliente=null;
        $this->fecha=null;
        $this->menus=[];
        $this->productos=[];
        $this->precio=0;
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
     * Agrega un menú al pedido
     * @param \Menu $menu
     */
    public function addMenu($menu)
    {
        $this->menu[]=$menu;
        $this->precio+=$menu->__get('precio');
    }

    /**
     * Agrega un producto al pedido
     * @param \Producto $producto
     */
    public function addProducto($producto)
    {
        $this->producto[]=$producto;
        $this->precio+=$producto->__get('precio');
    }
}
