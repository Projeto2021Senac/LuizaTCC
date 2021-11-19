<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\paciente;

define('NAME', 'Paciente');
define('LINK', 'listaPaciente.php');
define('IDENTIFICACAO', 1);
if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaPaciente.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'nomePaciente LIKE "%' . str_replace('', '%', $search) . '%" or prontuario LIKE "%' . str_replace('', '%', $search) . '%"' : null

];

$where = implode(' AND ', $condicoes);
/* $where = "Guilherme Torquato"; */

$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 5;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$pacientes = $registros_totais = paciente::getPacientes($where);

$pacientes =  $registros_filtrados = paciente::getPacientes($where, null, null, $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaPaciente.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
