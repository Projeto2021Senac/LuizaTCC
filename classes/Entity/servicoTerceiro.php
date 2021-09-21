<?php

namespace Classes\Entity;

/**
 * Description of rastreio
 *
 * @author 02520429135
 */
use Classes\Dao\db;
use \PDO;

class servicoTerceiro {

    public $idServico;
    public $nomeServico;
    public $descricao;
    public $statusServicoTerceiro;

    //Método de cadastramento servicoTerceiro
//    @return boolean
    public function CadastrarServicoTerceiro() {
        $db = new db('servicoTerceiro');
        $this->idServico = $db->insertSQL([
            'nomeServico' => $this->nomeServico,
            'descricao' => $this->descricao,
            'statusServicoTerceiro' => $this->statusServicoTerceiro,
        ]);
        if ($this->idServico > 0) {
            header('Location: listaServicoTerceiro.php?status=success');
        } else {
            header('Location: listaServicoTerceiro.php?status=error');
        }
    }

    public function editarServicoTerceiro() {
        return (new db('servicoTerceiro'))->
                        updateSQL('idServico= ' . $this->idServico, [
                            'nomeServico' => $this->nomeServico,
                            'descricao' => $this->descricao,
                            'statusServicoTerceiro' => $this->statusServicoTerceiro,
        ]);
    }

    public static function getServicoTerceiros($where = null, $like = null, $order = null, $limit = null) {
        return (new db('servicoTerceiro'))->selectSQL($where, $like, $order, $limit)
                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getServicoTerceiro($idRastreio) {
        return (new db('servicoTerceiro'))->selectSQL('idServico = ' . $idServico)
                        ->fetchObject(self::class);
    }

}
