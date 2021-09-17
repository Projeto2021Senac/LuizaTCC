
 <div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
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
            <!-- <h3>Cadastar Serviços</h3>-->
            <div class="form-group">
                <label>Número do ID Funcionário:</label>
                <input type="text" placeholder="000" class="form-control" name="idFuncionario"  
                       value=" <?=$objFuncionario->idFuncionario ?>">
            </div>
            

            <div class="form-group">
                <label>Nome: </label>
                <input type="text"  class="form-control" name="nome"   placeholder="Nome Completo"required="" value="<?=$objFuncionario->nome?>">
            </div>
            <div class="form-group">
                    <label>Data de Contrato:</label>
                    <input type="date" class="form-control" name="dtNasc" >
                </div>

            <div class="form-group">
                <label>Sexo: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" value="masculino" checked="">
                    <label class="form-check-label" for="exampleRadios1">
                        Masculino
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" value="feminino"<?=$objFuncionario->sexo == 'feminino' ? 'checked': ''?> >
                    <label class="form-check-label" for="exampleRadios2">
                        Feminino
                    </label>
                </div>
         
            </div>
            <div class="form-group">
                <label >Celular:</label>
                <input type="tel" class="form-control" name="telefone" placeholder="+55(DD)00000-0000"required=""
                       value="<?=$objFuncionario->telefone?>">
            </div>
            <div class="form-group">
                <label >E-mail:</label>
                <input type="tel" class="form-control" name="email" placeholder="email@gmail.com"required=""
                       value="<?=$objFuncionario->email?>">
            </div>
            <div class="form-group">
                <label>Perfil: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="perfil" id="" value="Funcionário" checked="">
                    <label class="form-check-label" for="exampleRadios3">
                       Funcionário
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="perfil"  value="Administrador"<?=$objFuncionario->perfil== 'Administrador' ? 'checked': ''?> >
                    <label class="form-check-label" >
                       Adminstrador
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label >Login:</label>
                <input type="tel" class="form-control" name="login" value="<?=$objFuncionario->login?>"placeholder="Fulano"required="">
            </div>
            <div class="form-group">
                <label >Senha:</label>
                <input type="password"class="form-control" name="senha" style="padding-center: 45px;"value="<?=$objFuncionario->senha?>"  placeholder="oooooo"required="">
                       
            </div>
            <div class="form-group">
            <label>Status Funcionário: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status"  value="Ativo" checked="">
                    <label class="form-check-label" >
                       Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status"  value="Inativo"<?=$objFuncionario->statusFuncionario== 'Inativo' ? 'checked': ''?> >
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
                       class="btn btn-success btInput p-1 offset-5" value="Cadastrar"
                       <?php //if ($btEnviar == TRUE) echo "disabled"; ?>>
                <br>
                <br>
            </div>
            </form>
        </div>
    </div>
</div>
</div>