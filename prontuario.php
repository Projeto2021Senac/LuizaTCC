<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';



if (isset($_GET['paciente'])) {
    var_dump($_GET['paciente']);
    $paciente=($_GET['paciente']);
    
    
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProntuario.php';
include __DIR__ . '/includes/footer.php';
?>
