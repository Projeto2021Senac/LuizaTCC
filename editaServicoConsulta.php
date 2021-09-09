<?php

require 'vendor/autoload.php';

define('TITLE', 'Editar Paciente');
define('BTN', 'editarPaciente');

use \Classes\Entity\ServicoConsulta;

//consulta vaga
$paciente = ServicoConsulta::getServicoConsulta($_GET['idServicoconsulta']);

//validação da vaga
if(!$ServicoConsulta instanceof ServicoConsulta){
    header('location: index.php?status=error');
}

if (isset($_POST['editarServiço'])) {

    if (!empty($_POST['nome'])) {

        $ServicoConsulta->prontuario = $_POST['idServicoconsulta'];
                unset($_POST['editarServicoConsulta']);

        $ServicoConsulta->editarServicoConsulta();

        header('Location: lista.php?status=success');
    }
}

//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroServicoConsulta.php'\">";

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioServicoConsulta.php';
include __DIR__ . '/includes/footer.php';
