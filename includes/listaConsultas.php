<div class="container-fluid" style=" height:793px;background-repeat: no-repeat; background-size: 100%">
  <main>
    <section>
      <a href="index.php">
        <button class="btn btn-success mt-4">Retornar</button>
      </a>
      <a href="cadastrarConsulta.php">
        <button class="btn btn-success mt-4">Cadastrar</button>
      </a>

    </section>

    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }
    if (isset($_GET['rastreio']) == "check") {
      $disabledRastreio = 'class = "btn btn-secondary"';
      $disabled2 = 'ok';
      $disabled1 = 'hidden=""';
    } else {
      $disabledRastreio = 'hidden=""';
      $disabled2 = '';
      $disabled1 = '';
    }
    $resultados = '';
    foreach ($consultas as $consulta) {
      $disabled = ($consulta->statusConsulta == 'Finalizada' ? 'class = "btn btn-secondary" disabled = disabled' : 'class = "btn btn-danger"');
      $disabled = ($disabled2 == 'ok' ? 'hidden=""' : $disabled);

      $resultados .= '<tr ">
                            <td>' . $consulta->idConsulta . '</td>
                            <td>' . date('d/m/Y', strtotime($consulta->dataConsulta)) . '</td>
                            <td>' . date(' H:i', strtotime($consulta->horaConsulta)) . '</td>
                            <td>' . $consulta->statusConsulta . '</td>
                            <td>' . $consulta->nomePaciente . '</td>
                            <td>
                            <a ' . $disabled1 . 'class = "btn btn-primary" href = Consulta.php?id=' . $consulta->idConsulta . '>Abrir Consulta</a>
                            <a ' . $disabled . 'href = editaConsulta.php?id=' . $consulta->idConsulta . '>Corrigir</a>
                            <a ' . $disabledRastreio . 'href = cadRastreio.php?rConsulta=' . $consulta->idConsulta . '>Confirmar rastreio</a>
                            </td>
                            </tr>';
    }
    $resultados = strlen($resultados) ? $resultados :
      '<tr>'
      . '<td colspan = "6" class = "text-center"> Nenhuma Consulta foi encontrada no histórico</td>'
      . '</tr>';

    


    ?>


    <section>

      <table class="table bg-light bg-gradient mt-3">
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