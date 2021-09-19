<?php

require 'vendor/autoload.php';

define('TITLE', 'Cadastrar Rastreio');
define('BTN', 'cadastrarRastreio');

use Classes\Entity\rastreio;

$rastreio = new rastreio();

if (isset($_POST['cadastrarRastreio'])) {

    if (!empty($_POST['TFKConsulta'])) {
        
        
        $rastreio->dtEntrega = ($_POST['dtEntrega']);
        $rastreio->dtRetorno = $_POST['dtRetorno'];
        $rastreio->obs = $_POST['obs'];
        $rastreio->vlrCobrado = $_POST['vlrCobrado'];
        $rastreio->TFKConsulta = $_POST['TFKConsulta'];
        $rastreio->TFKServico = $_POST['TFKServico'];
        $rastreio->RFKTerceiro = $_POST['RFKTerceiro'];
        $rastreio->RFKServico = $_POST['RFKServico'];
        
        unset($_POST['cadastrarRastreio']);
        
        $rastreio->cadastrarRastreio();
        
        header ('Location: listaRastreio.php?status=success');

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroDentista.php'\">";
    }
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formRastreio.php';
include __DIR__.'/includes/footer.php';
 