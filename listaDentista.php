<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\dentista;
define('NAME', 'Dentista');
define('LINK', 'listaDentista.php');
define('IDENTIFICACAO', 6);
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

$objDentista = new dentista;

if(strlen($where)){

    $pagina_atual = 1;
  }else{
    $pagina_atual = intval($_GET['pagina']);
  }
  
  $itens_por_pagina = 6;
  
  $inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;
  
  $dentista = $registros_totais = $objDentista->getDentistas($where);
  
  $dentista = $registros_filtrados = $objDentista->getDentistas($where,null,'nomeDentista asc',$inicio.','.$itens_por_pagina);
  
  $num_registros_totais = count($registros_totais);
  
  $num_pagina = ceil($num_registros_totais/$itens_por_pagina);



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaDentista.php';
include __DIR__.'/includes/mensagensCRUD.php';

include __DIR__.'/includes/footer.php';