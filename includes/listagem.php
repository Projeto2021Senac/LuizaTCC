<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($funcionario as $funcionario) {
        $resultados .= '<tr>
                            <td>' . $funcionario->idFuncionario . '</td>
                            <td>' . $funcionario->nome . '</td>
                            <td>' . $funcionario->telefone . '</td>
                            <td>' . $funcionario->email . '</td>
                            <td>' . $funcionario->perfil . '</td>
                            <td>' . $funcionario->login . '</td>
                            <td>' . $funcionario->ouro . '</td>
                            <td>' . $funcionario->senha . '</td>
                            <td>' . $funcionario->statusfuncionario . '</td>
                            <td>
                            <a href = editar.php?id=' . $funcionario ->idFuncionario . '>
                            <button class = "btn btn-primary">Editar</button>
                            </a>
                            <a href = ?id=' . $funcionario->idFuncionario . '>
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
                    <th>ID Funcionario:</th>
                    <th>Nome:</th>
                    <th>Sexo:</th>
                    <th>Sexo:</th>
                    <th>Telefone:</th>
                    <th>Email:</th>
                    <th>Perfil:</th>
                    <th>Login:</th>
                    <th>Senha:</th>
                    <th>Status Funcionário:</th>
                    <th></th>


                </tr>

            </thead>
            <tbody>
                <?=$resultados?>

            </tbody>

        </table>



    </section>
</main>