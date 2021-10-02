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
    
    /*public static function getTratamentosInner($tabela = null,$where = null,$innerjoin = null, $like = null, $order = null, $limit = null, $fields = '*'){
        
        if ($tabela != null){
            $tabela = ','.$tabela;
        }
        
        return $db = (new db('tratamento'.$tabela))->selectSQL($where,$like,$order, $limit, $fields,$innerjoin)
                                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    } */ 
   
    public static function getTratamentosInner(){
        
        
        return $db = (new db)->executeSQL('SELECT * FROM tratamento '
                . 'inner JOIN consulta on fkConsulta=idConsulta '
                . 'inner JOIN dentista on CFKDentista=idDentista '
                . 'inner JOIN clinica on CFKClinica=idClinica '
                . 'inner JOIN procedimento on fkProcedimento=idProcedimento '
                . 'inner join paciente on fkProntuario=prontuario ')
                                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }  
    
    public static function getTratamentoInner($proce, $cons){
        
        
        return $db = (new db)->executeSQL('SELECT * FROM tratamento '
                . 'inner JOIN consulta on fkConsulta=idConsulta '
                . 'inner JOIN dentista on CFKDentista=idDentista '
                . 'inner JOIN clinica on CFKClinica=idClinica '
                . 'inner JOIN procedimento on fkProcedimento=idProcedimento '
                . 'inner join paciente on fkProntuario=prontuario where fkProcedimento='.$proce.' and fkConsulta='.$cons)
                                                  ->fetchObject(self::class);
    }  
}
