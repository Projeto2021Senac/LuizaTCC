<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\dentista;
define('NAME', 'Dentista');
define('LINK', 'listaDentista.php');
if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}
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