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
     * Constructor que redirige al constructor correspondiente
     */
    public function __construct()
    {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámtros tendrá un nombre de función
        //atendiendo al siguiente modelo __construct1() __construct2()...
        $funcion_constructor ='__construct'.$num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this,$funcion_constructor)) {
        	//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
        	call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

    /**
     * Constructor de clase Cliente
     * @param string $id Identificador del cliente
     * @param string $nombre Nombre del cliente
     */
    public function __construct2($id, $nombre)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->pedidos=[];
    }

    /**
     * Constructor que debe ser usado cuándo solo se tiene el ID
     * @param string $id Identificador del cliente
     */
    public function __construct1($id)
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
