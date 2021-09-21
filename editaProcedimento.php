<?php

require __DIR__.'/vendor/autoload.php';
use \Classes\Entity\Procedimento;

define('TITLE','Editar Procedimento');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header ('Location: index.php?status=error');
}

$objProcedimento =Procedimento::getProcedimento($_GET['id']);



//if (!$objProcedimento instanceof Procedimento){
    header ('Location: index.php?status=error');
    exit;
//}

if (isset($_POST['nome'],$_POST['status'])){
    
    $objProcedimento = new procedimento;
    $objProcedimento->idProcedimento = $_GET['id'];
    $objProcedimento->nome = $_POST['nome'];
    $objProcedimento->statusProcedimento =$_POST['status'];
    //echo '<pre>';print_r($objProcedimento);echo '<pre>';exit;
         
    $objProcedimento->AtualizarProcedimento();

    header ('Location: index.php?status=success');

/*     if ($objProcedimento->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioProcedimento.php';
include __DIR__.'/includes/footer.php';
