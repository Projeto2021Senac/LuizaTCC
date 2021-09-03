<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__.'/vendor/autoload.php';


use \Classes\Entity\funcionario;

define('TITLE','Cadastrar Funcionário');
/**
 * Validação do POST, ainda incompleta pois não possui todos os campos necessários
 */
$objFuncionario = new Funcionario;
if (isset($_POST['nome'],$_POST['cpf'],$_POST['email'])){
     /**
      * Aqui a classe Protese é instanciada e tem todos as sua variáveis preenchidas pelos valores recebidos do POST, exceto a dataRegistro
      * e a variável ID que são preenchidas automaticamente posteriormente.
      * Pode-se notar alguns tratamentos com operadores ternários para dureza, ouro, e quantidade
      */
   
    $objFuncionario->nome = $_POST['nome'];
    $objFuncionario->sexo = $_POST['sexo'];
    $objFuncionario->telefone = $_POST['telefone'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->perfil = $_POST['perfil'];
    $objFuncionario->login = $_POST['login'];
    $objFuncionario->senha = $_POST['senha'];
    $objFuncionario->statusFuncionario = $_POST['statusfuncionario'];
    //Executa a função cadastrar que está localizada na classe "Funcionario".
    $objFuncionario->cadastrar();
    //Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objFuncionario->idFuncionario será preenchido
    //Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
    if ($objFuncionario->idFuncionario > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    }
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/listagem.php';
