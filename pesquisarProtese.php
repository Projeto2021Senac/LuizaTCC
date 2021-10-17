<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\Protese;
define('NAME', 'Protese');
define('LINK', 'pesquisarProtese.php');
if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nomePaciente LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



/**
 * Instancia a classe Protese, para fazer uso do seu método de pesquisa "GetProteses" localizado em Protese.php
 * 
 */

    $objProtese = new Protese;
    if (isset($_GET['idConsulta'],$_GET['idProcedimento'],$_GET['prontuario']) && is_numeric($_GET['idConsulta'])&& 
    is_numeric($_GET['idProcedimento'])&& is_numeric($_GET['prontuario']) && $_GET['idConsulta'] > 0 && $_GET['idProcedimento'] > 0 && $_GET['prontuario'] > 0){
        
        $proteses = $objProtese->getProteses('fkConsultaT ='.$_GET['idConsulta'],null,null,null,null,);
        /* echo "<pre>"; print_r($proteses); echo "<pre>";exit; */
        if ($proteses == null ){
            /* echo "<pre>"; print_r('testando'); echo "<pre>";exit; */
            header('location:cadastrarProtese.php?idConsulta='.$_GET['idConsulta'].'&idProcedimento='.$_GET['idProcedimento'].'&prontuario='.$_GET['prontuario']);
        }
    }else{
        $proteses = $objProtese->getProtesesPaciente($where);
        /* echo "<pre>"; print_r($proteses); echo "<pre>";exit; */
    }
    //Roda o método getProteses que está localizado em Protese.php para trazer todos os registros do banco no formato de um array de objetos.
    
    
    $resultados = '';
    foreach ($proteses as $protese) {
        $table = ($protese->tipo == "Fixa" ? 'class = "table-active text-center"' : '');
        $resultados .= '<tr class = "text-center">

                            <td >' . $protese->idProtese . '</td>
                            <td>' . $protese->nomePaciente . '</td>
                            <td>' . $protese->tipo . '</td>
                            <td>' . $protese->extensao . '</td>
                            <td>' . $protese->marcaDente . '</td>
                            <td>' . $protese->qtdDente . '</td>
                            <td>' . ($protese->ouro == 'sim' ? 'Sim' : 'Não') . '</td>
                            <td>' . $protese->qtdOuro . '</td>
                            <td>' . date('d/m/Y à\s H:i:s', strtotime($protese->dataRegistro)) . '</td>
                            <td>
                            <a href = editaProtese.php?id=' . $protese->idProtese . '>
                            <button class = "btn btn-primary">Editar</button>
                            </a>
                            <a href = ?id=' . $protese->idProtese . '>
                            <button class = "btn btn-primary">Excluir</button>
                            </a>
                            </td>

        
                            </tr>';
    }
    $resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhuma Prótese foi encontrada no histórico</td>'
    . '</tr>';


    
//echo "<pre>"; print_r($proteses); echo "<pre>";exit;


    
    
    
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listaProteses.php';
include __DIR__.'/includes/mensagensCRUD.php';
include __DIR__.'/includes/footer.php';
