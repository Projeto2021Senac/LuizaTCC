<?php

require __DIR__ . '/vendor/autoload.php';


use Classes\Entity\tratamento;


//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'WHERE nome LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];

$where = implode(' AND ', $condicoes);



$innerTratamentos = tratamento::getTratamentosInner($where); //  tentando implementar consulta 


//echo "<pre>"; print_r($innerTratamentos); echo "<pre>";exit;




//$innerTratamentos = tratamento::getTratamentosInner();

//echo "<pre>"; print_r($innerTratamento); echo "<pre>";exit; 


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/lConsultaR.php';
include __DIR__ . '/includes/footer.php';
