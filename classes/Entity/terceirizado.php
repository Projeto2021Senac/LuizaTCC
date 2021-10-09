<?php

namespace Classes\Entity;

use Classes\Dao\db;
use PDO;

class Terceirizado
{

    public $fkTerceiro;
    public $fkServicoTerceiro;
   


    public function cadastrarTerceirizado()
    {
        $terceiro = (new db('terceirizado'))->insertSQL([
            'fkTerceiro' => $this->fkTerceiro,
            'fkServicoTerceiro' => $this->fkServicoTerceiro,
            
        ]);//echo'<pre>';print_r($terceiro);echo'</pre>';exit;
        return $terceiro;
    }

    
}
