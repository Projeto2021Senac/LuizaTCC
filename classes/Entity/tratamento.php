<?php

namespace Classes\Entity;

use Classes\Dao\db;
use PDO;

class Tratamento
{

    public $fkProcedimento;
    public $fkConsulta;
    public $observacao;


    public function cadastrarTratamento()
    {
        $tratamento = (new db('tratamento'))->insertSQL([
            'fkConsulta' => $this->fkConsulta,
            'fkProcedimento' => $this->fkProcedimento,
            'observacao' => $this->observacao

        ]);
        return $tratamento;
    }

    public static function getTratamentos($tabela = null,$where = null,$innerjoin = null, $like = null, $order = null, $limit = null, $fields = '*'){
        
        if ($tabela != null){
            $tabela = ','.$tabela;
        }
        
        return $db = (new db('tratamento'.$tabela))->selectSQL($where,$like,$order, $limit, $fields,$innerjoin)
                                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }  

    public function atualizarStatusConsulta($id,$status){
        $db = new db('consulta');
        $this->idConsulta = $db->updateSQL('idConsulta = '.$id,[
            'statusConsulta' => $status
        ])[1];
    }
}
