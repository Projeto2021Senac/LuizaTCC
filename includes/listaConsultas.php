<div class="container-fluid" style=" height:793px;background-repeat: no-repeat; background-size: 100%">
  <main>
    <section class="d-flex justify-content-center mt-2">
      <div class="col-4">
        <div class="bg-dark rounded p-2">
          <h5 style="color: white; text-align: center ">Consultas</h5>
          <form method="post" action="">
            <div class="col-10 form-group p-2" style="margin:auto">

              <input type="text" class="form-control p-1" name="busca" id = "busca" required="" value="<?= $busca ?>">
            </div>
            <input type="submit" name="pesquisarProtese" class="btn btn-success btInput p- d-flex " style="margin:auto" value="Pesquisar">

          </form>

        </div>
        <div class="row">
          <div class="col-6 p-2">
            <a href="pesquisarConsulta.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
          </div>
          <div class="col-6 p-2">
            <a href="CadastrarConsulta.php"> <input type="submit" value="Cadastrar Consulta" class="btn btn-success w-100" /> </a>
          </div>
        </div>
      </div>

    </section>
    <section>

      <table class="table bg-light table-striped table-hover mt-1">
        <thead class="bg-dark text-light">
          <tr class="text-center">
            <th>ID</th>
            <th>data</th>
            <th>hora</th>
            <th>status</th>
            <th>Paciente atendido</th>
            <th>Ações</th>



          </tr>

        </thead>
        <tbody>
          <?= $resultados ?>

        </tbody>

      </table>
      <div class="d-flex justify-content-center">
        <nav class="" aria-label="...">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="pesquisarConsulta.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?>" tabindex="-1">Anterior</a>
            </li>
            <?php
            for ($i = 1; $i <= $num_pagina; $i++) {
              $estilo = "";
              if ($pagina_atual == $i) {
                $estilo = "active";
              }
            ?>
              <li class="page-item <?= $estilo ?>"><a class="page-link" href="pesquisarConsulta.php?pagina=<?= $i; ?>"><?= $i; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
              <a class="page-link" href="pesquisarConsulta.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?>">Próximo</a>
            </li>
          </ul>
        </nav>
      </div>

    </section>

  </main>
</div>