<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <?php

use Classes\Dao\db;

$resultados = '';
    foreach ($consultas as $consulta) {

        $resultados .= '<tr>
                            <td>' . $consulta->idConsulta . '</td>
                            <td>' . $consulta->dataConsulta . '</td>
                            <td>' . $consulta->horaConsulta . '</td>
                            <td>' . $consulta->statusConsulta . '</td>
                            <td>
                            <a href = editar.php?id=' . $consulta->idConsulta . '>
                            <button class = "btn btn-primary">Editar</button>
                            </a>
                            <a href = acessar.php?id=' . $consulta->idConsulta . '>
                            <button class = "btn btn-primary">Acessar</button>
                            </a>
                            <a href = status.php?id=' . $consulta->idConsulta . '>
                            <button class = "btn btn-primary">Status</button>
                            </a>
                            <a href = ?id=' . $consulta->idConsulta . '>
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
                    <th>data</th>
                    <th>hora</th>
                    <th>status</th>
                    <th>ações</th>

                    <th></th>


                </tr>

            </thead>
            <tbody>
                <?=$resultados?>

            </tbody>

        </table>



    </section>
</main>