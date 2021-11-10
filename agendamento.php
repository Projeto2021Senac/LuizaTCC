<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Cadastrar Nova Consulta');
define('NAME', 'Consulta');

use \Classes\Entity\consulta;
use \Classes\Entity\clinica;
use \Classes\Entity\dentista;
use \Classes\Entity\paciente;
use \Classes\Entity\funcionario;

$alerta = '';
$objConsulta = new consulta;
unset($_POST);

$objClinica = clinica::getClinicas();
/* echo '<pre>';print_r($objClinica);echo'<pre>';exit; */
$objDentista = dentista::getDentistas();
/* echo '<pre>';print_r($objDentista);echo'<pre>';exit; */
$objPaciente = paciente::getPacientes();
/* echo '<pre>';print_r($objPaciente);echo'<pre>';exit; */
$objFuncionario = funcionario::getFuncionarios();
/* echo "<pre>"; print_r($objFuncionario); echo "<pre>";exit; */
if (isset($_POST[TITLE])) {
  echo "<pre>"; print_r($_POST); echo "<pre>";exit;
  if (isset($_POST['paciente'], $_POST['data'], $_POST['hora'], $_POST['dentista'], $_POST['clinica'])) {

    $objConsulta->dataConsulta = $_POST['data'];
    $objConsulta->horaConsulta = $_POST['hora'];
    $objConsulta->statusConsulta = ($_POST['status'] != '' ? $_POST['status'] : 'Agendada');
    $objConsulta->relatorio = ($_POST['relatorio'] != null ? $_POST['relatorio'] : 'Sem observações');
    $objConsulta->fkProntuario = $_POST['paciente'];
    $objConsulta->fkFuncionario = $_SESSION['idFuncionario'];
    $objConsulta->CFKClinica = $_POST['clinica'];
    $objConsulta->CFKDentista = $_POST['dentista'];
    /*     echo "<pre>"; print_r($objConsulta); echo "<pre>";exit; */

    //echo '<pre>';print_r($objConsulta);echo'<pre>';exit;
    $objConsulta->cadastrarConsulta();

    if ($objConsulta->idConsulta > 0) {
      $alerta = "<script>
        Swal.fire({
          title: '" . NAME . " n° " . $objConsulta->idConsulta . " cadastrada com sucesso!!',
          text: \"Caso haja alguma alteração a ser feita, utilize a lista de consultas fora da agenda\",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            redirecionamento()
        }
        })
        function redirecionamento(){
          window.location.href = \"agendamento.php\"
        }
        </script>";
    }
  }
}

include __DIR__ . '/includes/agendaConsulta.php';
