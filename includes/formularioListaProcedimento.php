<div class="container-fluid" style=" height:793px;background-repeat: no-repeat; background-size: 100%">
  <main>
    <section class="d-flex justify-content-center mt-2">
      <div class="col-4">
        <div class="bg-dark rounded p-2">
          <h5 style="color: white; text-align: center ">Procedimentos</h5>
          <form method="post" action="">
            <div class="col-10 form-group p-2" style="margin:auto">

              <input type="text" class="form-control p-1" name="busca" required="" value="<?= $busca ?>">
            </div>
            <input type="submit" name="pesquisarProcedimento" class="btn btn-success btInput p- d-flex " style="margin:auto" value="Pesquisar">

          </form>

        </div>
        <div class="row">
          <div class="col-6 p-2">
            <a href="listaProcedimento.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
          </div>
          <div class="col-6 p-2">
            <a href="cadastroProcedimento.php"> <input type="submit" value="Cadastrar Procedimento" class="btn btn-success w-100" /> </a>
          </div>
        </div>
      </div>

    </section>
    <?php
    $resultados = '';
    foreach ($objProcedimento as $objProcedimento) {
      $resultados .= '<tr>
                            <td>' . $objProcedimento->idProcedimento . '</td>
                            <td>' . $objProcedimento->nomeProcedimento . '</td>
                            <td>' . $objProcedimento->statusProcedimento . '</td>
                            <td>
                            
                          
                            <a href = editaProcedimento.php?id=' . $objProcedimento->idProcedimento . '>
                            <button type="button" class="btn btn-info">Editar</button>
                            </a>
                            </td>
                            </tr>';
    }
    $resultados = strlen($resultados) ? $resultados :
      '<tr>'
      . '<td colspan = "12" class = "text-center"> Nenhum Procedimento foi registrado por enquanto...</td>'
      . '</tr>';

    ?>
    <section>

      <table class="table bg-light mt-3">
        <thead class="bg-dark text-light">
          <tr>
            <th>Número do ID</th>
            <th>Nome do Procedimento</th>
            <th>Status do Procedimento</th>
            <th>Ações</th>
            <th></th>
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
              <a class="page-link" href="listaProcedimento.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?>" tabindex="-1">Anterior</a>
            </li>
            <?php
            for ($i = 1; $i <= $num_pagina; $i++) {
              $estilo = "";
              if ($pagina_atual == $i) {
                $estilo = "active";
              }
            ?>
              <li class="page-item <?= $estilo ?>"><a class="page-link" href="listaProcedimento.php?pagina=<?= $i; ?>"><?= $i; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
              <a class="page-link " href="listaProcedimento.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?>">Próximo</a>
            </li>
          </ul>
        </nav>
      </div>


    </section>
  </main>
</div>