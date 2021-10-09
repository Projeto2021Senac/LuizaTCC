<?php

require 'vendor/autoload.php';

use Classes\Entity\rastreio;

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'AND nomePaciente LIKE "%'. str_replace('', '%', $busca).'%" OR prontuario='.'"'.trim($busca).'"': null
    
];


$where = implode(' AND ', $condicoes);

$rastreio = rastreio::getRastreiosInner($where);




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/lRastreio.php';
include __DIR__.'/includes/footer.php';