

<div class="container-fluid mt-2">
    <div class="row">
        <div class="row-cols-auto">
            <div class=" bg-gradient rounded-3" style=" background-color: black;opacity:100%">
               <!-- <h3 style="color: white; text-align: center">PRONTUÁRIO</h3>-->

                <div class="row">

                    <div class="col-2 container-fluid mt-3">
                        
                            <div class=" bg-gradient rounded-5 ms-4 p-2 container-fluid" style=" background-color: black; opacity:100%">
                                <h4 style="color: white; text-align: center">PRONTUÁRIO</h4>
                            </div>
                        

                        <input  hidden="" value="<?= $paciente ?>" id="aux"> <!--input usado para pegar o prontuario.-->
                        <div id="passar_mouse">
                            <a class="nav-link"  role="button" onclick="Dados_Cadastrais()">
                                <h5 style="color: white; text-align: center">Dados Cadastrais</h5>
                            </a>
                        </div>


                        <div id="passar_mouse">
                            <a class="nav-link"  role="button" onclick="Consultas()">
                                <h5 style="color: white; text-align: center">Consultas</h5>
                            </a>

                        </div>


                        <div id="passar_mouse">
                            <a class="nav-link" role="button" onclick="Tratamentos()">
                                <h5 style="color: white; text-align: center">Tratamentos</h5>
                            </a>

                            <!--<ul class="dropdown-menu col-2 text-center" aria-labelledby="navbarDropdownTrat">
                                <li><button class="dropdown-item" >Abertos</button></li>
                                <li><button class="dropdown-item" >Finalizados</button></li>
                            </ul>-->
                        </div>


                    </div>


                    <div class="col-10">
                        <div class="container-fluid mb-3 mt-3">
                            <div class="row-cols-auto bg-gradient"  style=" background-color: whitesmoke;opacity: 100%">

                                <div class="container-fluid mb-2" id="apresenta_DadosCadastrais" style="margin-left: 10px">  </div>
                                
                                <div class="container-fluid">
                                    <table class="table table-hover bg-white" id="apresenta_Consultas">
                                        <thead>

                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    
                                </div>
                                
                                <div class="container-fluid">
                                    <table class="table table-hover bg-white" id="apresenta_Tratamentos">
                                        <thead>

                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    
                                </div>


                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="js/JQuery2.min.js"></script>
<script>
    $( document ).ready(function() {
    loadDados();
});
</script>



<!--

 <div class="form-group offset-9">
                                    <img src="./includes/img/usuario.png" alt="" width="200" height="100">

                                </div>
                                <div class="form-group">
                                    <label><b>Nº Prontuário:</b> <b style="color: yellow"><?= $detalhaRastreio->idRastreio ?></b></label>

                                </div>

                                <div class="form-group">
                                    <label><b>Paciente:</b> <b style="color: yellow"><?= $detalhaRastreio->idRastreio ?></b></label>

                                </div>

                                <div class="form-group">
                                    <label><b>Sexo:</b> <b style="color: yellow"><?= $detalhaRastreio->idRastreio ?></b></label>

                                </div>

                                <div class="form-group">
                                    <label><b>Telefone:</b> <b style="color: yellow"><?= $detalhaRastreio->idRastreio ?></b></label>

                                </div>

                                <div class="form-group">
                                    <label><b>E-mail:</b> <b style="color: yellow"><?= $detalhaRastreio->idRastreio ?></b></label>

                                </div>
-->

