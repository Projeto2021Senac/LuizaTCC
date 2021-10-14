<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\funcionario;
define('BTN', 'Salvar');
define('TITLE','Cadastro Funcionário');
$objFuncionario = new Funcionario;
if (isset($_POST['Salvar'])){
/* echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $objFuncionario->nomeFuncionario = $_POST['nomeFuncionario'];
    $objFuncionario->dtContrato = $_POST['dtContrato'];
    $objFuncionario->sexo = $_POST['sexo'];
    $objFuncionario->telefone = $_POST['telefone'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->perfil = $_POST['perfil'];
    $objFuncionario->login = $_POST['login'];
    $objFuncionario->senha = $_POST['senha'];
    $objFuncionario->statusFuncionario = $_POST['status'];
/*     echo '<pre>';print_r($objFuncionario);echo '<pre>';exit; */
    
    $objFuncionario->cadastrar();
   
    if ($objFuncionario->idFuncionario > 0){
        header ('Location: listaFuncionario.php?status=success&id='.$objFuncionario->idFuncionario);
    }else{
        header ('Location: listaFuncionario.php?status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioFuncionario.php';
include __DIR__.'/includes/footer.php';
