<?php
session_start();
if (!isset($_SESSION['nr'], $_SESSION['confereNR'],$_SESSION['nome'],$_SESSION['idFuncionario'],$_SESSION['perfil'])) {
    $_SESSION['nr']= -1;
    $_SESSION['confereNR']= -2;
    $_SESSION['nome'] = 'usuario';
    $_SESSION['idFuncionario'] = '0';
    $_SESSION['perfil'] = 'usuario';
    if ($_SESSION['nr'] != $_SESSION['confereNR']) {

        header('location:sessionDestroy.php');
    }
}
