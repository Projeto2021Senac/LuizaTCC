<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
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
                            <td>' . date('d/m/Y',strtotime($consulta->dataConsulta)) . '</td>
                            <td>' . date(' H:i',strtotime($consulta->horaConsulta)) . '</td>
                            <td>' . $consulta->statusConsulta . '</td>
                            <td>' . $consulta->nome . '</td>
                            <td>
                            <a href = editaConsulta.php?id=' . $consulta->idConsulta . '>
                            <button class = "btn btn-primary">Abrir Consulta</button>
                            </a>
                            <a href = editaConsulta.php?id=' . $consulta->idConsulta . '>
                            <button class = "btn btn-danger">Corrigir</button>
                            </a>
                            </td>
                            </tr>';
        }


        ?>
        <section>

            <table class="table bg-light mt-3">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>ID</th>
                        <th>data</th>
                        <th>hora</th>
                        <th>status</th>
                        <th>Paciente atendido</th>
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
</div>