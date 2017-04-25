<?php


/**
 * Cliente o comensal del restaurante
 */
class Cliente
{

    /**
     * @var string Identificación del cliente
     */
    private $id;

    /**
     * @var string Nombre completo del cliente
     */
    private $nombre;

    /**
     * @var array Lista de pedidos que ha realizado el cliente
     */
    private $pedidos;






    /**
     * Constructor de clase Cliente
     * @param string $id Identificador del cliente
     * @param string $nombre Nombre del cliente
     */
    public function __construct($id, $nombre)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->pedidos=[];
    }

    /**
     * Constructor que debe ser usado cuándo solo se tiene el ID
     * @param string $id Identificador del cliente
     */
    public function __construct($id)
    {
        $this->id=$id;
        $this->nombre=null;
        $this->pedidos=[];
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
     * Agrega un pedido a la lista de pedidos
     * @param \Pedido $pedido Nuevo pedido
     */
    public function addPedido($pedido)
    {
        $this->pedidos[] = $pedido;
    }
}
