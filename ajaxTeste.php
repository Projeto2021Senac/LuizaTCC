<?php
$get = $_GET['Terceiro'];
switch ($get) {
    case 1:
        $array = ['Guilherme','Pedro','Hariston'];break;
    case 2:
        $array = ['Fabio','Rainha elizabeth','Orangotango de óculos'];
    case 3:
        $array = ['Irineu','EdnaldoPereira','Einstein'];
}


echo json_encode($array);
?>