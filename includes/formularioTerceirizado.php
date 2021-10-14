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

            <div class="form-group">
                <label> Terceiro</label>
                <select readonly="readonly" tabindex="-1" aria-disabled="true" class="form-control" name="Terceirizado" <?= (TITLE == 'Cadastrar Terceirizado' ? '' : '') ?>>
                    <option selected hidden="">[SELECIONE]</option>
                    <?php

                    foreach ($objterceirizado as $Terceirizado) {
                        $selected = ($objTerceirizado->fkTerceiro ==  $terceiro->prontuario ? 'selected = selected' : '');
                        echo "<option value = " . $Terceirizado->idTerceiro . " " . $selected . ">" .  $Terceirizado->nomeTerceirizado . "</option>";
                    }
                    ?>
                </select>
            </div>

                <div class="form-group">
                    <label> Serviço Terceiro</label>
                    <select class="form-control" name="ServicoTerceiro">
                        <option hidden="">[SELECIONE]</option>
                        <?php
                        foreach ($objServicoTerceiro as  $terceiro) {
                            $selected = ($objConsulta->fkServicoTerceiro== $ServicoTerceiro->idServicoTerceiro ? 'selected = selected' : '');
                            echo "<option value =" .  $terceiro->idServicoTerceiro . " " . $selected . ">" . $ $terceiro->nomeServicoTerceiro . "</option>";
                        }
                        ?>

                    </select>
                </div>

        <div>
            <div class="row">
            <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                <br>
                <input type="submit"  name="<?=BTN ?>"
                       class="btn btn-success btInput p-1 offset-5" value="Salvar"
                       <?php //if ($btEnviar == TRUE) echo "disabled"; ?>>
                <br>
                <br>
            </div>


    </div>

    </form>
    </div>