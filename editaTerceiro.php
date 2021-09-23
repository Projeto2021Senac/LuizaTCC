<?php

require __DIR__ . '/vendor/autoload.php';

use \Classes\Entity\Terceiro;

define('TITLE', 'Editar Terceiro');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}

$objTerceiro = Terceiro::getTerceiro($_GET['id']);



if (!$objTerceiro instanceof Terceiro) {
    header('Location: index.php?status=error');
    exit;
}

if (isset($_POST['nomeTerceiro'], $_POST['statusTerceiro'])) {

    $objTerceiro = new Terceiro;
    $objTerceiro->idTerceiro = $_GET['id'];
    $objTerceiro->nome = $_POST['nome'];
    $objTerceiro->telefone = ($_POST['telefone']);
    $objTerceiro->statusTerceiro = $_POST['status'];
    //echo '<pre>';print_r($objTerceiro);echo '<pre>';exit;

    $objTerceiro->AtualizarTerceiro();

    header('Location: index.php?status=success');

    /*     if ($objTerceiro->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioTerceiro.php';
include __DIR__ . '/includes/footer.php';
