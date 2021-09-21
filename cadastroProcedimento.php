<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\procedimento;

define('TITLE','Cadastro Procedimento');

$objProcedimento = new Procedimento;
if (isset($_POST['nome'])){

    $objProcedimento->nome = $_POST['nomeProcedimento'];
    $objProcedimento->statusProcedimento = $_POST['statusProcedimento'];
    //echo '<pre>';print_r($objProcedimento);echo '<pre>';exit;
    
    $objProcedimento->cadastro();
   
    if ($objProcedimento->idProcedimento > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error'); }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioProcedimento.php';
include __DIR__.'/includes/footer.php';
