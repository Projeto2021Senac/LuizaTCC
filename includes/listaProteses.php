<main>
    <section class="p-2">
        <div class = "col-4 offset-4">
            <div class="bg-dark rounded p-2">
                <h5 style="color: white; text-align: center ">Proteses</h5>
                <form method="post" action="">
                    <div class="col-10 form-group p-2" style="margin:auto">

                        <input type="text" class="form-control p-1" name="busca" required="" value="<?= $busca ?>">
                    </div>
                    <input type="submit" name="pesquisarProtese" class="btn btn-success btInput p- d-flex " style="margin:auto" value="Pesquisar">

                </form>
                
            </div>
            <div class = "col-6 offset-3 p-2">
            <a href="pesquisarProtese.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
        </div>
            
        </div>
        
    </section>

    <table class="table table-striped table-hover table-dark table-responsive bg-light mt-1 table-bordered">
        <thead class="bg-dark text-light">
            <tr class = "text-center">

                <th scope="col">ID</th>
                <th scope="col">Paciente</th>
                <th scope="col">Tipo</th>
                <th scope="col">Extensão</th>
                <th scope="col">Marca</th>
                <th scope="col">qtdDentes</th>
                <th scope="col">Ouro</th>
                <th scope="col">qtdOuro</th>
                <th scope="col">Data Registro</th>
                <th scope="col">Ações</th>



            </tr>

        </thead>
        <tbody>
            <?= $resultados ?>

        </tbody>

    </table>

</main>