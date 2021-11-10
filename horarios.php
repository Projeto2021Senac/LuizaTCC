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

foreach ($horarios as $h) {
    $horariosPossiveis[] = $h;
}


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
/* echo "<pre>"; print_r($array); echo "<pre>";exit; */
$horariosDisponíveis = array();
$contador = 0;
foreach ($horariosPossiveis as $hu) {
    foreach ($array as $hp) {
        echo  $hp."";
        echo  gettype($hp)."<br>";
        echo $hu."";
        echo gettype($hu)."<br>";
        $hp === $hu ? print_r('1 <br>') : print_r('2 <br>');
    }



    $contador++;
}
