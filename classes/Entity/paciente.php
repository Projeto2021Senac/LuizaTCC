<?php

/**
 * Descrição do paciente
 *
 * @author Fernando
 */

namespace Classes\Entity;

use Classes\Dao\db;
use \PDO;

class paciente {

    public $prontuario;
    public $nome;
    public $sexo;
    public $tel;
    public $email;

//Método de cadastramento do paciente
//    @return boolean

    public function cadastrarPaciente() {
        $db = new db('paciente');
        $this->prontuario = $db->insert([
            'nome' => $this->nome,
            'sexo' => $this->sexo,
            'tel' => $this->tel,
            'email' => $this->email,
        ]);
    }

    /**
     * método de atualização 
     * return boolean
     */
    public function editarPaciente() {
        return (new db('paciente'))->
                updateSQL('prontuario= ' .$this->prontuario,[
                                                            'nome' => $this->nome,
                                                            'sexo' => $this->sexo,
                                                            'tel' => $this->tel,
                                                            'email' => $this->email
                                                        ]);
    }
    
    
/**  Método para listar pacientes do banco
 * 
 * @param string $where
 * @param string $order
 * @param string $limit
 * return array
 */  
    public static function getPacientes($where = null, $like = null, $order = null, $limit= null) {
        return (new db('paciente'))->select($where, $like, $order, $limit)
                ->fetchAll(PDO::FETCH_CLASS, self::class);

      
    }
    
    
    /**
         * Método de pesquisa pelo ID
         * @param integer $prontuario
         * return paciente
         */
    public static function getPaciente($prontuario) {
        return (new db('paciente'))->select('prontuario = ' .$prontuario)
                   ->fetchObject(self::class) ;
    }

}
