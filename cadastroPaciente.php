<?php

require 'vendor/autoload.php';

define('TITLE', 'Cadastrar Paciente');
define('BTN', 'cadastrarPaciente');

use Classes\Entity\paciente;

$paciente = new paciente();

if (isset($_POST['cadastrarPaciente'])) {

    if (!empty($_POST['nome'])) {
        
        
        $paciente->nome = trim($_POST['nome']);
        $paciente->sexo = $_POST['sexo'];
        $paciente->tel = $_POST['tel'];
        $paciente->email = $_POST['email'];
        unset($_POST['cadastrarPaciente']);
        
        $paciente->cadastrarPaciente();
        
        header ('Location: cadastroPaciente.php?status=success');

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroPaciente.php'\">";
    }
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioPaciente.php';
include __DIR__.'/includes/footer.php';
 