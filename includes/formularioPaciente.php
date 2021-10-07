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

 <div class="container-fluid">
     
     <?php if($msg != ""){
         echo $msg; 
         echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='cadastroPaciente.php'\">" ;
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
                            <label>Número Prontuário</label>
                            <input type="text" class="form-control" name="prontuario" readonly placeholder="Número"
                                   value=" <?=$paciente->prontuario ?>">
                        </div>

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nomePaciente" required="" value="<?=$paciente->nomePaciente?>">
                        </div>

                        <div class="form-group">
                            <label>Sexo: </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="masculino" checked="">
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="feminino"<?=$paciente->sexo == 'feminino' ? 'checked': ''?> >
                                <label class="form-check-label" for="exampleRadios2">
                                    Feminino
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Telefone</label>
                            <input type="tel" class="form-control" name="tel"
                                   value="<?=$paciente->telefone?>" onkeypress="mascara(this, '#-#####-####')" maxlength="15">
                        </div>

                        <div class="form-group">
                            <label >E-mail</label>
                            <input type="email" class="form-control" name="email"
                                   value="<?=$paciente->email?>"
                                   >
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