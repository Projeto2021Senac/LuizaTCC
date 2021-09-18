<?php

require __DIR__.'vendor/autoload.php';
use \Classes\Entity\Procedimento;

define('TITLE', 'Editar Procedimento');
define('BTN', 'editarProcedimento');

if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header ('Location: cadastrarProcedimento.php?status=error');
}
$objProcedimento = Procedimento::getProcedimento($_GET['id']);


if(!$objProcedimento instanceof Procedimento){
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['idProcedimento'],$_POST['nomeProcedimento'])){
    
    $objProcedimento = new Procedimento;
    $objProcedimento->nomeProcedimento = $_POST['nomeProcedimento'];
    
    $objProcedimento->cadastro();
    $objProcedimento->AtualizarProcedimento();

    header ('Location: index.php?status=success');

/*     if ($objProcedimento->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioProcedimento.php';
include __DIR__ . '/includes/footer.php';
