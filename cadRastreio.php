<?php

require 'vendor/autoload.php';

define('TITLE', 'Cadastrar Rastreio');
define('BTN', 'cadastrarRastreio');

use Classes\Entity\rastreio;
use Classes\Entity\consulta;
use Classes\Entity\procedimento;
use Classes\Entity\terceiro;
use Classes\Entity\servicoTerceiro;
use Classes\Entity\tratamento;
$consulta = "";
$procedimento = "";

//$consulta = consulta::getConsultas();
//$procedimento = procedimento::getProcedimentos();
$terceiro = terceiro::getTerceiros();
$servico = servicoTerceiro::getServicoTerceiros();

if (isset($_GET['rConsulta'])) {
    $result = ($_GET['rConsulta']);
    $tratamento = tratamento::pesquisarTratamento($result);
    
    $consulta = consulta::getConsultaPaciente($tratamento->fkConsulta);
    
    $procedimento = procedimento::getProcedimentos();
    
    
        
    
    
    //echo'<pre>';print_r($result);echo'</pre>';exit;
    //echo'<pre>';print_r($consulta);echo'</pre>';exit;
    //echo'<pre>';print_r($tratamento);echo'</pre>';exit;
    //echo'<pre>';print_r($procedimento);echo'</pre>';exit;
}
//$tratamento = tratamento::pesquisarTratamento($_GET['rConsulta']));
  //echo'<pre>';print_r($tratamento);echo'</pre>';exit;
//echo'<pre>';print_r($procedimento);echo'</pre>';exit;

$rastreio = new rastreio();




if (isset($_POST['cadastrarRastreio'])) {

        
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

if (isset($_POST['pConsultaRast'])){
    header ('Location: pesquisarConsulta.php?rastreio=check');
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formRastreio.php';
include __DIR__.'/includes/footer.php';
 
