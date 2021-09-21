<?php

namespace Classes\Entity;

/**
 * Description of rastreio
 *
 * @author 02520429135
 */
use Classes\Dao\db;
use \PDO;

class terceiro {

    public $idTerceiro;
    public $nomeTerceiro;
    public $telefone;
    public $statusTerceiro;

    //Método de cadastramento terceiro
//    @return boolean
    public function CadastrarTerceiro() {
        $db = new db('terceiro');
        $this->idTerceiro = $db->insertSQL([
            'nomeTerceiro' => $this->nomeTerceiro,
            'telefone' => $this->telefone,
            'statusTerceiro' => $this->statusTerceiro,
        ]);
        if ($this->idTerceiro > 0) {
            header('Location: listaTerceiro.php?status=success');
        } else {
            header('Location: listaTerceiro.php?status=error');
        }
    }

    public function editarTerceiro() {
        return (new db('terceiro'))->
                        updateSQL('idTerceiro= ' . $this->idTerceiro, [
                            'nomeTerceiro' => $this->nomeTerceiro,
                            'telefone' => $this->telefone,
                            'statusTerceiro' => $this->statusTerceiro,
        ]);
    }

    public static function getTerceiros($where = null, $like = null, $order = null, $limit = null) {
        return (new db('terceiro'))->selectSQL($where, $like, $order, $limit)
                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getTerceiro($idRastreio) {
        return (new db('terceiro'))->selectSQL('idTerceiro = ' . $idTerceiro)
                        ->fetchObject(self::class);
    }

}
