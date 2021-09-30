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

if (isset($_GET['rConsulta'])) {
    $rastreio->TFKConsulta=$_GET['rConsulta'];
}
?>

 <div class="container-fluid">
     
     <?php if($msg != ""){
         echo $msg; 
         echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='cadRastreio.php'\">" ;
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
                        
                        <div class="form-group">
                            <label>Código</label>
                            <input type="text" class="form-control" name="idRastreio" readonly placeholder="Número"
                                   value=" <?=$rastreio->idRastreio ?>">
                        </div>

                        <div class="form-group">
                            <label>Data de Envio</label>
                            <input type="date" class="form-control" name="dtEntrega"  value="<?=$rastreio->dtEntrega?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Data de Retorno</label>
                            <input type="date" class="form-control" name="dtRetorno"  value="<?=$rastreio->dtRetorno?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Observação</label>
                            <input type="text"   class="form-control" name="obs"  value="<?=$rastreio->obs?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control" name="vlrCobrado"  value="<?=$rastreio->vlrCobrado?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Consulta</label>
                            <!--<select type="text" class="form-control-sm" name="TFKConsulta" >
                                <option hidden="" >[SELECIONE]</option>
                                <?php/*
                                foreach ($consulta as $cons){
                                    $selected = ($rastreio->TFKConsulta == $cons->idConsulta ? 'selected = selected' : '');
                                    echo "<option value =".$cons->idConsulta." ".$selected.">".$cons->idConsulta."</option>";
                                }
                               */ ?>
                            </select>-->
                            <input type="text" class="form-control-sm" name="TFKConsulta"  value="<?=$rastreio->TFKConsulta?>">
                            <input type="submit" name="pConsultaRast"
                                   class="btn btn-success btInput p-1 " value="Pesquisar">
                            
                                
                        </div>
                        
                        <div class="form-group">
                            <label>Procedimento</label>
                            <!--<select type="text" class="form-control" name="TFKProcedimento"  >
                                  <option hidden="">[SELECIONE]</option>
                                <?php/*
                                foreach ($procedimento as $proc){
                                    $selected = ($rastreio->TFKProcedimento == $proc->idProcedimento ? 'selected = selected' : '');
                                    echo "<option value =".$proc->idProcedimento." ".$selected.">".$proc->nomeProcedimento."</option>";
                                }
                                */?>
                                </select>-->
                            <input type="text" class="form-control-sm" name="TFKProcedimento"
                                   value="<?=($tratamento->fkConsulta==$rastreio->TFKConsulta)? $tratamento->fkProcedimento: "" ?>">
                            <!--<input type="submit" name="pConsultaRast"
                                  class="btn btn-success btInput p-1 " value="Pesquisar">-->
                        </div>
                        
                        <div class="form-group">
                            <label>Terceirizado</label>
                            <select type="text" class="form-control" name="RFKTerceiro"  >
                                  <option hidden="">[SELECIONE]</option>
                                <?php
                                foreach ($terceiro as $terc){
                                    $selected = ($rastreio->RFKTerceiro == $terc->idTerceiro ? 'selected = selected' : '');
                                    echo "<option value =".$terc->idTerceiro." ".$selected.">".$terc->nomeTerceiro."</option>";
                                }
                                ?>
                                </select>
                                
                        </div>
                        
                        <div class="form-group">
                            <label>Serviço Terceirizado</label>
                            <select type="text" class="form-control" name="RFKServico"  >
                                       <option hidden="">[SELECIONE]</option>
                                <?php
                                foreach ($servico as $serv){
                                    $selected = ($rastreio->RFKServico == $serv->idServico ? 'selected = selected' : '');
                                    echo "<option value =".$serv->idServico." ".$selected.">".$serv->nomeServico."</option>";
                                }
                                ?>
                                </select>
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