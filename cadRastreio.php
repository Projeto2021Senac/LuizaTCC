<?php

require 'vendor/autoload.php';

define('TITLE', 'Cadastrar Rastreio');
define('BTN', 'cadastrarRastreio');

use Classes\Entity\rastreio;
use Classes\Entity\consulta;
use Classes\Entity\procedimento;
use Classes\Entity\terceiro;
use Classes\Entity\servicoTerceiro;

$consulta = consulta::getConsulta();
$procedimento = procedimento::getProcedimento();
$terceiro = terceiro::getTerceiro();
$servico = servicoTerceiro::getServicoTerceiro();

$rastreio = new rastreio();

if (isset($_POST['dtEntrega'], $_POST['dtRetorno'], $_POST['TFKConsulta'], 
        $_POST['TFKProcedimento'], $_POST['RFKTerceiro'], $_POST['RFKServico'])) {

        
        $rastreio->dtEntrega = ($_POST['dtEntrega']);
        $rastreio->dtRetorno = $_POST['dtRetorno'];
        $rastreio->obs = $_POST['obs'];
        $rastreio->vlrCobrado = $_POST['vlrCobrado'];
        $rastreio->TFKConsulta = $_POST['TFKConsulta'];
        $rastreio->TFKProcedimento = $_POST['TFKProcedimento'];
        $rastreio->RFKTerceiro = $_POST['RFKTerceiro'];
        $rastreio->RFKServico = $_POST['RFKServico'];
        
        unset($_POST['cadastrarRastreio']);
        
        $rastreio->cadastrarRastreio();
        
        header ('Location: listaRastreio.php?status=success');

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroDentista.php'\">";
    
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formRastreio.php';
include __DIR__.'/includes/footer.php';
 