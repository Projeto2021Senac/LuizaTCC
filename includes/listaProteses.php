<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>
    </section>
    <?php
    $resultados = '';
    foreach ($proteses as $protese) {
        $resultados .= '<tr>
                            <td>' . $protese->idProtese . '</td>
                            <td>' . $protese->nomePaciente . '</td>
                            <td>' . $protese->tipo . '</td>
                            <td>' . $protese->extensao . '</td>
                            <td>' . $protese->marcaDente . '</td>
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
    $resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhuma Prótese foi encontrada no histórico</td>'
    . '</tr>';


    ?>
    <section>

        <table class="table bg-light mt-3">
            <thead class = "bg-dark text-light">
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Tipo</th>
                    <th>Extensão</th>
                    <th>Marca</th>
                    <th>qtdDentes</th>
                    <th>Ouro</th>
                    <th>qtdOuro</th>
                    <th>Data Registro</th>
                    <th>Ações</th>
                    <th></th>


                </tr>

            </thead>
            <tbody>
                <?=$resultados?>

            </tbody>

        </table>



    </section>
</main>