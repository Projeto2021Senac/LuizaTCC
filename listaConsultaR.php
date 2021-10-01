<?php

require __DIR__ . '/vendor/autoload.php';

use \Classes\Entity\Consulta;
use \Classes\Entity\paciente;
use Classes\Entity\rastreio;


//$paciente = $objPaciente->getPacientes('prontuario = ' . $consultas['idConsulta']);
//echo '<pre>';print_r($paciente);echo'<pre>';exit;
$consulta = new Consulta;
$paciente = new paciente;

$consulta->setPaciente($paciente);
//echo "<pre>"; print_r($objConsulta); echo "<pre>";exit;

//Roda o método getProteses que está localizado em Protese.php para trazer todos os registros do banco no formato de um array de objetos.
/* $consultas = $objConsulta->getConsultas(); */
/* echo "<pre>"; print_r($consultas); echo "<pre>";exit; */

/**
 * Método com filtro de status
 */
//$consultas = $objConsulta->getConsultaPaciente('statusConsulta <> "Finalizada"');

/**
 * Método sem filtro 
 */
$consultas = $consulta->getConsultaPaciente();

$rastreio= rastreio::getConPaPro();

echo "<pre>"; print_r($consulta); echo "<pre>";exit; 






//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/lConsultaR.php';
include __DIR__ . '/includes/footer.php';
