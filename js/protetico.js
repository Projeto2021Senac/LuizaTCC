function getServicoTerceiro(valor) {
    var valorAjax = valor;
    $('#servico_terceiro').html('<option value = 0>Aguardando...</option');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'TerceiroServico.php?id_terceiro=' + valorAjax,
        success: function(dados) {
            if (dados != null) {
                var options = "<option value='' hidden>Escolher Servico</option>";
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
function habilitar() {
    if (document.getElementById('denteOuro').checked) {
        document.getElementById('qtdOuro').removeAttribute("disabled");
    } else {
        document.getElementById('qtdOuro').value = "";
        document.getElementById('qtdOuro').setAttribute("disabled", "disabled");
    }
}
/*$(function(){
    let = identificacao = document.querySelector("#identificacao").value;
    console.log(identificacao);
    $("#busca").autocomplete({
        source:"autoComplete.php?teste=" + identificacao 
    });
});*/



function Dados_Cadastrais() {
    
    var valorAjax = document.getElementById('aux').value;
    
    $('#apresenta_DadosCadastrais').html('<p>Aguardando...</p>');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'prontuarioAbrirProntuario.php?prontuario=' + valorAjax,
        success: function(dados) {
            if (dados !== null) {
                var p,n,s,t,e;
                for (var i = 0; i < dados.length; i++) {
                    p=dados[i].prontuario;
                    n=dados[i].nomePaciente;
                    s=dados[i].sexo;
                    t=dados[i].telefone;
                    e=dados[i].email;
                }
                var labels = '<div class="row">\n\
                                <div class="col-1 offset-8">\n\
                                <img src="./includes/img/usuario.png" alt="" width="200" height="100">\n\
                                </div>\n\
                                <div class="col-8">\n\
                                    <label>Prontuário: </label><input readonly type="text" class="form-control"  value="'+p+'">\n\
                                    <label>Paciente: </label><input readonly type="text" class="form-control"  value="'+n+'">\n\
                                    <label>Sexo: </label><input readonly type="text" class="form-control"  value="'+s+'">\n\
                                    <label>Telefone: </label><input readonly type="text" class="form-control"  value="'+t+'">\n\
                                    <label>E-mail: </label><input readonly type="text" class="form-control"  value="'+e+'">\n\
                                </div>\n\
                              </div>';
                
          
                $('#apresenta_DadosCadastrais').html(labels).show();
                
                /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
            }
               
            
        }
    })
}

function Consultas() {
    
    var valorAjax = document.getElementById('aux').value;
    
    $('#apresenta_Consultas').html('<p>Aguardando...</p>');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'consultasAbrirProntuario.php?prontuario=' + valorAjax,
        success: function(dados) {
            if (dados !== null) {
                
                var tabela = '<thead><tr><th>ID</th>\n\
                                    <th>Data</th>\n\
                                    </tr>\n\
                              </thead>';
                for (var i = 0; i < dados.length; i++) {
                    tabela+= '<tbody><tr>\n\
                                <td class "table-success">' + dados[i].id + '</td>\n\
                                <td class "table-success">' + dados[i].data + '</td>\n\
                                </tr></tbody>';
                    //$('#apresentaProntuario').append('<tbody><tr><td class "table-success">' + dados[i].prontuario + '</td></tr></tbody>');
                    
                }
                $('#apresenta_Consultas').html(tabela).show();
                /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
            }
        }
    })
}
