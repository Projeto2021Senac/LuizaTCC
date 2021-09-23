<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__.'/vendor/autoload.php';

use Classes\Entity\Consulta;
use \Classes\Entity\clinica;
use \Classes\Entity\dentista;
use \Classes\Entity\paciente;
use \Classes\Entity\funcionario;
use \Classes\Entity\Procedimento;
use \Classes\Entity\tratamento;


$objConsulta = consulta::getConsulta($_GET['id']);

$objClinica2 = clinica::getClinica($objConsulta->CFKClinica);

$objDentista2 = dentista::getDentista($objConsulta->CFKDentista);

$objPaciente2 = paciente::getPaciente($objConsulta->fkProntuario);

$objFuncionario2 = funcionario::getFuncionario($objConsulta->fkFuncionario);

$objProcedimento = Procedimento::getProcedimentos();

define('TITLE','Dados da consulta de '.$objPaciente2->nome);

//Validação do GET
if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header ('Location: pesquisarConsulta.php?status=error');
}


//Validação da Consulta
if (!$objConsulta instanceof consulta){
    header ('Location: index.php?status=error');
    exit;
}
 if (!$objClinica2 instanceof clinica){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objDentista2 instanceof dentista){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objPaciente2 instanceof paciente){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objFuncionario2 instanceof funcionario){
    header ('Location: index.php?status=error');
    exit;
}
$objTratamento = new tratamento;
if (isset($_POST['Finalizar'])){
    
    $objTratamento->observacoes = $_POST['observacoes'];
    $objTratamento->fkProcedimento = $_POST['procedimento'];
    $objTratamento->fkConsulta = $objConsulta->idConsulta;
   
    $objTratamento->cadastrarTratamento();

    
}

//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/abrirConsulta.php';
include __DIR__.'/includes/footer.php';
