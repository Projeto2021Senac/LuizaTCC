<?php

namespace Classes\Entity;

use Classes\Dao\db;
use PDO;

class Tratamento
{

    public $fkProcedimento;
    public $fkConsulta;
    public $observacao;

    public function cadastrarTratamento() {
        $tratamento = (new db('tratamento'))->insertSQL([
            'fkConsulta' => $this->fkConsulta,
            'fkProcedimento' => $this->fkProcedimento,
            'observacoes' => $this->observacao

        ]);
        return $tratamento;
    }

    public static function getTratamentos($tabela = null, $where = null, $innerjoin = null, $like = null, $order = null, $limit = null, $fields = '*') {

        if ($tabela != null) {
            $tabela = ',' . $tabela;
        }

        return $db = (new db('tratamento' . $tabela))->selectSQL($where, $like, $order, $limit, $fields, $innerjoin)
                ->fetchAll(PDO::FETCH_CLASS ,self::class);
    }

    public static function getTratamentosInner($pesq) {


        return $db = (new db)->executeSQL('SELECT * FROM `consulta` INNER JOIN tratamento on tratamento.fkConsulta = idConsulta and tratamento.fkProcedimento in 
        (SELECT idProcedimento from procedimento where nomeProcedimento in ("Protese")) 
        INNER JOIN protese,clinica,dentista,paciente,procedimento where protese.fkConsultaT = tratamento.fkConsulta and protese.idProtese not in (SELECT fkProtese from rastreio) and CFKClinica = idClinica and CFKDentista = idDentista and 
        fkProntuario = prontuario and fkProcedimento = idProcedimento'. $pesq)
                ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

   public static function getTratamentoInner($pro) {


        return $db = (new db)->executeSQL('SELECT * FROM tratamento '
                        . 'inner JOIN consulta on fkConsulta=idConsulta '
                        . 'inner JOIN dentista on CFKDentista=idDentista '
                        . 'inner JOIN clinica on CFKClinica=idClinica '
                        . 'inner JOIN procedimento on fkProcedimento=idProcedimento '
                        . 'inner JOIN paciente on fkProntuario=prontuario '
                        . 'inner JOIN protese on fkProcedimento=fkProcedimentoT '
                        . 'where idProtese='.$pro)
                ->fetchObject(self::class);
    }

    public function atualizarStatusConsulta($id,$status){
        $db = new db('consulta');
        $this->idConsulta = $db->updateSQL('idConsulta = '.$id,[
            'statusConsulta' => $status
        ])[1];
    }

}
