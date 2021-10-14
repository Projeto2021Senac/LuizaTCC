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


                <div class="form-group">
                    <label>Tipo da prótese</label>
                    <select class="form-control" name="tipo" value="">
                        <option hidden="">[SELECIONE]</option>
                        <option <?= ($objProtese->tipo == "Fixa" ? print('selected = "selected"') : '') ?>>Fixa</option>
                        <option <?= ($objProtese->tipo == "Removível" ? print('selected = "selected"') : '') ?>>Removível</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Posição</label>
                    <select class="form-control" name="posicao">
                        <option hidden="">[SELECIONE]</option>
                        <option <?= ($objProtese->material == "Metal" ? print('selected = "selected"') : '') ?>>Superior</option>
                        <option <?= ($objProtese->posicao == "Inferior" ? print('selected = "selected"') : '') ?>>Inferior</option>

                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Material do dente</label>
                            <select class="form-control" onchange="dureza(this.value)" name="material">
                                <option hidden="">[SELECIONE]</option>
                                <option <?= ($objProtese->material == "Metal" ? print('selected = "selected"') : '') ?>>Metal</option>
                                <option <?= ($objProtese->material == "Acrilico" ? print('selected = "selected"') : '') ?>>Acrilico</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Dureza do Acrílico</label>
                            <select class="form-control" name="nivelDureza" id="Dureza" disabled>
                                <option>[SELECIONE]</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Extensão</label>
                    <select class="form-control" name="extensao">
                        <option hidden="">[SELECIONE]</option>
                        <option>Total</option>
                        <option>Parcial</option>

                    </select>
                </div>

                <br>
            </div>

            <div class="col-4  bg-gradient" style=" background-color: black;opacity: 80%">

                <div>


                    <div class="form-group">
                        <label>Tipo de dente</label>
                        <select class="form-control" name="tipoDente">
                            <option hidden="">[SELECIONE]</option>
                            <option>Comum</option>
                            <option>Premium</option>

                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Quantidade de dentes</label>
                        <input type="number" class="form-control" name="qtdDentes">
                    </div>

                    <br>

                    <div class="row form-group">
                        <div class="form-check col-4" style="margin-left:15px;">
                            <input class="form-check-input" onchange="habilitar()" type="checkbox" id="denteOuro" name="denteOuro">
                            <label class="form-check-label" for="defaultCheck1">
                                Dente de ouro?
                            </label>
                        </div>
                        <div class="col-4">
                            <input name="qtdOuro" id="qtdOuro" type="number" disabled>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Paciente</label>
                        <select <?=(isset($_GET['prontuario']) ? 'readonly' : '')?> class="form-control" name="paciente">
                            <option hidden>-----Selecione o Paciente------</option>
                            <?php
                            if (gettype($pacientes) == 'array') {
                                foreach ($pacientes as $paciente) {

                                    echo "<option value =" . $paciente->prontuario . ">" . $paciente->nomePaciente . "</option>";
                                }
                            }else{
                                echo "<option hidden selected value =" . $pacientes->prontuario . ">" . $pacientes->nomePaciente . "</option>";
                            }

                            ?>

                        </select>
                    </div>

                </div>
                <br>

            </div>

            <div class="col-md-8 form-group offset-2" style=" background-color: black;opacity: 80%">
                <label>Observações</label>
                <textarea name="observacao" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-8 offset-2 bg-gradient " style=" background-color: black;opacity: 100%">
                <input type="submit" name="cadastrarProtese" class=" offset-5 btn btn-lg btn-success btInput" style="width:20%" value="Cadastrar" <?php //if ($btEnviar == TRUE) echo "disabled"; 
                                                                                                                                                    ?>>
            </div>
        </div>


</div>

</form>