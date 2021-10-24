<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';

use Classes\Entity\Consulta;
use \Classes\Entity\Procedimento;
use \Classes\Entity\tratamento;

$erro = 0;
$ConsultaInnerJoin = consulta::getConsultaInnerJoin('paciente,dentista,clinica,funcionario', 'idConsulta = ' . $_GET['id'], 'fkProntuario,prontuario,CFKDentista,idDentista,CFKClinica,idClinica,fkFuncionario,idFuncionario');
if (!$ConsultaInnerJoin instanceof consulta) {
    header('location: pesquisarConsulta.php?status=error');
}
/* echo "<pre>"; print_r($ConsultaInnerJoin); echo "<pre>";exit; */
$objProcedimento = Procedimento::getProcedimentos('idProcedimento not in (select fkProcedimento from tratamento where fkConsulta ='.$_GET['id'].')');
/* echo "<pre>"; print_r($objProcedimento); echo "<pre>";exit; */
if ($ConsultaInnerJoin->statusConsulta == 'Finalizada') {
    $tratamentos = tratamento::getTratamentos('procedimento', 'fkConsulta =' . $_GET['id'], 'fkProcedimento,idProcedimento');
       /*  echo "<pre>"; print_r($tratamentos); echo "<pre>";exit; */
    $resultados = '';
    foreach ($tratamentos as $tratamento) {
        
        if ($tratamento->nomeProcedimento == 'Protese'){
            $resultados .= '<tr>
                        <td><a href="pesquisarProtese.php?pagina=1&idConsulta='.$_GET["id"].'&idProcedimento='.$tratamento->idProcedimento.'&prontuario='.$ConsultaInnerJoin->prontuario.'" style = "text-decoration:none;color:red">' .$tratamento->nomeProcedimento . '</a></td>
                        </tr>';
        }else{
            $resultados .= '<tr>
                        <td>' .$tratamento->nomeProcedimento . '</td>
                        </tr>';
        }
        
    }
}
/* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
define('TITLE', 'Dados da consulta de ' . $ConsultaInnerJoin->nomePaciente);
define('NAME', 'Consulta ');
define('LINK', '');
$visibilidadiv = '';
if ($ConsultaInnerJoin->statusConsulta == 'Finalizada') {
    $visibilidadiv = "style = display:none;";
}
//Validação do GET
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: pesquisarConsulta.php?status=error');
}
/* echo "<pre>"; print_r($erro); echo "<pre>";exit; */
$objTratamento = new Tratamento;
if (isset($_POST['Finalizar'])) {
    echo '<pre>';print_r($_POST);echo'<pre>';exit;
    if (isset($_POST['observacoes'], $_POST['procedimento']) && $_POST['procedimento'] != '-[SELECIONE O PROCEDIMENTO A SER REALIZADO]-') {
        $erro = 0;
        $objTratamento->observacao = ($_POST['observacoes'] == '' ? 'Sem observações' : $_POST['observacoes']);
        $objTratamento->fkProcedimento = $_POST['procedimento'];
        $objTratamento->fkConsulta = $ConsultaInnerJoin->idConsulta;

        /* echo "<pre>"; print_r($objTratamento); echo "<pre>";exit; */
        $teste = $objTratamento->cadastrarTratamento();
        /* echo '<pre>';print_r($teste);echo'<pre>';exit; */
        /*  echo '<pre>';print_r($teste);echo'<pre>';exit; */
        /* echo '<pre>';print_r(gettype($teste[0]));echo'<pre>';exit; */

        if (gettype($teste[0]) == 'object') {
            $objTratamento->atualizarStatusConsulta($_GET['id'], 'Finalizada');
            header('location: Consulta.php?id=' . $ConsultaInnerJoin->idConsulta);
        } else {
            echo '<pre>';
            print_r('Houve um erro na inserção do tratamento. Provavelmente o procedimento já foi cadastrado nessa consulta anteriormente');
            echo '<pre>';
            exit;
        }
    } else {
        $erro = 1;
    }
}

//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirConsulta.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
