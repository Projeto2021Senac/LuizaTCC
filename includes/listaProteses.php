<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>
        <a href="cadastrarProtese.php">
            <button class="btn btn-success mt-4">Cadastrar</button>
        </a>
    </section>
    <?php
    $resultados = '';
    foreach ($proteses as $protese) {
        $resultados .= '<tr>
                            <td>' . $protese->idProtese . '</td>
                            <td>' . $protese->tipo . '</td>
                            <td>' . $protese->material . '</td>
                            <td>' . $protese->extensao . '</td>
                            <td>' . $protese->dente . '</td>
                            <td>' . $protese->qtdDente . '</td>
                            <td>' . ($protese->ouro == 'sim' ? 'Sim' : 'Não') . '</td>
                            <td>' . $protese->qtdOuro . '</td>
                            <td>' . date('d/m/Y à\s H:i:s', strtotime($protese->dataRegistro)) . '</td>
                            <td>
                            <a href = editaProtese.php?id=' . $protese->idProtese . '>
                            <button class = "btn btn-primary">Editar</button>
                            </a>
                            <a href = ?id=' . $protese->idProtese . '>
                            <button class = "btn btn-primary">Excluir</button>
                            </a>
                            </td>
                            </tr>';
    }


    ?>
    <section>

        <table class="table bg-light mt-3">
            <thead class = "bg-dark text-light">
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Material</th>
                    <th>Extensão</th>
                    <th>Dente</th>
                    <th>qtdDentes</th>
                    <th>Ouro</th>
                    <th>qtdOuro</th>
                    <th>Data Registro</th>
                    <th></th>


                </tr>

            </thead>
            <tbody>
                <?=$resultados?>

            </tbody>

        </table>



    </section>
</main>