<div class="container-fluid" style="height:-webkit-fill-available">


    <section>
        <a href="<?= (TITLE == 'Cadastrar Nova Consulta' ? 'index.php' : 'pesquisarConsulta.php') ?>">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <main>
        <div class="col-10">
            <div class="text-white offset-2 bg-gradient border border-primary p-4 rounded-3" style="background-color:black;opacity:80%">
                <div>
                    <h3 style="text-align: center;"><?= TITLE ?></h3>
                </div>
                <div class="row border p-3">
                    <div class="col-4 offset-1 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Nome do paciente:</strong> <?= $objPaciente2->nome ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Data da Consulta</strong> : <?= date('d/m/Y', strtotime($objConsulta->dataConsulta)) ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Hora da Consulta:</strong> <?= date('H:i', strtotime($objConsulta->horaConsulta)) ?></label>
                        </div>
                    </div>
                    <div class="col-4 offset-2 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Quem indicou: </strong><?= $objDentista2->nomeDentista ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Clínica Atendida:</strong> <?= $objClinica2->nomeClinica ?></label>

                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Status atual da Consulta: </strong><?= $objConsulta->statusConsulta ?></label>
                        </div>
                    </div>
                    <label class="mt-3 text-info" for="relatorio"><strong>Observações pré-Consulta:</strong></label>
                    <textarea readonly name="relatorio" style=" background-color: black;opacity:80%;resize:none" class="text-white" rows="3"><?= $objConsulta->relatorio ?></textarea>
                    <form method="post" class="mt-4">
                        <div class="col-10 offset-1 form-group">
                            <select class = "form-select">
                                <option hidden>-[SELECIONE O SERVIÇO A SER REALIZADO]-</option>
                                <?php
                                foreach($objProcedimento as $procedimento){
                                    echo '<option value = '.$procedimento->idProcedimento.'>'.$procedimento->nomeProcedimento.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>






</div>