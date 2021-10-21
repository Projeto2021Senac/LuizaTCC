<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>

        <section>
            <a href="pesquisarProtese.php">
                <button class="btn btn-success mt-4">Retornar</button>
            </a>

        </section>



    </main>

    <form method="post" style="color: white">
        <div class="row">
            <div class="col-8 offset-2 bg-gradient " style=" background-color: black;opacity: 80%">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            </div>

            <div class="col-4 bg-gradient offset-2" style=" background-color: black;opacity: 80%">

                <div class="row">
                    <div class="col-6 form-group">
                        <label>Tipo da prótese</label>
                        <select class="form-control" name="tipo" value="">
                            <option hidden="">[SELECIONE]</option>
                            <option <?= ($objProtese->tipo == "Fixa" ? print('selected = "selected"') : '') ?>>Fixa</option>
                            <option <?= ($objProtese->tipo == "Removível" ? print('selected = "selected"') : '') ?>>Removível</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label>Extensão</label>
                        <select class="form-control" name="extensao">
                            <option hidden="">[SELECIONE]</option>
                            <option <?= ($objProtese->extensao == "Total" ? print('selected = "selected"') : '') ?>>Total</option>
                            <option <?= ($objProtese->extensao == "Parcial" ? print('selected = "selected"') : '') ?>>Parcial</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Posição</label>
                    <select class="form-control" name="posicao">
                        <option hidden="">[SELECIONE]</option>
                        <option <?= ($objProtese->posicao == "Superior" ? print('selected = "selected"') : '') ?>>Superior</option>
                        <option <?= ($objProtese->posicao == "Inferior" ? print('selected = "selected"') : '') ?>>Inferior</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Marca do dente</label>
                    <select class="form-control" name="marca">
                        <option hidden="hidden">[SELECIONE]</option>
                    </select>
                </div>



                <br>
            </div>

            <div class="col-4  bg-gradient" style=" background-color: black;opacity: 80%">

                <div>

                    <div class="form-group">
                        <label>Quantidade de dentes</label>
                        <input type="number" class="form-control" name="qtdDentes" value="<?= $objProtese->qtdDente ?>">
                    </div>

                    <br>

                    <div class="row form-group">
                        <div class="form-check col-4" style="margin-left:15px;">
                            <input class="form-check-input" onchange="habilitar()" type="checkbox" id="denteOuro" name="ouroDente" <?= (($objProtese->ouro) == "sim" ? 'checked = checked' : '') ?>>
                            <label class="form-check-label" for="defaultCheck1">
                                Dente de ouro?
                            </label>
                        </div>
                        <div class="col-4">
                            <input name="qtdOuro" id="qtdOuro" type="number" <?= ($objProtese->ouro == 'sim' ? '' : 'disabled = disabled') ?> value="<?= ($objProtese->qtdOuro != '0' ? $objProtese->qtdOuro : '') ?>">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label>Paciente</label>
                        <select <?= (isset($_GET['prontuario']) ? 'readonly' : '') ?> class="form-control" name="paciente">
                            <option hidden>-----Selecione o Paciente------</option>
                            <?php
                            if (isset($pacientes)) {
                                if (gettype($pacientes) == 'object') {
                                    echo "<option selected value =" . $pacientes->prontuario . ">" . $pacientes->nomePaciente . "</option>";
                                }
                            } else {
                                if (TITLE == 'Editar Protese') {
                                    echo "<option hidden selected = selected value =" . $objProtese->prontuario . ">" . $objProtese->nomePaciente . "</option>";
                                }
                            }

                            ?>

                        </select>
                    </div>

                </div>
                <br>

            </div>

            <div class="col-md-8 form-group offset-2" style=" background-color: black;opacity: 80%">
                <label>Observações</label>
                <textarea name="observacao" class="form-control" rows="3"><?=$objProtese->observacao?></textarea>
            </div>
            <div class="col-8 offset-2 bg-gradient " style=" background-color: black;opacity: 100%">
                <input type="submit" name="cadastrarProtese" class=" offset-5 btn btn-lg btn-success btInput" style="width:20%" value="Cadastrar">
            </div>
        </div>
    </form>

</div>