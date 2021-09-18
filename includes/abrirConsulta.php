
<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg);background-repeat: no-repeat; background-size: cover">
    <main>

        <section>
            <a href="<?=(TITLE == 'Cadastrar Nova Consulta' ? 'index.php' : 'pesquisarConsulta.php')?>">
                <button class="btn btn-success mt-4">Retornar</button>
            </a>

        </section>



    </main>
    <div class="col-10 offset-1">
        <form method="post" style="color: white">
            <div class="row">
                <div class="col-8 offset-2 bg-gradient " style=" background-color: black;opacity: 80%">
                    <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                </div>

                <div class="col-4 bg-gradient offset-2" style=" background-color: black;opacity: 80%">


                    <div class="form-group">
                        <label>Paciente Atendido</label>
                        <select class="form-control" name="paciente" <?=(TITLE == 'Cadastrar Nova Consulta' ? '' : 'disabled = disabled')?> value="">
                            <option hidden="">[SELECIONE]</option>
                            <?php
                            

                                    echo "<option value =".$objPaciente2->prontuario." selected >".$objPaciente2->nome."</option>";
                                ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Data da Consulta</label>
                        <input class="form-control" disabled = "disabled" name="data" type="date" value = "<?=$objConsulta->dataConsulta?>">
                    </div>
                    <div class="form-group">
                        <label>Hora da Consulta</label>
                        <input class="form-control" disabled = "disabled" name="hora" value = "<?=$objConsulta->horaConsulta?>"type="time">
                    </div>

                    <br>
                </div>

                <div class="col-4  bg-gradient" style=" background-color: black;opacity: 80%">

                    <div>


                        <div class="form-group">
                            <label>Quem indicou</label>
                            <select class="form-control" disabled = "disabled" name="dentista">
                                <option hidden="">[SELECIONE]</option>
                                <?php
                                    echo "<option value =".$objDentista2->idDentista." selected >".$objDentista2->nomeDentista."</option>";
                                
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Clínica</label>
                            <select class="form-control" disabled = "disabled" name="clinica">
                                <option hidden="">[SELECIONE]</option>
                                <?php
                                    echo "<option value =".$objClinica2->idClinica." selected >".$objClinica2->nomeClinica."</option>";
                                
                                ?>
                                
                            </select>
                        </div>
                        <div class="form-group">
                        <label>Status da Consulta</label>
                        <select class="form-control" name="status" >
                            <option >Agendada</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="1" <?=($objConsulta->statusConsulta == 'Confirmada' ? print('selected = selected') : '')?> >Confirmada</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="2" <?=($objConsulta->statusConsulta == 'Cancelada' ? print('selected = selected') : '')?>>Cancelada</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="3" <?=($objConsulta->statusConsulta == 'Em andamento' ? print('selected = selected') : '')?>>Em andamento</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="4" <?=($objConsulta->statusConsulta == 'Finalizada' ? print('selected = selected') : '')?>>Finalizada</option>
                        </select>
                    </div>
                    </div>
                    <br>

                </div>
                <div class="col-md-8 form-group offset-2" style=" background-color: black;opacity: 80%">
                    <label>Observações pré-Consulta</label>
                    <textarea name="relatorio" class="form-control" rows="3"><?= $objConsulta->relatorio?></textarea>
                </div>
                <div class="col-8 offset-2 bg-gradient " style=" background-color: black;opacity: 100%">
                    <input type="submit" name="<?TITLE?>" class=" offset-5 btn btn-lg btn-success btInput" style="width:20%" value="<?=(TITLE == "Cadastrar Nova Consulta" ? 'Cadastrar' : 'Editar')?>" <?php //if ($btEnviar == TRUE) echo "disabled"; 
                                                                                                                                                        ?>>
                </div>
            </div>


    </div>

    </form>
</div>