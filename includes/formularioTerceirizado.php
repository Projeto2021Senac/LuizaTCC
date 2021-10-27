<<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </main>

    <div class="row">
        <div>
            <div class="row">

                <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 90%">
                    <h3 style="color: white; text-align: center"><?= TITLE ?></h3>
                </div>
            </div>
        </div>

        <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 80%">
            <form method="post" style="color: white">
                <!-- <h3>Cadastro Terceirizado </h3>-->
                <div class="form-group">
                    <label> Terceiro: </label>
                    <select class="form-control" name="Terceiro" value="">
                        <option selected="selected">[---SELECIONE---]</option>

                        <?php
                        foreach ($objTerceiro as  $terceiro) {

                            echo "<option value =" .  $terceiro->idTerceiro . ">" . $terceiro->nomeTerceiro . "</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label> Serviço Terceiro: </label>
                    <select class="form-control" name="ServicoTerceiro" value="">
                        <option>[---SELECIONE---]</option>

                        <?php
                        foreach ($objServicoTerceiro as  $ServicoTerceiro) {

                            echo "<option value =" .  $ServicoTerceiro->idServico . ">" . $ServicoTerceiro->nomeServico . "</option>";
                        }
                        ?>

                    </select>
                </div>

                <div>
                    <div class="row">
                        <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                            <br>
                            <input type="submit" name="<?= BTN ?>" class="btn btn-success btInput p-1 offset-5" value="Salvar" <?php //if ($btEnviar == TRUE) echo "disabled"; 
                                                                                                                                ?>>
                            <br>
                            <br>
                        </div>

                    </div>

            </form>
        </div>