<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>
        <a href="cadastroProcedimento.php">
                <button class="btn btn-success mt-4">Cadastrar</button>
            </a>
    </section>
    <?php
    $resultados = '';
    foreach ($objProcedimento as $objProcedimento) {
        $resultados .= '<tr>
                            <td>' . $objProcedimento->idProcedimento. '</td>
                            <td>' . $objProcedimento->nomeProcedimento.'</td>
                            <td>' . $objProcedimento->statusProcedimento. '</td>
                            <td>
                            
                          
                            <a href = editaProcedimento.php?id=' . $objProcedimento->idProcedimento . '>
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
                    <th>Nome do Procedimento</th>
                    <th>Status do Procedimento</th>
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