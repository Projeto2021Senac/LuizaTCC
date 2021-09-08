<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($consultas as $consulta) {
        $resultados .= '<tr>
                            <td>' . $consulta->idConsulta . '</td>
                            <td>' . $consulta->dataConsulta . '</td>
                            <td>' . $consulta->horaConsulta . '</td>
                            <td>' . $consulta->statusConsulta . '</td>
                            <td>' . $consulta. '</td>
                            <td>' . $consulta->qtdDente . '</td>
                            <td>' . $consulta . '</td>
                            <td>' . $consulta->qtdOuro . '</td>
                            <td>' . date('d/m/Y à\s H:i:s', strtotime($protese->dataRegistro)) . '</td>
                            <td>
                            <a href = editar.php?id=' . $protese->id . '>
                            <button class = "btn btn-primary">Editar</button>
                            </a>
                            <a href = ?id=' . $protese->id . '>
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