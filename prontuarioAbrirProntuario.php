<?php
//var_dump($_REQUEST['prontuario']);
ob_start();
session_start();
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;


$prontuario = $_REQUEST['prontuario'];
$_SESSION['prontuario'] = $prontuario;
sleep(1);
$query = "SELECT * from paciente where prontuario=" . $prontuario;
if ($prontuario != null) {
    $prontuario1 = (new db())->executeSQL($query);

    $array = [];
    if ($prontuario1->rowCount() > 0) {
        while ($row_prontuario1 = $prontuario1->fetch(PDO::FETCH_ASSOC)) {
            $array[] = array(
           'prontuario' => $row_prontuario1['prontuario'],
           'nomePaciente' => $row_prontuario1['nomePaciente'],
           'sexo' => $row_prontuario1['sexo'],
           'telefone' => $row_prontuario1['telefone'],
           'email' => $row_prontuario1['email']
           
            );
        }
        echo json_encode($array);
    }
    
}else{
    echo json_encode('Sem resultados');
}
