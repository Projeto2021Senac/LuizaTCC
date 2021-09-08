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

        $db = (new db('consulta'))->selectSQL($where,$like,$order, $limit, $fields)
                                 ->fetchAll(PDO::FETCH_CLASS,self::class);
                                 //echo "<pre>"; print_r($db); echo "<pre>";exit;
    
    }


    public static function getConsulta($id){
        $db = (new db('consulta'))->selectSQL('where idConsulta ='.$id)
                                  ->fetchObject(self::class);
    }                           
}



?>
