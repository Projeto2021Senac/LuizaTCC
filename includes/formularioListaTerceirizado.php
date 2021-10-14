<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>
        <a href="cadastrarFuncionario.php">
            <button class="btn btn-success mt-4">Cadastrar</button>
        </a>
    </section>
    <?php
    $resultados = '';
                foreach ($objTerceirizado as $objTerceirizado) {
                    $resultados .= '<tr>
                            <td>' . $objTerceirizado->idFuncionario . '</td>
                            <td>' . $objTerceirizado->nomeFuncionario . '</td>
                                                        <td>
                            <a href = editaFuncionario.php?id=' . $objTerceirizado->iTerceirizado . '>
                            <button type="button" class="btn btn-info">Editar</button>
                            </a>
                            </td>
                            </tr>';
                }
                $resultados = strlen($resultados) ? $resultados :
                    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhum Terceirizado foi encontrada no histórico</td>'
    . '</tr>';


    ?>
    <section>

        <table class="table bg-light mt-3">
            <thead class="bg-dark text-light">
                <tr>
                    <th>Número do ID</th>
                    <th>Nome Completo</th>
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