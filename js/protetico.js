function getServicoTerceiro(valor) {
  var valorAjax = valor;
  $("#servico_terceiro").html("<option value = 0>Aguardando...</option");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "TerceiroServico.php?id_terceiro=" + valorAjax,
    success: function (dados) {
      if (dados != null) {
        var options = "<option value='' hidden>Escolher Servico</option>";
        for (var i = 0; i < dados.length; i++) {
          options +=
            '<option value="' +
            dados[i].id +
            '">' +
            dados[i].nomeServico +
            "</option>";
        }
        if (valorAjax != 0) {
          $("#servico_terceiro").html(options).show();
        }
      }
    },
  });
}
function getHorarios(valor) {
  var valorAjax = valor;
  $("#horarios").html("<option value = 0>Aguardando...</option");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "horarios.php?data=" + valorAjax,
    success: function (dados) {
        var options ='';
      if (dados != null) {
        for (var i = 0; i < dados.length; i++) {
          options += "<option>" + dados[i].horario + "</option>";
          console.log(i);
          
        }
        options += "<option value='' hidden >Sem horários disponíveis</option>";
        $("#horarios").html(options).show();
      }
    },
  });
}
 $(function(){
    let = identificacao = document.querySelector("#identificacao").value;
    console.log(identificacao);
    $("#busca").autocomplete({
        source:"autocomplete2.php?teste=" + identificacao 
    });
});



/* function ConsultasAbertas(paciente) {
    var valorAjax = paciente;
    $('#apresentaProntuario').html('<p>Aguardando...</p>');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'prontuarioAbrirProntuario.php?prontuario=' + valorAjax,
        success: function(dados) {
            if (dados != null) {
                var tabela = '<table class="table bg-light mt-2">'
                '<thead class="bg-dark text-light">'
                    '<tr>'
                        '<th>ID</th>'
                        '<th>Envio</th>'
                        '<th>Retorno</th>'
                        '<th>Prótese</th>'
                        '<th>Tipo</th>'
                        '<th>Posição</th>'
                        '<th>Paciente</th>'
                        '<th>Prontuário</th>'
                        '<th>Consulta</th>'
                        '<th>Terceirizado</th>'
                        '<th>Serviço</th>'
                        '<th>Status</th>'

                        '<th></th>'
                        
                    '</tr>'

                '</thead>'
                '<tbody>'
                resultados

                '</tbody>'

            '</table>'
            
                '<p>'+resultados+'</p>';
                
                for (var i = 0; i < dados.length; i++) {
                    resultados += '<tr>\n\
                                    <td class "table-success">' + dados[i].prontuario + '</td>\n\
                                    </tr>';
                }
                if (valorAjax != 0) {
                    $('#apresentaProntuario').html(resultados).show();
                }
            }
        }
    })
} */
