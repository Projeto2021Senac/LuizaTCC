<?php

require 'vendor/autoload.php';

use Classes\Entity\paciente;
$numero = 1000;
$soma = 30;
$subtracao = 23;
$contagem = 0;
$i = 0;
for ($i;$numero<=1500;$i++){
    echo 'variável for : '.$i.' ';
    if($i % 2 == 0){
        echo ' soma = '.$soma.' ';
        $numero = $numero + $soma;
        $soma = $soma + 1;
        $contagem = $contagem + 1;
    }else{
        echo ' subtracao = '.$subtracao.' ';
        $numero = $numero - $subtracao;
        $subtracao = $subtracao + 1;
        $contagem = $contagem + 1;
    }
    echo 'Numero : '.$numero."<br>";
}
echo 'Contagem :'.$contagem."<br>";




include __DIR__.'./includes/teste.php';
