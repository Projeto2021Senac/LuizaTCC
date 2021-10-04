<?php

require 'vendor/autoload.php';

use Classes\Entity\Funcionario;
define('NAME','Funcionário');
define('LINK','listaFuncionario.php');

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



$objFuncionario= Funcionario::getFuncionarios();




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaFuncionario.php';
include __DIR__.'/includes/mensagensCRUD.php';
include __DIR__.'/includes/footer.php';