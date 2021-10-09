

<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <?php
    $msg = '';
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $msg = '<div class ="alert alert-success"> Ação executada com sucesso!</div>';
                break;
            case 'error':
                $msg = '<div class ="alert alert-danger"> Ação não executada!</div>';
                break;
        }
    }
    
 

    $resultados = '';
    foreach ($rastreio as $ras) {
        $resultados .= '<tr>
                            <td class "table-success>' . $ras->idRastreio . '</td>
                            <td>' . date('d/m/y', strtotime($ras->dtEntrega)) . '</td>
                            <td>' . date('d/m/y', strtotime($ras->dtRetorno)) . '</td>
                            <td>' . $ras->idProtese . '</td>
                            <td>' . $ras->tipo . '</td>
                            <td>' . $ras->posicao . '</td>
                           <!-- <td>' . $ras->obs . '</td>
                            <td>' . $ras->vlrCobrado . '</td>-->
                            <td>' . $ras->nomePaciente . '</td>
                            <td>' . $ras->prontuario . '</td>
                            <td>' . $ras->idConsulta . '</td>
                            <!--<td>' . $ras->nomeProcedimento . '</td>-->
                            <td>' . $ras->nomeTerceiro . '</td>
                            <td>' . $ras->nomeServico . '</td>
                            <td>' . $ras->statusRastreio . '</td>
                            
                           
                            <td>
                            <a href = detalhaRastreio.php?id=' . $ras->idRastreio . '>
                            <button class = "btn btn-primary">Detalhes</button>
                            </a>
                            </td>
                            </tr>';
    }
    
    $resultados = strlen($resultados)? $resultados : 
          '<tr>'
        . '<td colspan = "12" class = "text-center"> Nenhum Registro encontrado</td>'
        . '</tr>'; 
    
    ?>
    
    
    
    <div class="container-fluid">
    <?php if($msg != ""){
        echo $msg; 
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='listaRastreio.php'\">";
    }
        ?>
    <br>
    <div class="row ">
        

        <div class="row">

            <div class="col-2 offset-5 bg-gradient"  style=" background-color: black;opacity: 90%">
                <h5 style="color: white; text-align: center ">Rastreio</h5>
            </div>
        </div>


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

                <input type="submit"  name="pesquisarRastreio"
                       class="btn btn-success btInput p-1 d-flex " style="text-align: center; margin: 0 auto" value="Pesquisar">

            </div>

            </form>
        </div>
    </div>
    <br>
</div>


<div class="container-fluid">

    <div class="row">

        <div class="row">
            <div class=" col-2 offset-4">
                <a href="listaRastreio.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>

            </div>

            <div class=" col-2 ">
                <a href="listaConsultaR.php?rastreio=check"> <button  class="btn btn-success w-100"> Novo Rastreio</button> </a>
            </div>
        </div>
        
    <section>

        <table class="table bg-light mt-3">
            <thead class = "bg-dark text-light">
                <tr>
                    <th>ID</th>
                    <th>Envio</th>
                    <th>Retorno</th>
                    <th>Prótese</th>
                    <th>Tipo</th>
                    <th>Posição</th>
                    <!--<th>obs</th> colocar no formulario de apresentação -->
                    <!--<th>valor</th>-->
                    <th>Paciente</th>
                    <th>Prontuário</th>
                    <th>Consulta</th>
                    <!--<th>Procedimento</th>-->
                    <th>Terceirizado</th>
                    <th>Serviço</th>
                    <th>Status</th>
                    
                    <th></th>
                    <th></th>


                </tr>

            </thead>
            <tbody>
<?= $resultados ?>
                 
              

            </tbody>
            
 

   

        </table>



    </section>
</main>
