<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use \Classes\Entity\Consulta;
use \Classes\Entity\paciente;

define('NAME','Consulta');
define('LINK','pesquisarConsulta.php?pagina=1');
define('CAMPO','nomePaciente,idConsulta,dataConsulta,prontuario');
define('TABELA','consulta');
$objConsulta = new Consulta;
$objPaciente = new paciente;

if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}
/**
 * Tudo que diz respeito á pesquisa específica e paginação Começa aqui
 * 
 */
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);
//condições sql
$condicoes = [
    strlen($busca) ? 'nomePaciente LIKE "%'. str_replace('', '%', $busca).'%" or prontuario LIKE "%'. str_replace('', '%', $busca).'%" or dataConsulta LIKE "%'. str_replace('', '%', $busca).'%" ': null
    
];
/* echo "<pre>"; print_r($condicoes); echo "<pre>";exit; */
$where = implode(' AND ', $condicoes);

$itens_por_pagina = 2;

$pagina_atual = intval($_GET['pagina']);

$consultas = $objConsulta->getConsultasInnerJoin('paciente,clinica,dentista,funcionario',$where,'fkProntuario,prontuario,CFKClinica,idClinica,CFKDentista,idDentista,fkFuncionario,idFuncionario',null,'statusConsulta,dataConsulta  desc ');

$registros_totais = count($consultas);

$num_pagina = ceil($registros_totais/$itens_por_pagina);
/* echo "<pre>"; print_r($num_pagina); echo "<pre>";exit; */
/**
 * pesquisa específica e paginação termina aqui
 * 
 */





if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  if (isset($_GET['rastreio']) == "check") {
    $disabledRastreio = 'class = "btn btn-secondary"';
    $disabled2 = 'ok';
    $disabled1 = 'hidden=""';
  } else {
    $disabledRastreio = 'hidden=""';
    $disabled2 = '';
    $disabled1 = '';
  }
  $resultados = '';
  foreach ($consultas as $consulta) {
    $disabled = ($consulta->statusConsulta == 'Finalizada' ? 'class = "btn btn-secondary" disabled = disabled' : 'class = "btn btn-danger"');
    $disabled = ($disabled2 == 'ok' ? 'hidden=""' : $disabled);

    $resultados .= '<tr class = "text-center" >
                          <td>' . $consulta->idConsulta . '</td>
                          <td>' . date('d/m/Y', strtotime($consulta->dataConsulta)) . '</td>
                          <td>' . date(' H:i', strtotime($consulta->horaConsulta)) . '</td>
                          <td>' . $consulta->statusConsulta . '</td>
                          <td>' . $consulta->nomePaciente . '</td>
                          <td>
                          <a ' . $disabled1 . 'class = "btn btn-primary" href = Consulta.php?id=' . $consulta->idConsulta . '>Abrir Consulta</a>
                          <a ' . $disabled . 'href = editaConsulta.php?id=' . $consulta->idConsulta . '>Corrigir</a>
                          <a ' . $disabledRastreio . 'href = cadRastreio.php?rConsulta=' . $consulta->idConsulta . '>Confirmar rastreio</a>
                          </td>
                          </tr>';
  }
  $resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhuma Consulta foi encontrada no histórico</td>'
    . '</tr>';

  







//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listaConsultas.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
