
<div class="container-fluid">
    <section class="d-flex justify-content-center mt-2">
      <div class="col-4">
        <div class="bg-dark rounded p-2">
          <h5 style="color: white; text-align: center ">Clinicas</h5>
          <form method="post" action="">
            <div class="col-10 form-group p-2" style="margin:auto">

              <input type="text" class="form-control p-1" name="busca" id = "busca" required="" value="<?= $busca ?>">
            </div>
            <input type="submit" name="listaClinica" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

          </form>

        </div>
        <div class="row">
          <div class="col-6 p-2">
            <a href="listaClinica.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
          </div>
          <div class="col-6 p-2">
            <a href="listaClinica.php"> <input type="submit" value="Cadastrar Clinica" class="btn btn-success w-100" /> </a>
          </div>
        </div>
      </div>

    </section>
    <br>
</div>


<div class="container-fluid">

    <div class="row">

        <div class="col-8 offset-2 mt-2">

            <table class="table table-responsive bg-light bg-gradient">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>

                </thead>


                <tbody>
                    <?= $resultados ?>

                </tbody>

            </table>
        </div>


    </div>

</div>