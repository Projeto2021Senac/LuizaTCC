<?php

require 'vendor/autoload.php';

use Classes\Entity\Procedimento;
define('NAME', 'Procedimento');
define('LINK', 'listaProcedimento.php');
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];

$where = implode(' AND ', $condicoes);

$objProcedimento = Procedimento::getProcedimentos();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaProcedimento.php';
include __DIR__.'/includes/mensagensCRUD.php';
include __DIR__.'/includes/footer.php';
