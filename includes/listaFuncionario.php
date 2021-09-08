<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($objfuncionario as $objfuncionario) {
        $resultados .= '<tr>
                            <td>' . $objFuncionario->idFuncionario . '</td>
                            <td>' . $objFuncionario->nome . '</td>
                            <td>' . $objFuncionario->dtNasc . '</td>
                            <td>' . $objFuncionario->sexo . '</td>
                            <td>' . $objFuncionario->telefone . '</td>
                            <td>' . $objFuncionario->email . '</td>
                            <td>' . $objFuncionario->perfil . '</td>
                            <td>' . $objFuncionario->login . '</td>
                            <td>' . $objFuncionario->senha . '</td>
                            <td>' . $objFuncionario->statusFuncionario . '</td>
                            <td>
                            <a href = editar.php?id=' . $objFuncionario ->idFuncionario . '>
                            <button class = "btn btn-primary">Editar</button>
                            </a>
                            <a href = ?id=' . $objFuncionario->idFuncionario . '>
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
                    <th>ID Funcionário</th>
                    <th>Nome Completo</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th>Status Funcionário</th>
                    <th></th>
                </tr>

            </thead>
            <tbody>
                <?=$resultados?>

            </tbody>

        </table>



    </section>
</main>