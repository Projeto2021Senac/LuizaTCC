<?php

namespace Classes\Entity;

/**
 * Description of rastreio
 *
 * @author 02520429135
 */
use Classes\Dao\db;
use \PDO;

class rastreio {

    public $idRastreio;
    public $dtEntrega;
    public $dtRetorno;
    public $obs;
    public $vlrCobrado;
    public $TFKConsulta;
    public $TFKServico;
    public $RFKTerceiro;
    public $RFKServico;

    //Método de cadastramento da clinica
//    @return boolean
    public function CadastrarRastreio() {
        
    }

}
