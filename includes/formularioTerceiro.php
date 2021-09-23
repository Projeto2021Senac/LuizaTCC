
 <div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
 <main>

<section>
    <a href="index.php">
        <button class="btn btn-success mt-4">Menu</button>
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

     
        <form method="post" style="color: white" >
            <!-- <h3>Cadastro Terceiro</h3>-->
            <div class="form-group">
                <label>Número do ID Terceiro:</label>
                <input type="text" placeholder="000" class="form-control" name="idTerceiro"  
                       value=" <?=$objTerceiro->idTerceiro ?>">
            </div>

            <div class="form-group">
                <label>Nome: </label>
                <input type="text"  class="form-control" name="nomeTerceiro"   placeholder="Terceiro "required="" value="<?=$objTerceiro->nomeTerceiro?>">
            </div>
            
            <div class="form-group">
                <label >Celular:</label>
                <input type="tel" class="form-control" name="telefone" placeholder="+55(DD)00000-0000"required=""
                       value="<?=$objTerceiro->telefone?>">
            </div>
            <div class="form-group">
            <label>Status do Terceiro: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="statusTerceiro"  value="Ativo" checked="">
                    <label class="form-check-label" >
                       Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="statusTerceiro"  value="Inativo"<?=$objTerceiro->statusTerceiro== 'Inativo' ? 'checked': ''?> >
                    <label class="form-check-label" >
                      Inativo
                    </label>
                </div>
            </div>
            
         </div>
             <div>
            <div class="row">
            <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                <br>
                <input type="submit"  name="<?=BTN ?>"
                       class="btn btn-success btInput p-1 offset-5" value="Salvar"
                       <?php //if ($btEnviar == TRUE) echo "disabled"; ?>>
                <br>
                <br>
            </div>
            </form>
        </div>
    </div>
</div>
</div>