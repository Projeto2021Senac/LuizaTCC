<?php

namespace Classes\Entity;

/**
 * Description of dentista
 *
 * @author Fernando
 */
use Classes\Dao\db;
use \PDO;

class dentista {
    
    public $idDentista;
    public $nomeDentista;
    public $statusDentista;
   

//Método de cadastramento dentista
//    @return boolean

    public function cadastrarDentista() {
        $db = new db('dentista');
        $this->idDentista = $db->insertSQL([
            'nomeDentista' => $this->nomeDentista,
            'statusDentista' => $this->statusDentista,
           
        ]);
    }

    /**
     * método de atualização 
     * return boolean
     */
    public function editarDentista() {
        return (new db('dentista'))->
                        updateSQL('idDentista= ' .$this->idDentista,[
                                                            'nomeDentista' => $this->nomeDentista,
                                                            'statusDentista' => $this->statusDentista,
                                                        ]);
    }
    
    
/**  Método para listar dentista do banco
 * 
 * @param string $where
 * @param string $order
 * @param string $limit
 * return array
 */  
    public static function getDentistas($where = null, $like = null, $order = null, $limit= null) {
        return (new db('dentista'))->selectSQL($where, $like, $order, $limit)
                ->fetchAll(PDO::FETCH_CLASS, self::class);

      
    }
    
    
    /**
         * Método de pesquisa pelo ID
         * @param integer $idDentista
         * return dentista
         */
    public static function getDentista($idDentista) {
        return (new db('dentista'))->selectSQL('idDentista = ' .$idDentista)
                   ->fetchObject(self::class) ;
    }
}
