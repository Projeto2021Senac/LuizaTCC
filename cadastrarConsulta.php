<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__.'/vendor/autoload.php';


use \Classes\Entity\Protese;

define('TITLE','Cadastrar Nova Consulta');
/**
 * Validação do POST, ainda incompleta pois não possui todos os campos necessários
 */
$objProtese = new Protese;
if (isset($_POST['tipo'],$_POST['qtdDentes'],$_POST['paciente'])){
     /**
      * Aqui a classe Protese é instanciada e tem todos as sua variáveis preenchidas pelos valores recebidos do POST, exceto a dataRegistro
      * e a variável ID que são preenchidas automaticamente posteriormente.
      * Pode-se notar alguns tratamentos com operadores ternários para dureza, ouro, e quantidade
      */
   

    /* echo '<pre>';print_r($objProtese);echo'<pre>';exit; */
    //Executa a função cadastrar que está localizada na classe "Protese".
    $objProtese->cadastrar();
    //Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objProtese->id será preenchido
    //Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
    if ($objProtese->idProtese > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    }
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioProtese.php';
include __DIR__.'/includes/footer.php';
