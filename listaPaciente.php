<?php

require 'vendor/autoload.php';

use Classes\Entity\paciente;
define('NAME','Paciente');
define('LINK','listaPaciente.php');
if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

$busca = "higor";
//condições sql
$condicoes = [
    strlen($busca) ? 'nomePaciente LIKE "%'. str_replace('', '%', $busca).'%" or prontuario LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];



$where = implode(' AND ', $condicoes);
$resultado_autoCompletar =  paciente::getPacientes2($where,null,'prontuario,nomePaciente ASC','5','nomePaciente,prontuario');
echo json_encode($resultado_autoCompletar);
echo "<pre>"; print_r($resultado_autoCompletar); echo "<pre>";exit;
$pacientes = paciente::getPacientes($where);




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaPaciente.php';
include __DIR__.'/includes/mensagensCRUD.php';
include __DIR__.'/includes/footer.php';