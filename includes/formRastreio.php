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
    $rastreio->TFKProcedimento=$_GET['rProcedimento'];
  
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
                        
                        <div>
                            <br>
                        <input type="submit" name="pConsultaRast"
                                   class="btn btn-success btInput p-1 " value="Prontuário">
                        <hr>
                        </div>
                        
                        <div class="form-group" hidden="">
                            <label>Consulta</label>
<<<<<<< HEAD

                        </div>
=======
                            <input type="text" class="form-control-sm" name="TFKConsulta"  value="<?=$rastreio->TFKConsulta?>">
                        </div>
                        
                        <div class="form-group" hidden="">
                            <label>Procedimento</label >
                            <input  type="text" class="form-control-sm" name="TFKProcedimento"  value="<?=$rastreio->TFKProcedimento?>">
                        </div>
                        
                        <div>
                            
                            <label style="color: green">
                               <?php 
                                     if ($innerTratamento!= null) {
                                         echo '<b>PRONTUÁRIO: '.$innerTratamento->prontuario.'<br>PACIENTE: '.$innerTratamento->nomePaciente.
                                       '<br>CONSULTA: '.$innerTratamento->idConsulta. '<br>DATA: '.date('d/m/Y', strtotime($innerTratamento->dataConsulta)).
                                       '<br>DENTISTA: '.$innerTratamento->nomeDentista. '<br>CLÍNICA: '.$innerTratamento->nomeClinica.
                                       '<br>PROCEDIMENTO: '.$innerTratamento->nomeProcedimento;
                                     }
                               
                                ?>
                                
                            </label>
                            <hr>
                        </div>
                        
                        
>>>>>>> 6ae8e7c1e08a5765107b6ade906c8187443423e2
                        
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
                        
                         <div class="form-group">
                            <label>Status</label>
                            <select type="text" class="form-control" name="Status"  >
                                       <option hidden="">[SELECIONE]</option>
                                       <option value="ativo">Ativo</option>
                                       <option value="inativo">Inativo</option>

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
