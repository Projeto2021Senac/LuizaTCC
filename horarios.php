<?php

use Classes\Dao\db;

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
$horarios = [
    '08:30',
    '09:00',
    '09:30',
    '10:00',
    '10:30',
    '11:00',
    '11:30',
    '12:00',
    '12:30',
    '13:00',
    '14:11',
];

if (isset($_GET['data'])) {
    $data = $_GET['data'];
}
$array = [];
$query = 'select horaConsulta from consulta where dataConsulta = "' . $data . '"';
/* echo "<pre>"; print_r($query); echo "<pre>";exit; */
$horariosUtilizados = (new db())->executeSQL($query);
if ($horariosUtilizados->rowCount() > 0) {

    while ($row_horarios = $horariosUtilizados->fetch(PDO::FETCH_ASSOC)) {

        $array[] = date(' H:i', strtotime($row_horarios['horaConsulta']));
    }
}

$horariosDisponiveis = array_diff_assoc($horarios,$array);
echo "<pre>"; print_r($horariosDisponiveis); echo "<pre>";exit;
