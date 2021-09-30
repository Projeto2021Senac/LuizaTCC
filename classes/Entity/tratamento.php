<?php

namespace Classes\Entity;

use Classes\Dao\db;
use PDO;

class tratamento
{

    public $fkProcedimento;
    public $fkConsulta;
    public $observacoes;


    public function cadastrarTratamento()
    {
        $tratamento = (new db('tratamento'))->insertSQL([
            'fkConsulta' => $this->fkConsulta,
            'fkProcedimento' => $this->fkProcedimento,
            'observacao' => $this->observacoes

        ]);
        return $tratamento;
    }

    public static function getTratamentos($tabela = null,$where = null,$innerjoin = null, $like = null, $order = null, $limit = null, $fields = '*'){
        
        if ($tabela != null){
            $tabela = ','.$tabela;
        }
        
        return $db = (new db('tratamentos'.$tabela))->selectSQL($where,$like,$order, $limit, $fields,$innerjoin)
                                                  ->fetchObject(self::class);
    }  
}
