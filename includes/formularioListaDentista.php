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
              class="btn btn-primary" >Editar</a>
           
         </td>
         </tr>';
}

$resultados = strlen($resultados)? $resultados : 
          '<tr>'
        . '<td colspan = "6" class = "text-center"> Nenhum dentista encontrado</td>'
        . '</tr>'; 
?>


<div class="container-fluid">
    <?php if($msg != ""){
        echo $msg; 
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='listaDentista.php'\">";
    }
        ?>
    <br>
    <div class="row ">
        

        <div class="row">

            <div class="col-2 offset-5 bg-gradient"  style=" background-color: black;opacity: 90%">
                <h5 style="color: white; text-align: center ">Dentista</h5>
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

                <input type="submit"  name="pesquisarDentista"
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
                <a href="listaDentista.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>

            </div>

            <div class=" col-2 ">
                <a href="cadastroDentista.php"> <button  class="btn btn-success w-100"> Novo Dentista</button> </a>
            </div>
        </div>

        <div class="col-8 offset-2">

            <table class="table table-responsive text-white bg-dark bg-gradient">
                <thead class="table-dark">
                    <tr><th>Código</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Ação</th></tr>
                        
                </thead>


                <tbody >
                    <?=$resultados?>
                    
                  
                </tbody>

            </table>
        </div>


    </div>

</div>

