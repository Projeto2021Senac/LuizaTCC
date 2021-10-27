<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\terceirizado;
use \Classes\Entity\terceiro;
use \Classes\Entity\ServicoTerceiro;


define('BTN', 'Salvar');
define('TITLE','Cadastro Tercerizado');
$objterceirizado = new terceirizado;
$objTerceiro = terceiro::getTerceiros();
$objServicoTerceiro = ServicoTerceiro:: getServicoTerceiros() ;

if (isset($_POST['Salvar'])){
/*echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $objterceirizado->fkTerceiro= $_POST['Terceiro'];
    $objterceirizado->fkServicoTerceiro= $_POST['ServicoTerceiro'];
   
  echo '<pre>';print_r($objterceirizado);echo '<pre>';exit; 
    
    $objterceirizado->cadastoTerceirizado();
   
    if ($objterceirizado->idterceirizado > 0){
        header ('Location: listaterceirizado.php?status=success&id='.$objterceirizado->idterceirizado);
    }else{
        header ('Location: listaterceirizado.php?status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioterceirizado.php';
include __DIR__.'/includes/footer.php';
