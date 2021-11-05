<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Consulta</title>
    <link rel='stylesheet' type='text/css' href='FullCalendar/main.min.css' />
    <link rel='stylesheet' type='text/css' href='FullCalendar/style.css' />
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script type='text/javascript'>
        function click(id) {
            var btn = document.getElementById(id);
            btn.click();
            $("#exampleModalLabel").html('Cadastro Consulta Teste')
        }
    </script>


</head>

<body onload="click('botaoModal')">

    <button><a href="index.php">Voltar</a></button>

    <!-- Button trigger modal -->
    <button type="button" hidden id="botaoModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class = "p-3 bg-dark"> 
                        <form method="post" style="color: white">
                            <div class="p-2">
                                <div class="col-12" style=" background-color: black;opacity: 80%">
                                    <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                                </div>

                                <div class="col-12" style=" background-color: black;opacity: 80%">


                                    <div class="form-group">
                                        <label>Paciente Atendido</label>
                                        <select readonly="readonly" tabindex="-1" aria-disabled="true" class="form-control" name="paciente" <?= (TITLE == 'Cadastrar Nova Consulta' ? '' : '') ?>>
                                            <option selected hidden="">[SELECIONE]</option>
                                            <?php

                                            foreach ($objPaciente as $paciente) {
                                                $selected = ($objConsulta->fkProntuario == $paciente->prontuario ? 'selected = selected' : '');
                                                echo "<option value = " . $paciente->prontuario . " " . $selected . ">" . $paciente->nomePaciente . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Data da Consulta</label>
                                        <input class="form-control" name="data" type="date" value="<?= $objConsulta->dataConsulta ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Hora da Consulta</label>
                                        <input class="form-control" name="hora" value="<?= $objConsulta->horaConsulta ?>" type="time">
                                    </div>

                                    <br>
                                </div>

                                <div class="col-4  bg-gradient" style=" background-color: black;opacity: 80%">

                                    <div>


                                        <div class="form-group">
                                            <label>Quem indicou</label>
                                            <select class="form-control" name="dentista">
                                                <option hidden="">[SELECIONE]</option>
                                                <?php
                                                foreach ($objDentista as $dentista) {
                                                    $selected = ($objConsulta->CFKDentista == $dentista->idDentista ? 'selected = selected' : '');
                                                    echo "<option value =" . $dentista->idDentista . " " . $selected . ">" . $dentista->nomeDentista . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Clínica</label>
                                            <select class="form-control" name="clinica">
                                                <option hidden="">[SELECIONE]</option>
                                                <?php
                                                foreach ($objClinica as $clinica) {
                                                    $selected = ($objConsulta->CFKClinica == $clinica->idClinica ? 'selected = selected' : '');
                                                    echo "<option value =" . $clinica->idClinica . " " . $selected . ">" . $clinica->nomeClinica . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status da Consulta</label>
                                            <select class="form-control" name="status">
                                                <option>Agendada</option>
                                                <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Confirmada' ? print('selected = selected') : '') ?>>Confirmada</option>
                                                <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Cancelada' ? print('selected = selected') : '') ?>>Cancelada</option>
                                                <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Em andamento' ? print('selected = selected') : '') ?>>Em andamento</option>
                                                <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Finalizada' ? print('selected = selected') : '') ?>>Finalizada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                                <div class="col-md-8 form-group offset-2" style=" background-color: black;opacity: 80%">
                                    <label>Observações pré-Consulta</label>
                                    <textarea name="relatorio" class="form-control" rows="3"><?= (TITLE != 'Cadastrar Nova Consulta'  ? $objConsulta->relatorio : '') ?></textarea>
                                </div>
                                <div class="col-8 offset-2 bg-gradient " style=" background-color: black;opacity: 100%">
                                    <input type="submit" name="<? TITLE ?>" class=" offset-5 btn btn-lg btn-success btInput" style="width:20%" value="<?= (TITLE == "Cadastrar Nova Consulta" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled"; 
                                                                                                                                                                                                                            ?>>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div id="aviso" class="text-center"></div>
    <div id="calendar" class="calendar"></div>

    <script src="js/bootstrap.min.js"></script>
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='FullCalendar/main.min.js'></script>
    <script type='text/javascript' src='FullCalendar/javascript.js'></script>





</body>

</html>