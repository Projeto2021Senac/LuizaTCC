<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\rastreio;

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'where nomePaciente LIKE "%'. str_replace('', '%', $busca).'%" OR prontuario='.'"'.trim($busca).'"': null
    
];


$where = implode(' AND ', $condicoes);

$rastreio = rastreio::getRastreiosInner($where);
//echo "<pre>"; print_r($rastreio); echo "<pre>";exit;



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/lRastreio.php';
include __DIR__.'/includes/footer.php';