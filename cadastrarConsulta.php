<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';


use \Classes\Entity\consulta;
use \Classes\Entity\clinica;
use \Classes\Entity\dentista;
use \Classes\Entity\paciente;
use \Classes\Entity\funcionario;

define('TITLE', 'Cadastrar Nova Consulta');
$objClinica = clinica::getClinicas();
$objDentista = dentista::getDentistas();
$objPaciente = paciente::getPacientes();
$objFuncionario = funcionario::getFuncionarios();
//echo "<pre>"; print_r($objFuncionario); echo "<pre>";exit;

//if (isset($_POST['cadastrar'])){
if (isset($_POST['paciente'], $_POST['data'], $_POST['hora'], $_POST['dentista'], $_POST['clinica'])) {
    $objConsulta = new consulta;
    $objConsulta->dataConsulta = $_POST['data'];
    $objConsulta->horaConsulta = $_POST['hora'];
    $objConsulta->statusConsulta = ($_POST['status'] != '' ? $_POST['status'] : 'Agendada');
    $objConsulta->relatorio = ($_POST['relatorio'] != null ? $_POST['relatorio'] : 'Sem observações');
    $objConsulta->fkProntuario = $_POST['paciente'];
    $objConsulta->fkFuncionario = (isset($_SESSION['perfil']) ? $_SESSION['perfil'] : '1');
    $objConsulta->CFKClinica = 189;
    $objConsulta->CFKDentista = $_POST['dentista']; 
/*     echo "<pre>"; print_r($objConsulta); echo "<pre>";exit; */

    //echo '<pre>';print_r($objConsulta);echo'<pre>';exit;
    $objConsulta->cadastrarConsulta();

    if ($objConsulta->idConsulta > 0) {
        header('Location: index.php?status=success');
    } else {
        header('Location: index.php?status=error');
    }
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioConsulta.php';
include __DIR__ . '/includes/footer.php';
