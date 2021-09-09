<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use \PDO;
class ServicoConsulta{

    public $idServicoConsulta;
    public $nome;
    
   
    public function cadastrar(){

        $this->dataRegistro = date('Y-m-d H-i-s');

        $obdb = new db('ServicoConsulta');
        $this->idServicoConsulta= $obdb->insertSQL([ 'nome' => $this->nome]);
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
    public static function getServiConsulta($where = null, $like = null, $order = null, $limit = null, $fields = '*'){
        return (new db('Servicoconsulta'))->selectSQL($where,$like,$order,$limit,$fields)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */
    public static function getServicoConsulta($idServicoConsulta){
        return (new db('Servicoconsulta'))->selectSQL('id = '.$idServicoConsulta)
                                   ->fetchObject(self::class); 

    }
}
