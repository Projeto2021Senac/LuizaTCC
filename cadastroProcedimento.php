<?php

require __DIR__.'/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use \Classes\Entity\procedimento;

define('TITLE','Cadastrar Procedimento');
define('IDENTIFICACAO', '0');
$objProcedimento = new Procedimento;
if (isset($_POST['nomeProcedimento'])){

    $objProcedimento->nomeProcedimento = $_POST['nomeProcedimento'];
    $objProcedimento->statusProcedimento = $_POST['statusProcedimento'];
    //echo '<pre>';print_r($objProcedimento);echo '<pre>';exit;
    
    $objProcedimento->cadastro();
   
    if ($objProcedimento->idProcedimento > 0){
        header ('Location: listaProcedimento.php?pagina=1&status=success');
    }else{
        header ('Location: listaProcedimento.php?pagina=1&status=error'); }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioProcedimento.php';
include __DIR__.'/includes/footer.php';
