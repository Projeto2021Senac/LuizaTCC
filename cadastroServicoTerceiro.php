<?php

require __DIR__.'/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use \Classes\Entity\ServicoTerceiro;

define('TITLE','Cadastro Serviço Terceiro');
define('BTN','Salvar');
$objServicoTerceiro = new ServicoTerceiro;
if (isset($_POST['Salvar'])){

    $objServicoTerceiro->nomeServico = $_POST['nomeServico'];
    $objServicoTerceiro->descricao = $_POST['descricao'];
    $objServicoTerceiro->statusServicoTerceiro = $_POST['statusServicoTerceiro'];
    /* echo '<pre>';print_r($objServicoTerceiro);echo '<pre>';exit; */
    
    $objServicoTerceiro->cadastro();
   
    if ($objServicoTerceiro->idServico> 0){
        header ('Location: index.php?pagina=1&status=success');
    }else{
        header ('Location: index.php?pagina=1&status=error');}
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioServicoTerceiro.php';
include __DIR__.'/includes/footer.php';
