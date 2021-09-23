<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\ServicoTerceiro;

define('TITLE','Cadastro Serviçoo Terceiro');
define('BTN','Salvar');
$objServicoTerceiro = new ServicoTerceiro;
if (isset($_POST['Salvar'])){

    $objServicoTerceiro->nomeServico = $_POST['nomeServico'];
    $objServicoTerceiro->telefone = $_POST['telefone'];
    $objServicoTerceiro->statusServicoTerceiro = $_POST['statusServicoTerceiro'];
    /* echo '<pre>';print_r($objServicoTerceiro);echo '<pre>';exit; */
    
    $objServicoTerceiro->cadastro();
   
    if ($objServicoTerceiro->idServico> 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioServicoTerceiro.php';
include __DIR__.'/includes/footer.php';
