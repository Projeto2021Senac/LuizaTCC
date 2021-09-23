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
}
