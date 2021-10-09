<?php
/**
 * Mensagem caso o cadastro seja  efetuado com sucesso
 */
if (isset($_GET, $_GET['status'], $_GET['id']) && is_string($_GET['status']) && is_numeric($_GET['id']) && $_GET['status'] == 'success') {
      echo "<script>
            Swal.fire({
              title: '".NAME ." n° " .$_GET['id']. " cadastrada com sucesso!!',
              text: \"Caso haja alguma alteração a ser feita, utilize o botão vermelho corrigir\",
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                redirecionamento()
            }
            })
            function redirecionamento(){
              window.location.href = \"".LINK."\"
            }
            </script>";
    }
/**
 * Mensagem caso o cadastro não seja  efetuado com sucesso
 */
    if (isset($_GET['status']) && is_string($_GET['status']) && $_GET['status'] == 'error') {

      print("<script>
              Swal.fire({
                title: 'Houve um erro ao cadastrar a ".NAME."!!',
                text: \"Algo ocorreu, tente novamente!!\",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  redirecionamento()
                  
                }
              })
              function redirecionamento(){
                window.location.href = \"".LINK."\"
              }
              </script>");
    }

    /**
 * Mensagem caso algum campo não esteja preenchido como o necessário para efetuar a ação requerida.
 */

    if (isset($erro) && $erro == 1) {

      print("<script>
              Swal.fire({
                title: 'Houve um erro ao finalizar a ".NAME."!!',
                text: \"Algo ocorreu, tente novamente!!\",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              })
              </script>");
    }
?>