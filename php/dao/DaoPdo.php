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
     * Constructor de la clase
     * @param string $dsn
     * @param string $user
     * @param string $password
     */
    public function __construct($dsn, $user, $password)
    {
        try{
        	$this->pdo = new PDO($dsn, $user, $password);
        	$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
        }catch(Exception $e){
        	die($e->getMessage());
        }
    }
}
