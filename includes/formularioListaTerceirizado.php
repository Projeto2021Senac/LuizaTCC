<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </section>
    <section class="d-flex justify-content-center mt-2">
        <div class="col-4">
            <div class="bg-dark rounded p-2">
                <h5 style="color: white; text-align: center ">Serviços prestados por terceiros</h5>
                <form method="post" action="">
                    <div class="col-10 form-group p-2" style="margin:auto">
                        <input hidden name="tabela" value="terceirizado"></input>
                        <input type="text" class="form-control p-1" id="busca" name="busca" required="" value="<?= $busca ?>">
                    </div>
                    <input type="submit" name="pesquisarTerceirizado" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

                </form>

            </div>
            <div class="row">
                <div class="col-6 p-2">
                    <a href="listaTerceirizado.php?pagina=1"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
                </div>
                <div class="col-6 p-2">
                    <a href="cadastroTerceirizado.php"> <input type="submit" value="Cadastrar Serviço prestado" class="btn btn-success w-100" /> </a>
                </div>
            </div>
        </div>

    </section>
    <div class="container-fluid">

        <div class="row">

            <div class="col-8 offset-2 mt-2">

                <table class="table bg-light table-striped table-hover mt-1 table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th>Terceiro</th>
                            <th>Servico</th>
                            <th>Ação</th>
                        </tr>

                    </thead>


                    <tbody>
                        <?= $resultados ?>


                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    <nav class="" aria-label="...">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="listaDentista.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?>" tabindex="-1">Anterior</a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $num_pagina; $i++) {
                                $estilo = "";
                                if ($pagina_atual == $i) {
                                    $estilo = "active";
                                }
                            ?>
                                <li class="page-item <?= $estilo ?>"><a class="page-link" href="listaDentista.php?pagina=<?= $i; ?>"><?= $i; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="listaDentista.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?>">Próximo</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>


        </div>

    </div>
</main>