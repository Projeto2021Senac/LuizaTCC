<?php

require __DIR__.'/vendor/autoload.php';
use \Classes\Entity\Protese;

define('TITLE','Editar Vaga');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header ('Location: index.php?status=error');
}
$objProtese = Protese::getProtese($_GET['id']);



if (!$objFuncionario instanceof Protese){
    header ('Location: index.php?status=error');
    exit;
}

if (isset($_POST['tipo'],$_POST['qtdDentes'],$_POST['percil'])){
    
    $objFuncionario = new funcionario;
    $objFuncionario->tipo = $_POST['tipo'];
    $objFuncionario->posicao = $_POST['posicao'];
    $objFuncionario->material = $_POST['material'];
    $objFuncionario->dureza = (isset($_POST['nivelDureza']) ? $_POST['nivelDureza'] : "Metal");
    $objFuncionario->extensao = $_POST['extensao'];
    $objFuncionario->qtdDente = $_POST['qtdDentes'];
    $objFuncionario->dente = $_POST['tipoDente'];
    $objFuncionario->ouro = ($_POST['tipo'] == "on" ? "s" : "n");
    $objFuncionario->qtdOuro = (isset($_POST['qtdOuro']) ? $_POST['qtdOuro'] : 0);
    $objFuncionario->paciente = $_POST['paciente'];
    $objFuncionario->status = 'Cadastrada';
    $objFuncionario->observacao = $_POST['observacao'];
    //Executa a função cadastrar que está localizada na classe "Protese".
    $objFuncionario->cadastrar();
    
    header ('Location: index.php?status=success');
    //Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objProtese->id será preenchido
    //Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
/*     if ($objProtese->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
