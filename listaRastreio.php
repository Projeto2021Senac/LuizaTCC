<?php

require 'vendor/autoload.php';

use Classes\Entity\rastreio;

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'idRastreio LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



$rastreio = rastreio::getRastreios($where);




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listaRastreio.php';
include __DIR__.'/includes/footer.php';