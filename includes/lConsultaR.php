<div class="container-fluid" style=" height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>
        <section>
            <a href="index.php">
                <button class="btn btn-success mt-4">Retornar</button>
            </a>
            
            
            <div class="row">
            <div class="col-2 offset-5 bg-gradient" style=" background-color: black; opacity: 80%;">


                <form method="post" action="" style="color: white" >
                    
                    <div class="form-group">

                        <input type="text" class="form-control p-1" name="busca" required=""  value="<?=$busca?>">
                    </div>

            </div>
        </div>

        <div class="row">

            <div class="col-2 offset-5 bg-gradient " style=" background-color: black;opacity: 100%">

                <input type="submit"  name="pesquisarPron"
                       class="btn btn-success btInput p-1 d-flex " style="text-align: center; margin: 0 auto" value="Pesquisar">

            </div>

            </form>
        </div>

        </section>
  
        <?php
      if (isset($_GET['rastreio'])=="check") {
    $disabledRastreio= 'class = "btn btn-secondary"';
    $disabled2='ok';
    $disabled1='hidden=""';
} else {
    $disabledRastreio= 'hidden=""';
    $disabled2='';
    $disabled1='';
}
        $resultados = '';
        
        foreach ($innerTratamentos as $dados) {
            
            $disabled = ($dados->statusConsulta == 'Finalizada' ? 'class = "btn btn-secondary" disabled = disabled' : 'class = "btn btn-danger"');
            $disabled = ($disabled2 == 'ok' ? 'hidden=""' : $disabled);
            
            $resultados .= '<tr ">
                            <td class "table-success >' . $dados->nome . '</td>
                                <td>' . $dados->prontuario . '</td>
                                <td>' . $dados->idConsulta . '</td>
                            <td>' . date('d/m/Y', strtotime($dados->dataConsulta)) . '</td>
                            <td>' . date(' H:i', strtotime($dados->horaConsulta)) . '</td>
                            <td>' . $dados->statusConsulta . '</td>
                            <td>' . $dados->nomeDentista . '</td>
                            <td>' . $dados->nomeClinica . '</td>
                            <td>' . $dados->nomeProcedimento . '</td>
                            
                            <td>
                            
                            <a '.$disabledRastreio.'href = cadRastreio.php?rConsulta=' . $dados->idConsulta. '&' .'rProcedimento='.$dados->idProcedimento . '>Confirmar</a>
                            </td>
                            </tr>';
        }
        $resultados = strlen($resultados)? $resultados : 
          '<tr>'
        . '<td colspan = "6" class = "text-center"> Nenhuma Consulta foi encontrada no histórico</td>'
        . '</tr>'; 
?>

        
        <section>

            <table class="table bg-light bg-gradient mt-3">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Paciente</th>
                        <th>Prontuário</th>
                        <th>Consulta</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>status</th>
                        <th>Dentista</th>
                        <th>Clínica</th>
                        <th>Procedimento</th>

                        <th></th>


                    </tr>

                </thead>
                <tbody>
                    <?= $resultados ?>

                </tbody>

            </table>



        </section>
    </main>
</div>