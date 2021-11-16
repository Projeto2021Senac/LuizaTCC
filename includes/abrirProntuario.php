
<div class="container-fluid mt-2">
    <div class="row">
        <div class="row-cols-auto">
            <div class=" bg-gradient rounded-3" style=" background-color: black;opacity:100%">
                <h3 style="color: white; text-align: center">PRONTUÁRIO</h3>

                <div class="row">

                    <div class="col-2">
                        <div class="row">
                            <div class=" bg-gradient rounded-3" style=" background-color: black;opacity:100%">
                                <h3 style="color: white; text-align: center">Evolução</h3>
                            </div>
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

                            <!--
                            <ul class="dropdown-menu col-2 text-center " aria-labelledby="navbarDropdownConsulta">
                                
                                <li><button class="dropdown-item"  onclick="Consultas_Abertas()">Abertas</button></li>
                                <li><button class="dropdown-item" >Finalizadas</button></li>
                            </ul>-->
                        </div>


                        <div id="passar_mouse">
                            <a class="nav-link" href="#" id="navbarDropdownTrat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <h5 style="color: white; text-align: center">Tratamentos</h5>
                            </a>

                            <ul class="dropdown-menu col-2 text-center" aria-labelledby="navbarDropdownTrat">
                                <li><button class="dropdown-item" >Abertos</button></li>
                                <li><button class="dropdown-item" >Finalizados</button></li>
                            </ul>
                        </div>


                    </div>


                    <div class="col-10">
                        <div class="container-fluid mb-3">
                            <div class="row-cols-auto bg-gradient"  style=" background-color: whitesmoke;opacity: 100%">


                                <div >
                                    <table class="table table-hover bg-white" id="apresenta_Consultas">
                                        <thead>

                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    
                                </div>


                                <div  id="apresenta_DadosCadastrais" style="margin: 10px">



                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>






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

