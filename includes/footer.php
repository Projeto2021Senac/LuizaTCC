<script src="js/JQuery2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="bootstrap-select-1.14-dev/js/bootstrap-select.js"></script>

<!-- <script src="js/JQuery.min.js"></script> -->

<script>
    $(function () {
        $("#busca").autocomplete({
            source:'autoComplete.php?teste=<?=IDENTIFICACAO;?>'
        });
    });

</script>
<script type="text/javascript">
    function habilitar() {
        if (document.getElementById('denteOuro').checked) {
            document.getElementById('qtdOuro').removeAttribute("disabled");
        } else {
            document.getElementById('qtdOuro').value = "";
            document.getElementById('qtdOuro').setAttribute("disabled", "disabled");
        }
    }
</script>
<script type="text/javascript" charset="utf-8">
        /* Funcionando
         $(function() {
            $('#id_terceiro').change(function() {
                if ($(this).val()) {
                    $('#servico_terceiro').hide();
                    $('#mensagem').html('<span>Aguarde, carregando...</span>')
                    $.getJSON('ajaxTeste.php?search=', {
                        id_terceiro: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = "<option value=''>Escolher Servico</option>";
                        var optionsV = "";
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nomeServico + '</option>';
                        }
                        $('#servico_terceiro').html(options).show();
                        $('#servico_terceiroForm').html(optionsV).show();
                        $('.cliqueAqui').hide();
                    });
                }
            });
        }) */

        function FuncaoMaior(valor) {
            var valorAjax = valor;
            $('#servico_terceiro').html('<option value = 0>Aguardando...</option');
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: 'ajaxTeste.php?id_terceiro=' + valorAjax,
                success: function(dados) {
                    if (dados != null) {
                        var options = "<option value=''>Escolher Servico</option>";
                        for (var i = 0; i < dados.length; i++) {
                            options += '<option value="' + dados[i].id + '">' + dados[i].nomeServico + '</option>';
                        }
                        if (valorAjax != 0) {
                            $('#servico_terceiro').html(options).show();
                        }
                    }
                }
            })
        }
    </script>
</body>

</html>
