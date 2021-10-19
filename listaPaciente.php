<?php

require 'vendor/autoload.php';

use Classes\Entity\paciente;
define('NAME','Paciente');
define('LINK','listaPaciente.php');
define('CAMPO','nomePaciente');
define('TABELA','paciente');
if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nomePaciente LIKE "%'. str_replace('', '%', $busca).'%" or prontuario LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];

$where = implode(' AND ', $condicoes);
/* $where = "Guilherme Torquato"; */
if(strlen($where)){
    $pagina_atual = 1;
  }else{
    $pagina_atual = intval($_GET['pagina']);
  }

$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$pacientes = $registros_totais = paciente::getPacientes($where);

$pacientes =  $registros_filtrados = paciente::getPacientes($where,null,null,$inicio.','.$itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais/$itens_por_pagina);


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaPaciente.php';
include __DIR__.'/includes/mensagensCRUD.php';
include __DIR__.'/includes/footer.php';