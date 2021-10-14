<?php
$msg = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $msg = '<div class ="alert alert-success"> Ação executada com sucesso!</div>';
            break;
        case 'error':
            $msg = '<div class ="alert alert-success"> Ação não executada!</div>';
            break;

    }
}

?>

 <div class="container-fluid" >
     
     <?php if($msg != ""){
         echo $msg; 
         echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='cadastroDentista.php'\">" ;
     }
         
      ?>
     <br>
            <div class="row">
                
                <div>
                    <div class="row">

                        <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 90%">
                            <h3 style="color: white; text-align: center"><?=TITLE?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 80%">

                 
                    <form method="post" action="" style="color: white" >
                        <!-- <h3>Cadastro Paciente</h3>-->
                        <div class="form-group">
                            <label>Código</label>
                            <input type="text" class="form-control" name="idDentista" readonly placeholder="Número"
                                   value=" <?=$dentista->idDentista ?>">
                        </div>

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nomeDentista" required="" value="<?=$dentista->nomeDentista?>">
                        </div>

                        <div class="form-group">
                            <label>Status: </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="ativo" checked="">
                                <label class="form-check-label" for="exampleRadios1">
                                    Ativo
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="inativo"<?=$dentista->statusDentista == 'inativo' ? 'checked': ''?> >
                                <label class="form-check-label" for="exampleRadios2">
                                    Inativo
                                </label>
                            </div>
                        </div>

                        <br>

                </div>
                <div>
                    <div class="row">
                        <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                            <br>
                            <input type="submit"  name="<?=BTN ?>"
                                   class="btn btn-success btInput p-1 offset-5" value="Enviar"
                                   <?php //if ($btEnviar == TRUE) echo "disabled"; ?>>
                            <br>
                            <br>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>