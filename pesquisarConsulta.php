<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use \Classes\Entity\Consulta;
use \Classes\Entity\paciente;

define('NAME','Consulta');
define('LINK','pesquisarConsulta.php');
/* echo '<pre>';print_r($_SESSION);echo'<pre>';exit; */
/**
 * Instancia a classe Protese, para fazer uso do seu método de pesquisa "GetProteses" localizado em Protese.php
 * 
 */
//$paciente = $objPaciente->getPacientes('prontuario = ' . $consultas['idConsulta']);
//echo '<pre>';print_r($paciente);echo'<pre>';exit;
$objConsulta = new Consulta;
$objPaciente = new paciente;

$consultas = $objConsulta->getConsultasInnerJoin('paciente,clinica,dentista,funcionario',NULL,'fkProntuario,prontuario,CFKClinica,idClinica,CFKDentista,idDentista,fkFuncionario,idFuncionario',null,'statusConsulta,dataConsulta  desc ');

/*  echo "<pre>"; print_r($consultas); echo "<pre>";exit;  */






//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listaConsultas.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
