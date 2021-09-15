<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg);background-repeat: no-repeat; background-size: 100%">
    <main>

        <section>
            <a href="index.php">
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
                        <select class="form-control" name="paciente" value="">
                            <option hidden="">[SELECIONE]</option>

                            <option value="1">exemplo</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Data da Consulta</label>
                        <input class="form-control" name="data" type="date">
                    </div>
                    <div class="form-group">
                        <label>Hora da Consulta</label>
                        <input class="form-control" name="hora" type="time">
                    </div>

                    <br>
                </div>

                <div class="col-4  bg-gradient" style=" background-color: black;opacity: 80%">

                    <div>


                        <div class="form-group">
                            <label>Quem indicou</label>
                            <select class="form-control" name="dentista">
                                <option hidden="">[SELECIONE]</option>

                                <option value="1">Dentista Exemplo</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Clínica</label>
                            <select class="form-control" name="clinica">
                                <option hidden="">[SELECIONE]</option>

                                <option value="1">Clinica Exemplo</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label>Status da Consulta</label>
                        <select class="form-control" name="status" >
                            <option >Agendada</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="1">Confirmada</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="2">Cancelada</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="3">Em andamento</option>
                            <option <?=(TITLE == 'Cadastrar Nova Consulta' ? print ('hidden = hidden') : '')?> value="4">Finalizada</option>
                        </select>
                    </div>
                    </div>
                    <br>

                </div>

                <div class="col-md-8 form-group offset-2" style=" background-color: black;opacity: 80%">
                    <label>Observações</label>
                    <textarea name="relatorio" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-8 offset-2 bg-gradient " style=" background-color: black;opacity: 100%">
                    <input type="submit" name="cadastrarProtese" class=" offset-5 btn btn-lg btn-success btInput" style="width:20%" value="Cadastrar" <?php //if ($btEnviar == TRUE) echo "disabled"; 
                                                                                                                                                        ?>>
                </div>
            </div>


    </div>

    </form>
</div>