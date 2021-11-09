function getServicoTerceiro(valor) {
    var valorAjax = valor;
    $('#servico_terceiro').html('<option value = 0>Aguardando...</option');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'TerceiroServico.php?id_terceiro=' + valorAjax,
        success: function(dados) {
            if (dados != null) {
                var options = "<option value='' >Escolher Servico</option>";
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
function getHorarios(valor) {
    var valorAjax = valor;
    $('#horarios').html('<option value = 0>Aguardando...</option');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'horarios.php?data=' + valorAjax,
        success: function(dados) {
            if (dados != null) {
                var options = "<option value='' >Escolher Servico</option>";
                for (var i = 0; i < dados.length; i++) {
                    options += '<option>' + dados[i].horario + '</option>';
                }
                if (valorAjax != 0) {
                    $('#servico_terceiro').html(options).show();
                }
            }
        }
    })
}
/* $(function(){
    let = identificacao = document.querySelector("#identificacao").value;
    console.log(identificacao);
    $("#busca").autocomplete({
        source:"autoComplete.php?teste=" + identificacao 
    });
}); */