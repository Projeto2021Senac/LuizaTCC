<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>

        <section>
            <a href="index.php">
                <button class="btn btn-success mt-4">Menu</button>
            </a>

        </section>

    </main>
    <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
        <div class="border border-white rounded p-2">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <form class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">
                    <div class="form-group">
                        <label>Número do ID Terceiro:</label>
                        <input type="text" placeholder="000" class="form-control" name="idTerceiro" value=" <?= $objTerceiro->idTerceiro ?>">
                    </div>

                    <div class="form-group">
                        <label>Nome: </label>
                        <input type="text" class="form-control" name="nomeTerceiro" placeholder="Terceiro " required="" value="<?= $objTerceiro->nomeTerceiro ?>">
                    </div>

                    <div class="form-group">
                        <label>Celular:</label>
                        <input type="tel" class="form-control" name="telefone" placeholder="+55(DD)00000-0000" required="" value="<?= $objTerceiro->telefone ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label>Status do Funcionário: </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="btn-check" name="status" id="success-outlined" autocomplete="off" <?= $objTerceiro->statusTerceiro == 'Inativo' ? '' : 'checked' ?>>
                            <label class="btn btn-outline-success" for="success-outlined">Ativo</label>


                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="btn-check" name="status" id="danger-outlined" autocomplete="off" <?= $objTerceiro->statusTerceiro == 'Inativo' ? 'checked' : '' ?>>
                            <label class="btn btn-outline-danger" for="danger-outlined">Inativo</label>
                        </div>
                        <div class="d-flex justify-content-center p-2">

                            <input type="submit" name="Cadastrar" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Terceiro" ? 'Cadastrar' : 'Editar') ?>">

                        </div>
                    </div>

            </form>

        </div>
    </div>
</div>