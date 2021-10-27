<?php
require __DIR__ . '/vendor/autoload.php';




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProntuario.php';
include __DIR__ . '/includes/footer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script type="text/javascript" charset="utf-8">
        //Essa função chamas as variáveis do HTML do Form e logo trabalha para poder juntar os selects
        //o script manda para o outro arquivo que retorna um valor desejado para o front-end
        //selects com interação.
        //Esolher Serviços --> Function --> id($result_post, $row_post) --> agendamentoFormularioSub.php -->
        // $funcionario_post[] = array --> nome(NomeFuncionario) --> select(Escolha Funcionario-->Nome do Funcionario);
        $(function() {
            $('#id_servicos').change(function() {
                if ($(this).val()) {
                    $('#id_funcionarios').hide();
                    $('.cliqueAqui').show();

                    $.getJSON('agendamentoFormularioSub.php?search=', {
                        id_servicos: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = "<option value=''>Escolher Funcionario</option>";
                        var optionsV = "";
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
                            optionsV += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
                        }

                        $('#id_funcionarios').html(options).show();
                        $('#id_funcionariosForm').html(optionsV).show();
                        $('.cliqueAqui').hide();

                    });

                    $.getJSON('agendamentoFormularioValorServico.php?search=', {
                        id_servicos: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var optionsV = '';
                        var optionsV2 = '';
                        var optionsV3 = '';
                        for (var i = 0; i < j.length; i++) {
                            optionsV += '<option value="' + j[i].valor + '">R$ ' + j[i].valor + ',00</option>';
                            optionsV2 += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
                            optionsV3 += '<option value="' + j[i].tempo_estimado + '">' + j[i].tempo_estimado + '</option>';
                        }
                        $('#valorServico').html(optionsV).show();
                        $('#tempoServicoForm').html(optionsV3 + " min");
                        $('#nomeServico').html(optionsV2).show();
                    });

                    $.getJSON('agendamentoFormularioServico2.php?search=', {
                        id_servicos: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = '<option value="">Escolher serviço</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].idServicos + '">' + j[i].nome + '</option>';

                        }
                        $('#id_servicos2').html(options).show();

                    });
                } else {
                    $('#id_funcionarios').html('<option value="">– Escolher Funcionario –</option>');
                }
            });
        });

        //https://desarrolloweb.com/articulos/codificar-decodificar-cadenas-utf8-javascript.html
        $(function() {
            $('#id_servicos2').change(function() {
                if ($(this).val()) {
                    $('#id_funcionarios2').hide();
                    $('#valorServico2').hide();
                    $('.cliqueAqui2').show();

                    $.getJSON('agendamentoFormularioSub2.php?search=', {
                        id_servicos2: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = "<option value=''>Escolher Funcionario</option>";
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
                        }
                        $('#id_funcionarios2').html(options).show();
                        $('.cliqueAqui2').hide();

                    });

                    $.getJSON('agendamentoFormularioValorServico2.php?search=', {
                        id_servicos2: $(this).val(),
                        ajax: 'true'
                    }, function(h) {
                        var optionsV = '';
                        var optionsV2 = '';
                        var optionsV3 = '';
                        for (var i = 0; i < h.length; i++) {
                            optionsV += '<option value="' + h[i].valor + '">R$ ' + h[i].valor + ',00</option>';
                            optionsV2 += '<option value="' + h[i].nome + '">' + h[i].nome + '</option>';
                            optionsV3 += '<option value="' + h[i].tempo_estimado + '">Tempo: ' + h[i].tempo_estimado + '</option>';
                        }
                        $('#valorServico2').html(optionsV).show();
                        let dao2 = $('#tempoServicoForm2').html(optionsV3).show();
                        $('#nomeServico2').html(optionsV2).show();

                    });

                    let dao1 = document.getElementById('valorServico');
                    alert(dao1 + " famoso " + dao2);

                } else {
                    $('#id_funcionarios2').html('<option value="">– Escolher Funcionario –</option>');
                }
            });
        });

        $(function() {
            $('#id_funcionarios').change(function() {
                if ($(this).val()) {
                    $('#id_funcionarios').hide();

                    $.getJSON('agendamentoFormularioFuncionario.php?search=', {
                        id_funcionarios: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = "";
                        var optionsV = '<option value="">Escolher Serviço</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
                            optionsV += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
                        }

                        $('#nomeFuncionario').html(options).show();
                        //$('#id_funcionarios').html(optionsV).show();
                        //location.reload();
                    });



                } else {
                    $('#id_funcionarios').html('<option value="">– Escolher Funcionario –</option>');
                }
            });

            $('#id_funcionarios2').change(function() {
                if ($(this).val()) {
                    $('#id_funcionarios2').hide();

                    $.getJSON('agendamentoFormularioFuncionario.php?search=', {
                        id_funcionarios: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = "";
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
                        }

                        $('#nomeFuncionario2').html(options);
                        //$('#id_funcionarios2').html(options).show();
                    });

                } else {
                    $('#id_funcionarios2').html('<option value="">– Escolher Funcionario –</option>');
                }
            });
        });
    </script>
</body>

</html>