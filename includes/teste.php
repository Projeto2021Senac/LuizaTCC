<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="./js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="./css/sweetalert2.min.css">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./bootstrapSelectpicker/dist/css/bootstrap-select.min.css" />
  <link rel="stylesheet" href="./css/estilo.css">
</head>
Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Usuário e/ou senha não cadastrados ou incorretos!',
          confirmButtonText: 'Tudo bem'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'login.php' 
            )
          }
        })
<!-- <body>

    <script>
    Swal.fire(
      'The Internet?',
      'That thing is still around?',
      'question'
    )
  </script>
  <div class="form-group">
    <label for="prontuario">Dentista:</label>
    <select class="selectpicker" data-live-search="true" name="prontuario">
      <option disabled selected>-</option>
      <?php

      /* foreach ($pacientes as $paciente) { */
      ?>
        <option value="<?php /* echo $paciente->prontuario;  */?>">
          <?php /* echo $paciente->nome;  */?>
        </option>
      <?php
      /* } */
      ?>
    </select>
  </div>
  <script src="./bootstrapSelectpicker/js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./bootstrapSelectpicker/js/bootstrap-select.min.js"></script>
</body> -->

</html>