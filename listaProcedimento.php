<?php

require 'vendor/autoload.php';

use Classes\Entity\Procedimento;
define('NAME', 'Procedimento');
define('LINK', 'listaProcedimento.php');
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

$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 8;

$registros_totais =$objProcedimento = Procedimento::getProcedimentos();

$registros_filtrados =$objProcedimento = Procedimento::getProcedimentos(null,null,null,$pagina_atual.','.$itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais/$itens_por_pagina);
/* echo "<pre>"; print_r($num_pagina); echo "<pre>";exit; */
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaProcedimento.php';
include __DIR__.'/includes/mensagensCRUD.php';
include __DIR__.'/includes/footer.php';
