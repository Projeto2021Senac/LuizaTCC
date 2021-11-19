<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
define('TITLE', 'Cadastrar Rastreio');
define('BTN', 'cadastrarRastreio');
define('IDENTIFICACAO', '0');
//define('IDENTIFICACAO', 1);



/* echo "<pre>"; print_r($_SESSION); echo "<pre>";exit; */
use Classes\Entity\rastreio;
use Classes\Entity\terceiro;
use Classes\Entity\terceirizado;
use Classes\Entity\tratamento;

$innerTratamento= "";

//$consulta = consulta::getConsultas();
//$procedimento = procedimento::getProcedimentos();

$terceiro = terceiro::getTerceiros();



//$selectTerceiro= '<script>document.write(selectTerceiro)</script>';
    //echo $selectTerceiro;

//echo'<pre>';print_r($selectTerceiro);echo'</pre>';exit;


   


if (isset($_GET['rProtese'])) {
    $innerTratamento = tratamento::getTratamentoInner($_GET['rProtese']);
    //echo'<pre>';print_r($innerTratamento);echo'</pre>';exit;
}

  //echo'<pre>';print_r($innerTratamento);echo'</pre>';exit;


$rastreio = new rastreio();


$terceirizado = new terceirizado();

if (isset($_POST['cadastrarRastreio'])) {

        
        $rastreio->dtEntrega = ($_POST['dtEntrega']);
        $rastreio->dtRetorno = $_POST['dtRetorno'];
        $rastreio->obs = $_POST['obs'];
        $rastreio->vlrCobrado = $_POST['vlrCobrado'];
        $rastreio->statusRastreio = $_POST['status'];
        $rastreio->RFKTerceiro = $_POST['RFKTerceiro'];
        $rastreio->RFKServico = $_POST['RFKServico'];
        $rastreio->fkProtese = $_POST['fkProtese'];
        //$terceirizado->fkTerceiro = $rastreio->RFKTerceiro;
        //$terceirizado->fkServicoTerceiro = $rastreio->RFKServico;
       /* echo'<pre>';print_r($rastreio);echo'</pre>';exit; */
        unset($_POST['cadastrarRastreio']);
        
        /* echo'<pre>';print_r($rastreio);echo'</pre>';exit; */
        
        //$terceirizado->cadastrarTerceirizado();
        $rastreio->cadastrarRastreio();
        
        
        
        header ('Location: listaRastreio.php?status=success');

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroDentista.php'\">";
    
}
if (isset($_GET['rProtese'])) {

    $rastreio->fkProtese = $_GET['rProtese'];
}


/*if (isset($_POST['pConsultaRast'])){
    header ('Location: listaConsultaR.php?rastreio=check');
}*/

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formRastreio.php';

include __DIR__.'/includes/footer.php';
 
