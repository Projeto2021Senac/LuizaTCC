<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';

use Classes\Entity\Consulta;
use \Classes\Entity\Procedimento;
use \Classes\Entity\tratamento;

$ConsultaInnerJoin = consulta::getConsultaInnerJoin('paciente,dentista,clinica,funcionario', 'idConsulta = ' . $_GET['id'], 'fkProntuario,prontuario,CFKDentista,idDentista,CFKClinica,idClinica,fkFuncionario,idFuncionario');
/* echo "<pre>"; print_r($ConsultaInnerJoin); echo "<pre>";exit; */
$tratamentos = '';
$objProcedimento = Procedimento::getProcedimentos();
if ($ConsultaInnerJoin->statusConsulta == 'Finalizada') {
    $tratamentos = tratamento::getTratamentos('procedimentos','fkConsulta =' . $_GET['id'],'fkProcedimentos,idProcedimento');
    /*     echo '<pre>';
    print_r($tratamentos);
    echo '<pre>';
    exit; */
}
$resultados = '';
foreach ($tratamentos as $t) {

    $resultados .= '<tr ">
                    <>
                    </tr>';
}
define('TITLE', 'Dados da consulta de ' . $ConsultaInnerJoin->nomePaciente);
$visibilidadiv = '';
if ($ConsultaInnerJoin->statusConsulta == 'Finalizada') {
    $visibilidadiv = "style = display:none;";
}
//Validação do GET
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: pesquisarConsulta.php?status=error');
}

$objTratamento = new tratamento;
if (isset($_POST['Finalizar'])) {

    $objTratamento->observacoes = $_POST['observacoes'];
    $objTratamento->fkProcedimento = $_POST['procedimento'];
    $objTratamento->fkConsulta = $ConsultaInnerJoin->idConsulta;

    $teste = $objTratamento->cadastrarTratamento();

    /*  echo '<pre>';print_r($teste);echo'<pre>';exit; */
    /* echo '<pre>';print_r(gettype($teste[0]));echo'<pre>';exit; */

    if (gettype($teste[0]) == 'object') {
        header('location: consultaFinalizada.php?id=' . $ConsultaInnerJoin->idConsulta);
    } else {
        echo '<pre>';
        print_r('Houve um erro na inserção do tratamento. Provavelmente o procedimento já foi cadastrado nessa consulta anteriormente');
        echo '<pre>';
        exit;
    }
}

//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirConsulta.php';
include __DIR__ . '/includes/footer.php';
