<?php

require 'vendor/autoload.php';

define('TITLE', 'Editar Paciente');
define('BTN', 'editarPaciente');

use \Classes\Entity\Procedimento;

//consulta vaga
$Procedimento = Procedimento::getProcedimento($_GET['idServicoconsulta']);

//validação da vaga
if(!$ServicoConsulta instanceof Procedimento){
    header('location: index.php?status=error');
}

if (isset($_POST['editarProcedimento'])) {

    if (!empty($_POST['nome'])) {

        $Procedimento->prontuario = $_POST['idProcedimento'];
                unset($_POST['editarProcedimento']);

        $Procedimento->editarProcedimento();

        header('Location: lista.php?status=success');
    }
}

//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroProcedimento.php'\">";

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioProcedimento.php';
include __DIR__ . '/includes/footer.php';
