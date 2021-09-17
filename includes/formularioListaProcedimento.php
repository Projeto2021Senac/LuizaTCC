<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($objProcedimento as $objProcedimento) {
        $resultados .= '<tr>
                            <td>' . $objProcedimento->idProcedimento . '</td>
                            <td>' . $objProcedimento->nome . '</td>
                            <a href = editaFuncionario.php?id=' . $objProcedimento->idProcedimento . '>
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
                    <th>Nome do Procedimento </th>
                </tr>

            </thead>
            <tbody>
                <?= $resultados ?>

            </tbody>

        </table>



    </section>
</main>