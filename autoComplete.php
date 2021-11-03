<?php
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;
/* use PDO; */

$autoCompletar = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);
//$autoCompletar = "Guilherme";
/* echo "<pre>"; print_r($autoCompletar); echo "<pre>";exit; */
define('CAMPO', 'nomePaciente,prontuario');
define('TABELA', 'paciente');
$clause = explode(',', CAMPO);
/* echo "<pre>"; print_r($clause); echo "<pre>";exit; */
$campos = CAMPO;
$campo = '';
$clause_count = count($clause);
if ($clause_count > 1) {
    for ($x = 0; $x < $clause_count; $x++) {
        /* echo "<pre>"; print_r($c); echo "<pre>";exit; */
        if ($x != $clause_count - 1) {
            $campo .= " " . $clause[$x] . " LIKE '%" . $autoCompletar . "%' or ";
            /* echo "<pre>"; print_r($clause[$x]); echo "<pre>";exit; */
        } else {
            $campo .= " " . $clause[$x] . " LIKE '%" . $autoCompletar . "%'  ";
            /* echo "<pre>"; print_r($clause[$x]); echo "<pre>";exit; */
        }
    }
}else{

}
$tabela = TABELA;
$query = "SELECT " . $campos . " from " . $tabela . " where " . $campo . " order by nomePaciente asc limit 5";
/* echo "<pre>"; print_r($query); echo "<pre>";exit; */
$resultado_msg_cont = (new db())->executeSQL($query);
/* echo "<pre>"; print_r($resultado_msg_cont); echo "<pre>";exit; */

while ($row_msg_count = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    /* echo $row_msg_count['nomePaciente']; */
    $data[] = $row_msg_count['nomePaciente'];
    
}
if ($data == null) {
$data = ['Sem Resultados'];
}
echo json_encode($data);


?>
