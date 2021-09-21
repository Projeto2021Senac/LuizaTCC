<?php

require 'vendor/autoload.php';
use Classes\Entity\funcionario;

define('BTN', 'Entrar');

if(isset($_POST['login'],$_POST['senha'])){
    $objFuncionario = new funcionario;
$login = $_POST['login'];
$senha = $_POST['senha'];
/* echo '<pre>';print_r($objFuncionario);echo'<pre>';exit; */
$validacao = $objFuncionario->validaLogin($login,$senha);
echo '<pre>';print_r($validacao);echo'<pre>';exit;
/* echo '<pre>';print_r($objFuncionario->validaLogin($login,$senha));echo'<pre>';exit; */
}


include __DIR__.'/includes/telalogin.php';



?>