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
    public $TFKProcedimento;
    public $RFKTerceiro;
    public $RFKServico;
    public $statusRastreio;
    

    //Método de cadastramento da rastreio
//    @return boolean
    public function CadastrarRastreio() {
        
        $db = new db('rastreio');
        $this->idRastreio = $db->insertSQL([
            'dtEntrega' => $this->dtEntrega,
            'dtRetorno' => $this->dtRetorno,
            'obs' => $this->obs,
            'vlrCobrado' => $this->vlrCobrado,
            'TFKConsulta' => $this->TFKConsulta,
            'TFKProcedimento' => $this->TFKProcedimento,
            'RFKTerceiro' => $this->RFKTerceiro,
            'RFKServico' => $this->RFKServico,
            'statusRastreio' => $this->statusRastreio,
        ]); //echo'<pre>';print_r($this);echo'</pre>';exit;
        if ($this->idRastreio > 0) {
            header('Location: listaRastreio.php?status=success');
        } else {
            header('Location: listaRastreio.php?status=error');
        }
    }

    public function editarRastreio() {
        return (new db('rastreio'))->
                        updateSQL('idRastreio= ' . $this->idRastreio, [
                            'dtEntrega' => $this->dtEntrega,
                            'dtRetorno' => $this->dtRetorno,
                            'obs' => $this->obs,
                            'vlrCobrado' => $this->vlrCobrado,
                            'TFKConsulta' => $this->TFKConsulta,
                            'TFKProcedimento' => $this->TFKProcedimento,
                            'RFKTerceiro' => $this->RFKTerceiro,
                            'RFKServico' => $this->RFKServico,
                            'statusRastreio' => $this->statusRastreio,
        ]);
    }

   
    public static function getRastreios($where = null, $like = null, $order = null, $limit = null) {
        return (new db('rastreio'))->selectSQL($where, $like, $order, $limit)
                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    
    public static function getRastreio($idRastreio) {
        return (new db('rastreio'))->selectSQL('idRastreio = ' . $idRastreio)
                        ->fetchObject(self::class);
    }
    
    public static function getRastreiosInner($pesq) {


        return $db = (new db)->executeSQL('SELECT * FROM rastreio '
                        . 'inner JOIN consulta on TFKConsulta=idConsulta '
                        . 'inner JOIN procedimento on TFKProcedimento=idProcedimento '
                        . 'inner JOIN paciente on fkProntuario=prontuario '
                        . 'inner JOIN terceiro on RFKTerceiro=idTerceiro '
                        . 'inner JOIN servicoterceiro on RFKServico=idServico '
                        . $pesq)
                ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    
   
    
    
    /*SELECT * FROM consulta c INNER JOIN tratamento t
ON c.idConsulta=t.fkConsulta
INNER JOIN paciente p
ON c.fkProntuario=p.prontuario
INNER JOIN procedimento pr
ON t.fkProcedimento=pr.idProcedimento;
*/
    
}
