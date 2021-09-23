<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use \PDO;
class Tratamento{

    public $fkConsulta;
    public $fkProcedimento;
    public $obs;
    
   
    public function cadastrarTratamento(){

       $db = new db('tratamento');
        $this->fkConsulta= $db->insertSQL([
            'fkConsulta' => $this->fkConsulta,
            'fkProcedimento' => $this->fkProcedimento,
            'observacao' => $this->horaConsulta,
         
            
        ]);
    }
    

    /**
     * Função responsável por: executar a function presente em db.php->selectSQL passando os parâmetros desejados; Receber os dados pesquisados por ela; Atribuí-los
     * à classe por meio do PDO::FETCH_CLASS em várias instancias de uma só vez
     * Para mais informações sobre isso: descomentar a linha 14 de pesquisar.php. 
     * obs: pré requisito necessário: linhas já inseridas na tabela.
     *
     * @param string $where
     * @param string $like
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return array
     */
    public static function getTratamentos($where = null, $like = null, $order = null, $limit = null, $fields = '*'){
        return (new db('tratamento'))->selectSQL($where,$like,$order,$limit,$fields)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */
    public static function getTratamento($fkConsulta){
        return (new db('tratamento'))->selectSQL('fkConsulta = '.$fkConsulta, "","","","", 'fkProcedimento= '.$fkProcedimento)
                                   ->fetchObject(self::class); 

    }
    
    public static function pesquisarTratamento($fkConsulta){
        return (new db('tratamento'))->pesquisarTratamento($fkConsulta)
                                   ->fetchObject(self::class);
}
}