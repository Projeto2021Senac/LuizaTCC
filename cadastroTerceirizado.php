<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\terceirizado;
define('BTN', 'Salvar');
define('TITLE','Cadastro Tercerizado');
$objterceirizado = new terceirizado;
$objTerceiro = $objterceirizado-> objServicoTerceiro;

if (isset($_POST['Salvar'])){
/* echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $objterceirizado->nometerceirizado = $_POST['nometerceirizado'];
   
/*     echo '<pre>';print_r($objterceirizado);echo '<pre>';exit; */
    
    $objterceirizado->cadastrarTerceirizado();
   
    if ($objterceirizado->idterceirizado > 0){
        header ('Location: listaterceirizado.php?status=success&id='.$objterceirizado->idterceirizado);
    }else{
        header ('Location: listaterceirizado.php?status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioterceirizado.php';
include __DIR__.'/includes/footer.php';
