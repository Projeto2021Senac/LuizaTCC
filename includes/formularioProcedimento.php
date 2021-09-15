<div class = "container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
</main>

<div class="row">
    <div>
        <div class="row">

            <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 90%">
                <h3 style="color: white; text-align: center"><?=TITLE?></h3>
            </div>
        </div>
    </div>
    <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 80%">
  
        <form method="post" action="" style="color: white" >
            <!-- <h3>Cadastrar Procedimentos </h3>-->
                 <div class="form-group">
                    <label>Número do ID:</label>
                        <input type="text" class="form-control" name="idProcedimento" placeholder="00000"
                         value=" <?=$objProcedimento->idProcedimento?>">
                 </div>
            
            <div class="form-group">
                <label>Nome do Procedimento: </label>
                <input type="text"  class="form-control" name="nome" placeholder="Procedimento" value="<?=$objProcedimento->nome?>">
            </div>
        
        
            <div>
                <div class="row">
                    <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                        <br>
                          <input type="submit"  name="<?=BTN ?>"
                          class="btn btn-success btInput p-1 offset-5" value="Cadastrar"
                          <?php //if ($btEnviar == TRUE) echo "disabled"; ?>>
                        <br>
                        <br>
                     </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>