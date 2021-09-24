<?php

namespace Classes\Entity;
use Classes\Dao\db;
use PDO;

class Consulta {
    public $idConsulta;
    public $dataConsulta;
    public $horaConsulta;
    public $statusConsulta;
    public $relatorio;
    public $fkProntuario;
    public $fkFuncionario;
    public $CFKDentista;
    public $CFKClinica;

    public function cadastrarConsulta(){

        $db = new db('consulta');
        $this->idConsulta = $db->insertSQL([
            'dataConsulta' => $this->dataConsulta,
            'horaConsulta' => $this->horaConsulta,
            'statusConsulta' => $this->statusConsulta,
            'relatorio' => $this->relatorio,
            'fkProntuario' => $this->fkProntuario,
            'fkFuncionario' => $this->fkFuncionario,
            'CFKDentista' => $this->CFKDentista,
            'CFKClinica' => $this->CFKClinica
            
        ]);
    }
    /**
     * Função
     *
     * @param string $where
     * @param string $like
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return array
     */
    public static function getConsultas($where = null, $like = null, $order = null, $limit = null, $fields = '*'){

       return $db = (new db('consulta'))->selectSQL($where,$like,$order, $limit, $fields)
                                 ->fetchAll(PDO::FETCH_CLASS,self::class);
                                // echo "<pre>"; print_r($db); echo "<pre>";exit;
    
    }


    public static function getConsulta($id){
      return  $db = (new db('consulta'))->selectSQL('idConsulta ='.$id)
                                  ->fetchObject(self::class);
                                  /* echo '<pre>';print_r($db);echo'<pre>';exit; */
                                  
    }   
    /**
     * Método de teste com innerjoin direto na classe
     *
     * @param string $where
     * @param string $like
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */

     /*
        Glossário:

        $tabelaPrimaria = tabela principal do select, a que vai no select from 'table';
        $tabela secundaria = tabela do 1º innerjoin, a que vai no INNER JOIN 'table';
        $tabela terciaria = tabela do 2º innerjoin, a que vai no INNER JOIN 'table';

        $condicaoTabelaPrimaria = campo fk da tabela primaria que vai ser comparado com o campo ID da tabela secundária ou terciária
        $condicaoTabelaSecundaria = campo ID que vai ser comparado à fk da tabela primaria.
        $condicaoTabelaTerciaria = campo ID que vai ser comparado à fk da tabela primaria.

        Fórmula do método: new db("$tabelaPrimaria,$tabelaSecundaria,$tabelaTeciaria(opcional)")
                                ->selectSQL($where,$like,$order,$limit,$fields,"$condicaoTabelaPrimaria,$condicaoTabelaSecundaria,$condicaoTabelaPrimaria(opcional),$condicaoTabelaTeciaria(opcional)")     
     */
    public static function getConsultaPaciente($where = null, $like = null, $order = null, $limit = null, $fields = '*'){
        return $db = (new db('consulta,paciente,dentista'))->selectSQL($where,$like,$order, $limit, $fields,'fkProntuario,prontuario,CFKDentista,idDentista')
                                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }                        
    
    /**
     * Get the value of paciente
     */ 
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Set the value of paciente
     *
     * @return  self
     */ 
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;

        return $this;
    }
    public function Atualizar($id){
        $db = new db('consulta');
        $this->idConsulta = $db->updateSQL('idConsulta = '.$id,[
            'dataConsulta' => $this->dataConsulta,
            'horaConsulta' => $this->horaConsulta,
            'statusConsulta' => $this->statusConsulta,
            'relatorio' => $this->relatorio,
            'fkProntuario' => $this->fkProntuario,
            'fkFuncionario' => $this->fkFuncionario,
            'CFKDentista' => $this->CFKDentista,
            'CFKClinica' => $this->CFKClinica
        ]);
    }
}

    

?>
