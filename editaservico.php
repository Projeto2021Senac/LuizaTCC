<?php

require 'vendor/autoload.php';

define('TITLE', 'Editar Paciente');
define('BTN', 'editarPaciente');

use \Classes\Entity\paciente;


//consulta vaga
$paciente = paciente::getPaciente($_GET['prontuario']);

//validação da vaga
if(!$paciente instanceof paciente){
    header('location: index.php?status=error');
}

if (isset($_POST['editarServiço'])) {

    if (!empty($_POST['nome'])) {

        $paciente->prontuario = $_POST['prontuario'];
        $paciente->nome = trim($_POST['nome']);
        $paciente->sexo = $_POST['sexo'];
        $paciente->tel = $_POST['tel'];
        $paciente->email = $_POST['email'];
        unset($_POST['editarPaciente']);

        $paciente->editarPaciente();

        header('Location: lista.php?status=success');
    }
}



//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroPaciente.php'\">";




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioPaciente.php';
include __DIR__ . '/includes/footer.php';
