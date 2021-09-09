<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\ ServicoConsulta;
use Classes\Entity\ ServicoConsulta;

define('TITLE','Cadastrar Serviços de Consulta');

$objServicoConsulta = new ServicoConsulta;
if (isset($_POST['nome'])){

    $objServicoConsulta->nome = $_POST['nome'];
    echo '<pre>';print_r($objServicoConsulta);echo '<pre>';exit;
    
    $objServicoConsulta->cadastrar();
   
    if ($objServicoConsulta->idServicoConsulta > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioServicoConsulta.php';
include __DIR__.'/includes/footer.php';
