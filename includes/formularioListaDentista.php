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
foreach ($dentista as $d) {
    $resultados .= '<tr> '
        . '<td> ' . $d->idDentista . '</td>'
        . '<td> ' . $d->nomeDentista . '</td>'
        . '<td> ' . $d->statusDentista . '</td>'
        . '<td> 
          <a href="editaDentista.php?idDentista=' . $d->idDentista . '" 
              class="btn btn-info" >Editar</a>
           
         </td>
         </tr>';
}

$resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "6" class = "text-center"> Nenhum dentista encontrado</td>'
    . '</tr>';
?>


<div class="container-fluid">
    <?php if ($msg != "") {
        echo $msg;
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='listaDentista.php'\">";
    }
    ?>
    <br>
    
    <section class="d-flex justify-content-center mt-2">
        <div class="col-4">
            <div class="bg-dark rounded p-2">
                <h5 style="color: white; text-align: center ">Dentistas</h5>
                <form method="post" action="">
                    <div class="col-10 form-group p-2" style="margin:auto">

                        <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= $busca ?>">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" name="listaDentista" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">
                        </div>
                        <div class="col-6">
                            <a href="cadastroDentista.php">
                                <input type="button" name="listaDentista" class="btn btn-success btInput p- d-flex " style="margin:auto" value="Cadastrar">
                            </a>
                        </div>
                    </div>
                </form>

            </div>



        </div>
</div>

</section>
<br>
</div>


<div class="container-fluid">

    <div class="row">

        <div class="col-8 offset-2 mt-2">

            <table class="table table-responsive  bg-light bg-gradient">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>

                </thead>


                <tbody>
                    <?= $resultados ?>


                </tbody>

            </table>
        </div>


    </div>

</div>