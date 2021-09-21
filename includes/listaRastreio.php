

<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <?php
    $resultados = '';
    foreach ($rastreios as $rastreio) {
        $resultados .= '<tr>
                            <td>' . $rastreio->idRastreio . '</td>
                            <td>' . $rastreio->dtEntrega . '</td>
                            <td>' . $rastreio->dtRetorno . '</td>
                            <td>' . $rastreio->obs . '</td>
                            <td>' . $rastreio->vlrCobrado . '</td>
                            <td>' . $rastreio->TFKConsulta . '</td>
                            <td>' . $rastreio->TFKProcedimento . '</td>
                            <td>' . $rastreio->RFKTerceiro . '</td>
                            <td>' . $rastreio->RFKServico . '</td>
                            
                            <td>
                            <a href = editaRastreio.php?id=' . $rastreio->idRastreio . '>
                            <button class = "btn btn-primary">Editar</button>
                            </a>
                            <a href = ?id=' . $rastreio->idRastreio . '>
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
                    <th>dt Entrega</th>
                    <th>dt Retorno</th>
                    <th>obs</th>
                    <th>valor</th>
                    <th>Consulta</th>
                    <th>Procedimento</th>
                    <th>Terceirizado</th>
                    <th>Serviço</th>
                    <th></th>


                </tr>

            </thead>
            <tbody>
                <?=$resultados?>

            </tbody>

        </table>



    </section>
</main>
