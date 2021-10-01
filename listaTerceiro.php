<?php

require 'vendor/autoload.php';

use Classes\Entity\Terceiro;

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



$objTerceiro= Terceiro::getTerceiros();




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaTerceiro.php';
include __DIR__.'/includes/footer.php';