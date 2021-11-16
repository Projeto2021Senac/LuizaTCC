<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';

use Classes\Entity\Terceirizado;
if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



$objTerceirizado= Terceirizado::getTerceirizadoInnerJoin('terceiro,servicoterceiro',null,'fkterceiro,idTerceiro,fkServicoTerceiro,idServico');
/* echo '<pre>';print_r($objTerceirizado);echo '<pre>';exit; */

$resultados = '';
foreach ($objTerceirizado as $Terceirizado) {
    /* echo '<pre>';print_r($Terceirizado);echo '<pre>';exit; */
    $resultados .= '<tr>
    <td>' . $Terceirizado->nomeTerceiro . '</td>
    <td>' . $Terceirizado->nomeServico . '</td>
    <td>
    <a href = editaFuncionario.php?id=' . $Terceirizado->fkTerceiro . '>
    <button type="button" class="btn btn-info">Editar</button>
    </a>
    </td>
    </tr>';
}
       

$resultados = strlen($resultados) ? $resultados :
 '<tr>'
. '<td colspan = "12" class = "text-center"> Nenhum Terceirizado foi encontrada no histórico</td>'
. '</tr>';




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaTerceirizado.php';
include __DIR__.'/includes/footer.php';