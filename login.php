<?php

require 'vendor/autoload.php';
use Classes\Entity\funcionario;
session_start();
$_SESSION['nr'] = rand(1,1000000);

$objFuncionario = new funcionario;
if (isset($_POST) && isset($_POST['Entrar'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $validacao = $objFuncionario->getLogin($login,$senha);
    /* echo "<pre>"; print_r($validacao); echo "<pre>";exit; */
    unset($_POST['Entrar']);
    if(gettype($validacao) == 'object'){
        $_SESSION['nome'] = $validacao->nome;
        $_SESSION['idFuncionario'] = $validacao->idFuncionario;
        $_SESSION['confereNR'] = $_SESSION['nr'];
        header('location:index.php');
    }else{
        echo"
    <script>
    Swal.fire(
      'The Internet?',
      'That thing is still around?',
      'question'
    )
  </script>";
    }
}

include __DIR__.'/includes/telalogin.php';
