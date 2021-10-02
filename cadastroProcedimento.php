<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\procedimento;

define('TITLE','Cadastro Procedimento');

$objProcedimento = new Procedimento;
if (isset($_POST['nome'])){
    
    $objProcedimento->nomeProcedimento = $_POST['nome'];
    $objProcedimento->statusProcedimento = $_POST['status'];
    /* echo '<pre>';print_r($objProcedimento);echo '<pre>';exit; */
    
    $objProcedimento->cadastrar();
   
    if ($objProcedimento->idProcedimento > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error'); }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioProcedimento.php';
include __DIR__.'/includes/footer.php';
