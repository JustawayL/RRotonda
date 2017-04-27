<?php


/**
 * Clase Abstracta DAO que utiliza PDO
 */
abstract class DaoPdo
{

    /**
     * @var PDO Objeto PDO
     */
    protected $pdo;


     /**
     * Constructor que redirige a los constructores correspondientes
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
     * Constructor de la clase
     * @param string $dsn
     * @param string $user
     * @param string $password
     */


    public function __construct3($dsn, $user, $password)
    {

        try{
        	$this->pdo = new PDO($dsn, $user, $password);
        	$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
        }catch(Exception $e){
        	die($e->getMessage());
        }
    }
    /**
     * Constructor de la clase
     * @param string $pdo
     **/
    public function __construct1($pdo)
    {
        $this->pdo = $pdo;
    }
}
