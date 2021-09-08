<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\Consulta;
use \Classes\Entity\paciente;
/**
 * Instancia a classe Protese, para fazer uso do seu método de pesquisa "GetProteses" localizado em Protese.php
 * 
 */
    $objConsulta = new Consulta;
    //Roda o método getProteses que está localizado em Protese.php para trazer todos os registros do banco no formato de um array de objetos.
    $consultas = $objConsulta->getConsultas();
    //echo "<pre>"; print_r($objConsulta->getConsultas()); echo "<pre>";exit;
    $objPaciente = new paciente;
    $Paciente = $objPaciente->getPacientes();
    echo "<pre>"; print_r($Paciente); echo "<pre>";exit;
//echo "<pre>"; print_r($proteses); echo "<pre>";exit;

    
    
    
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagemConsultas.php';
include __DIR__.'/includes/footer.php';
