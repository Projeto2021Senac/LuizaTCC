<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
define('TITLE', 'Cadastrar Dentista');
define('BTN', 'cadastrarDentista');
define('IDENTIFICACAO', '0');
use Classes\Entity\dentista;

$dentista = new dentista();

if (isset($_POST[BTN])) {

    if (!empty($_POST['nomeDentista'])) {
        
        
        $dentista->nomeDentista = trim($_POST['nomeDentista']);
        $dentista->statusDentista = $_POST['status'];
        
        unset($_POST['cadastrarDentista']);
        
        $dentista->cadastrarDentista();
        
        header ('Location: listaDentista.php?pagina=1&status=success&id='.$dentista->idDentista[1]);

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroDentista.php'\">";
    }
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioDentista.php';
include __DIR__.'/includes/footer.php';
 