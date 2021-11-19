<?php

ob_start();
session_start();
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;


$prontuario = $_REQUEST['prontuario'];
$_SESSION['prontuario'] = $prontuario;
sleep(1);
$query = "SELECT * from tratamento inner join consulta "
        . "on fkConsulta=idConsulta " 
        . "inner join procedimento on fkProcedimento=idProcedimento "
        . "and fkProntuario=". $prontuario;
if ($prontuario != null) {
    $prontuario1 = (new db())->executeSQL($query);

    $array = [];
    if ($prontuario1->rowCount() > 0) {
        while ($row_prontuario1 = $prontuario1->fetch(PDO::FETCH_ASSOC)) {
            $array[] = array(
           
           'nomeT' => $row_prontuario1['nomeProcedimento'],
           'obsT' => $row_prontuario1['observacao'],
           'idC' => $row_prontuario1['idConsulta'],
           'dataC' => $row_prontuario1['dataConsulta'],
           'horaC' => $row_prontuario1['horaConsulta'],
          
                
          // 'nomePaciente' => $row_prontuario1['nomePaciente'],
           //'sexo' => $row_prontuario1['sexo'],
           //'telefone' => $row_prontuario1['telefone'],
           //'email' => $row_prontuario1['email']
           
            );
        }
        echo json_encode($array);
    }
    
}else{
    echo json_encode('Sem resultados');
}
