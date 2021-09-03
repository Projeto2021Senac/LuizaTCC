<?php

require 'vendor/autoload.php';

use Classes\Entity\clinica;

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nomeClinica LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



$clinica = clinica::getClinicas($where);




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaClinica.php';
include __DIR__.'/includes/footer.php';