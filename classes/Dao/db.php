<?php

namespace Classes\Dao;

use PDO;
use PDOException;

class db
{

    /**
     * Nome do host do mysql
     * @var string
     */
    const HOST = 'localhost';


    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'dbprotetico';

    /**
     * Usuario de acesso ao banco de dados
     * @var string
     */
    const USER = 'root';

    /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = 'senac';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */

    private $table;

    /**
     * Instancia de PDO para conectar com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexao
     * @var string
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }


    /**
     * Cria a conexão com o banco de dados
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        } catch (PDOException $e) {
            die('ERROR' . $e->getMessage());
        }
    }
    /**
     * Método que executa as queries dentro do banco de dados
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR' . $e->getMessage());
        }
    }
    /**
     * Método responsável por inserir dados no banco
     *
     * @param array $values [field => value] 
     * @return integer ID inserido
     */
    public function insert($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');


        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') values (' . implode(',', $binds) . ')';
    //echo $query;
        $this->execute($query,array_values($values));

        return $this->connection->lastInsertId();
    }
    
    /**
     * Método para executar uma consulta
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields 
     * @return PDOStatement
     */
    public function select($where = null, $like = null, $order = null, $limit = null, $fields ='*')
    {
       $where = strlen($where)? 'WHERE '.$where : '';
       $like = strlen($like) ? 'LIKE '.$like : '';
       $order = strlen($order)? 'ORDER BY '.$order : ''; 
       $limit = strlen($limit)? 'LIMIT '.$limit : ''; 
               
       $query = 'SELECT '.$fields.' FROM '. $this->table.' '.$where.' '.$like.' '.$order.' '.$limit;
        return $this->execute($query);
    }
   
    
    /**
     * Método de edição 
     * @param string $where 
     * @param array $values
     * @return boolean;
     */
    public function update($where, $values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        


        $query = 'UPDATE ' . $this->table . ' SET '.implode('=?,', $fields).'=? WHERE '.$where;
        
        $this->execute($query,array_values($values));

       return true;
    }
    
    
}
