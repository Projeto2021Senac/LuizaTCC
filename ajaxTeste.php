<?php
ob_start();
session_start();
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;


$idTerceiro = $_REQUEST['id_terceiro'];
$_SESSION['idTerceiro'] = $idTerceiro;
sleep(1);
$query = "SELECT idServico,nomeServico from servicoterceiro inner join terceirizado where idServico = fkServicoTerceiro and fkTerceiro = " . $idTerceiro;
if ($idTerceiro != null) {
    $servico_terceiro = (new db())->executeSQL($query);

    $array = [];
    if ($servico_terceiro->rowCount() > 0) {
        while ($row_servico_terceiro = $servico_terceiro->fetch(PDO::FETCH_ASSOC)) {
            $array[] = array(
           'id' => $row_servico_terceiro['idServico'],
           'nomeServico' => $row_servico_terceiro['nomeServico']
            );
        }
        echo json_encode($array);
    }
    
}else{
    echo json_encode('Sem resultados');
}

