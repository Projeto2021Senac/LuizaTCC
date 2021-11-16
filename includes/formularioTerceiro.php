
 <div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
 <main>

<section>
    <a href="index.php">
        <button class="btn btn-success mt-4">Menu</button>
    </a>

</section>

</main>
<div class="col-4 mt-4 offset-4">
        <div class="p-3 bg-dark">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <form class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">
                    <div class="form-group">
                        <label>Nome do Procedimento: </label>
                        <input type="text" class="form-control" name="nomeProcedimento" placeholder="Procedimento" value="<?= $objProcedimento->nomeProcedimento ?>">
                    </div>
                    <div class="form-group">
                        <label>Status do Procedimento: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusProcedimento" value="Ativo" checked="">
                            <label class="form-check-label">
                                Ativo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusProcedimento" value="Inativo" <?= $objProcedimento->statusProcedimento == 'Inativo' ? 'checked' : '' ?>>
                            <label class="form-check-label">
                                Inativo
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center p-2">

                        <input type="submit" name="<?= TITLE ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Nova Consulta" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                                                            ?>>

                    </div>
                </div>

            </form>

        </div>
    </div>

    </div>
</div>
</div>