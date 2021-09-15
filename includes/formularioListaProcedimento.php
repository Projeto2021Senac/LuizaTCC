<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($objFuncionario as $objFuncionario) {
        $resultados .= '<tr>
                            <td>' . $objFuncionario->idFuncionario . '</td>
                            <td>' . $objFuncionario->nome . '</td>
                            <td>' . $objFuncionario->dtNasc . '</td>
                            <td>' . $objFuncionario->sexo . '</td>
                            <td>' . $objFuncionario->telefone . '</td>
                            <td>' . $objFuncionario->email . '</td>
                            <td>' . $objFuncionario->perfil . '</td>
                            <td>' . $objFuncionario->login . '</td>
                          
                            <td>' . $objFuncionario->statusFuncionario . '</td>
                            <td>
                            <a href = editaFuncionario.php?id=' . $objFuncionario->idFuncionario . '>
                            <button type="button" class="btn btn-info">Editar</button>
                            </a>
                            <a href = ?id=' . $objFuncionario->idFuncionario . '>
                            <button type="button" class="btn btn-primary">Excluir</button>
                            </a>
                            <a href = ?id=' . $objFuncionario->idFuncionario . '>
                            <button type="button" class="btn btn-danger">Cancelar</button>
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
                    <th>Nome Completo</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th>Login</th>
                    <th>Status Funcionário</th>
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