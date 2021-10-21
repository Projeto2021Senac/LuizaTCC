<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($objTerceiro as $objTerceiro) {
        $resultados .= '<tr>
                            <td>' . $objTerceiro->idTerceiro . '</td>
                            <td>' . $objTerceiro->nomeTerceiro . '</td>
                            <td>' . $objTerceiro->telefone . '</td>
                            <td>' .$objTerceiro->statusTerceiro. '</td>

                            
                            <td>
                            <a href = editaTerceiro.php?id=' . $objTerceiro->idTerceiro . '>
                            <button type="button" class="btn btn-info">Editar</button>
                            </a>
                            </td>
                            </tr>';
    }
    $resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhum Terceiro foi registrado por enquanto...</td>'
    . '</tr>';


    ?>
    <section>

        <table class="table bg-light mt-3">
            <thead class="bg-dark text-light">
                <tr>
                    <th>Número do ID Terceiro</th>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Status do Terceiro</th>
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