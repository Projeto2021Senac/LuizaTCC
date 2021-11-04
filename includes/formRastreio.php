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


if (isset($_GET['rProtese'])) {

    $rastreio->fkProtese = $_GET['rProtese'];
}
?>



<div class="container-fluid">

    <?php
    if ($msg != "") {
        echo $msg;
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='cadRastreio.php'\">";
    }
    ?>
    <br>

    <section>
        <a href="listaRastreio.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>
    </section>


    <!--<div class="row">-->

    <div class="row" style="margin-top: -50px">
        <div class="col-4 offset-4">
            <div class="row">
                <div class=" bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                    <h3 style="color: white; text-align: center"><?= TITLE ?></h3>
                </div>
            </div>

            <div class=" row bg-gradient rounded-3" style=" background-color: black;opacity: 80%">



                <form method="post" action="" style="color: white">

                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" class="form-control" name="idRastreio" readonly placeholder="Número" value=" <?= $rastreio->idRastreio ?>">
                    </div>

                    <div class="form-group">
                        <label>Data de Envio</label>
                        <input type="date" class="form-control" name="dtEntrega" value="<?= $rastreio->dtEntrega ?>">
                    </div>

                    <div class="form-group">
                        <label>Data de Retorno</label>
                        <input type="date" class="form-control" name="dtRetorno"  value="<?= $rastreio->dtRetorno ?>">
                    </div>

                    <div class="form-group">
                        <label>Observação</label>
                        <input type="text" class="form-control" name="obs" value="<?= $rastreio->obs ?>">
                    </div>

                    <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" name="vlrCobrado" value="<?= $rastreio->vlrCobrado ?>">
                    </div>


                    <div class="form-group " hidden="">
                        <label>Prótese</label>
                        <input type="text" class="form-control" name="fkProtese" value="<?= $rastreio->fkProtese ?>">
                    </div>



                    <div class="form-group">
                        <label>Terceirizado</label>
                        <select type="text" class="form-control" name="RFKTerceiro" id="id_terceiro" onchange="FuncaoMaior(this.value)" <?= TITLE === "Editar Rastreio" ? 'disabled' : '' ?>>
                            <option hidden="" value="0">[SELECIONE]</option>
                            <?php
                            foreach ($terceiro as $terc) {
                                $selected = ($rastreio->RFKTerceiro == $terc->idTerceiro ? 'selected = selected' : '');
                                echo "<option value =" . $terc->idTerceiro . " " . $selected . ">" . $terc->nomeTerceiro . "</option>";
                            }
                            ?>
                        </select>
                    </div>


                   

                    <?php if (TITLE == "Editar Rastreio") {
                        ?>
                        <!--Dublê usado para passar o post, pois o disabled não passa o dado.-->
                        <div class="form-group"  hidden="">
                            <label>Terceirizado</label>
                            <select type="text" class="form-control" name="RFKTerceiro">
                                <option hidden="" >[SELECIONE]</option>
                                <?php
                                foreach ($terceiro as $terc) {
                                    $selected = ($rastreio->RFKTerceiro == $terc->idTerceiro ? 'selected = selected' : '');
                                    echo "<option value =" . $terc->idTerceiro . " " . $selected . ">" . $terc->nomeTerceiro . "</option>";
                                }
                                ?>
                            </select>

                        </div>

                        <?php
                    }
                    ?>


                    <div class="form-group">
                        <label>Serviço Terceirizado</label>
                        <select id="servico_terceiro" class = "form-control">
                            <option value="" hidden>Escolher Servico</option>
                        </select>
                    </div>


                    <?php if (TITLE == "Editar Rastreio") {


                    ?>
                        <!--Dublê usado para passar o post, pois o disabled não passa o dado.-->
                        <div class="form-group" hidden="">
                            <label>Serviço Terceirizado</label>
                            <select id="servico_terceiro">
                                <option value="" hidden>Escolher Servico</option>
                            </select>
                        </div>

                    <?php
                    }
                    ?>

                    <div class="form-group">
                        <label>Status</label>
                        <select type="text" class="form-control" name="status">
                            <option hidden="">[SELECIONE]</option>

                            <option value="aberto" <?= 'aberto' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Aberto</option>
                            <option value="finalizado" <?= 'finalizado' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Finalizado</option>
                            <option value="cancelado" <?= 'cancelado' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Cancelado</option>



                        </select>
                    </div>


                    <br>

            </div>
            <div>
                <div class="row">
                    <div class="  bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                        <br>
                        <input type="submit" name="<?= BTN ?>" class="btn btn-success btInput p-1 offset-5" value="Enviar" <?php //if ($btEnviar == TRUE) echo "disabled";  
                                                                                                                            ?>>
                        <br>
                        <br>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--</div>-->

        <!--<div class="row">-->
        <?php
        if (isset($_GET['rProtese'])) {
        ?>
            <div class="col-4">
                <div class="rounded-3" style=" background-color: black; opacity: 80%; text-align: left; line-height: 3 ; padding-left: 10px;  ">
                    <label style="color: orange">
                        <?php
                        if ($innerTratamento != null) {
                            echo 'PRONTUÁRIO: <b>' . $innerTratamento->prontuario . ' </b> || PACIENTE: <b>' . $innerTratamento->nomePaciente .
                                '</b><br>CONSULTA: <b>' . $innerTratamento->idConsulta . '</b> || DATA: <b>' . date('d/m/Y', strtotime($innerTratamento->dataConsulta)) .
                                '</b><br>DENTISTA: <b>' . $innerTratamento->nomeDentista . '</b> || CLÍNICA: <b>' . $innerTratamento->nomeClinica . '<hr>' .
                                '</b>IDPRÓTESE: <b>' . $innerTratamento->idProtese . '</b> || TIPO: <b>' . $innerTratamento->tipo .
                                '</b><br>POSIÇÂO: <b>' . $innerTratamento->posicao . '</b> <br> DATA-REGISTRO: <b>' . date('d/m/Y', strtotime($innerTratamento->dataRegistro));
                        }
                        ?>

                    </label>

                </div>
            </div>
        <?php
        }
        ?>

    </div>



</div>
</div>
