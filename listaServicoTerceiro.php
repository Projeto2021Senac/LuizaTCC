<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\ServicoTerceiro;

if (!isset($_GET['pagina'])) {
    header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nome LIKE "%' . str_replace('', '%', $busca) . '%"' : null

];


$where = implode(' AND ', $condicoes);

$objServicoTerceiro = new ServicoTerceiro;

if (strlen($where)) {

    $pagina_atual = 1;
} else {
    $pagina_atual = intval($_GET['pagina']);
}

$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$registros_totais = $objServicoTerceiro->getServicoTerceiros();

$registros_filtrados = $objServicoTerceiro->getServicoTerceiros(null, $where, 'nomeServico asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);


$rastreio = ServicoTerceiro::getServicoTerceiros($where);


$objServicoTerceiro = $rastreio;

$resultados = '';
foreach ($objServicoTerceiro as $objServicoTerceiro) {
    $resultados .= '<tr>
                        <td>' . $objServicoTerceiro->idServico . '</td>
                        <td>' . $objServicoTerceiro->nomeServico . '</td>
                        <td>' . $objServicoTerceiro->descricao . '</td>
                        <td>' . $objServicoTerceiro->statusServicoTerceiro . '</td>

                        
                        <td>
                        <a href = editaServicoTerceiro.php?id=' . $objServicoTerceiro->idServico . '>
                        <button type="button" class="btn btn-info">Editar</button>
                        </a>
                        </td>
                        </tr>';
}
$resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhum Serviço foi registrado por enquanto...</td>'
    . '</tr>';




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaServicoTerceiro.php';
include __DIR__ . '/includes/footer.php';
