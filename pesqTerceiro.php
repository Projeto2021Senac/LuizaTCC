<?php

require 'vendor/autoload.php';

var_dump($_POST);
if ($_POST['retorno']=='2') {
    
    $retorno=(int)$_POST['retorno'];
}
    $servico = servicoTerceiro::getServicoInner($retorno);
    echo $servico;


     


