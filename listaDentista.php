<?php

require 'vendor/autoload.php';

use Classes\Entity\dentista;
define('NAME', 'Dentista');
define('LINK', 'listaDentista.php');

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nomeDentista LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



$dentista = dentista::getDentistas($where);




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaDentista.php';
include __DIR__.'/includes/mensagensCRUD.php';

include __DIR__.'/includes/footer.php';