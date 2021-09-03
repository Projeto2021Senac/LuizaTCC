<?php

require 'vendor/autoload.php';

define('TITLE', 'Cadastrar Dentista');
define('BTN', 'cadastrarDentista');

use Classes\Entity\dentista;

$dentista = new dentista();

if (isset($_POST['cadastrarDentista'])) {

    if (!empty($_POST['nomeDentista'])) {
        
        
        $dentista->nomeDentista = trim($_POST['nomeDentista']);
        $dentista->statusDentista = $_POST['status'];
        
        unset($_POST['cadastrarDentista']);
        
        $dentista->cadastrarDentista();
        
        header ('Location: cadastroDentista.php?status=success');

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroDentista.php'\">";
    }
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioDentista.php';
include __DIR__.'/includes/footer.php';
 