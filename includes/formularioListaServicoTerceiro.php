<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($objServicoTerceiro as $objServicoTerceiro) {
        $resultados .= '<tr>
                            <td>' . $objServicoTerceiro->idServico . '</td>
                            <td>' . $objServicoTerceiro->nomeServico . '</td>
                            <td>' . $objServicoTerceiro->descricao . '</td>
                            <td>' .$objServicoTerceiro->statusServicoTerceiro. '</td>

                            
                            <td>
                            <a href = editaServicoTerceiro.php?id=' . $objServicoTerceiro->idServico . '>
                            <button type="button" class="btn btn-info">Editar</button>
                            </a>
                            </td>
                            </tr>';
    }


    ?>
    <section>

        <table class="table bg-light mt-3">
            <thead class="bg-dark text-light">
                <tr>
                    <th>Número do ID</th>
                    <th>Nome Serviço Terceiro</th>
                    <th>Descrição</th>
                    <th>Status Serviço Terceiro</th>
                    <th>Ações</th>
                    <th></th>
                </tr>

            </thead>
            <tbody>
                <?= $resultados ?>

            </tbody>

        </table>



    </section>
</main>