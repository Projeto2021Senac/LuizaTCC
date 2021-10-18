<?php
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;
use \PDO;

$autoCompletar = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
$autoCompletar = "higor";
define('CAMPO', 'nomePaciente,prontuario,teste2');
define('TABELA', 'paciente');
$clause = explode(',', CAMPO);
$campos = CAMPO;
$campo = '';
$clause_count = count($clause);
if ($clause_count > 1) {
    for ($x = 0; $x < $clause_count; $x++) {
        /* echo "<pre>"; print_r($c); echo "<pre>";exit; */
        if ($x != $clause_count - 1) {
            $campo .= " " . $clause[$x] . " LIKE '%" . $autoCompletar . "%' or ";
        } else {
            $campo .= " " . $clause[$x] . " LIKE '%" . $autoCompletar . "%'  ";
        }
    }
}
$tabela = TABELA;
$query = "SELECT " . $campos . " from " . $tabela . " where " . $campo . " order by nomePaciente asc limit 5";

$dados = [];
$resultado_msg_cont = (new db())->executeSQL($query);

while ($row_msg_count = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_msg_count['nomePaciente'];
    
}

echo json_encode($data);
?>