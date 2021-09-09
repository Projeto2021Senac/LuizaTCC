<?php

require __DIR__.'/vendor/autoload.php';
use \Classes\Entity\Funcionario;

define('TITLE','Editar Vaga');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header ('Location: index.php?status=error');
}
$objFuncionario =Funcionario::getFuncionario($_GET['id']);



if (!$objFuncionario instanceof Funcionario){
    header ('Location: index.php?status=error');
    exit;
}

if (isset($_POST['tipo'],$_POST['qtdDentes'],$_POST['percil'])){
    
    $objFuncionario = new Funcionario;
    $objFuncionario->nome = $_POST['nome'];
    $objFuncionario->dtNasc = $_POST['dtNasc'];
    $objFuncionario->sexo = $_POST['sexo'];
    $objFuncionario->telefone = ($_POST['telefone']);
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->perfil = $_POST['perfil'];
    $objFuncionario->login = $_POST['login'];
    $objFuncionario->senha = $_POST['senha'];
    $objFuncionario->statusFuncionario =$_POST['statusFuncionario'];
         
    $objFuncionario->cadastrar();
    
    header ('Location: index.php?status=success');

/*     if ($objFuncionario->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioFuncionario.php';
include __DIR__.'/includes/footer.php';
