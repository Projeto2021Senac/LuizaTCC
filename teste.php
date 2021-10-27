<?php
require __DIR__ . '/vendor/autoload.php';

use Classes\Entity\Procedimento;

$linhasProcedimento = Procedimento::getProcedimentos();
//echo '<pre>';print_r($linhasProcedimento);echo'<pre>';exit;
if (isset($_POST['submit'])) {
    echo '<pre>';
    print_r($_POST);
    echo '<pre>';
    exit;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap-select-picker.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="css/css-debug.css"> -->

    <title>Document</title>
</head>

<body>
    <form id = "Terceirizado">
        <select name="Terceiro" onchange="funcaoMaior(this.value)">
            <option value="1">Teste1</option>
            <option value="2">Teste2</option>
            <option value="3">Teste3</option>

        </select>
        <div id="Serviço Terceiro"></div>
    </form>

    <script src="js/JQuery2.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-select-1.14-dev/js/bootstrap-select.js"></script>
    <script>
            var myForm = document.getElementById("Terceirizado");
            formData = new FormData(myForm);
        function funcaoMaior(valor) {
            var valorAjax = valor;
            function pegarJson(){
                $.getJSON('ajaxTeste.php?Terceiro='+valor,)
            }

                $.ajax({
                    url: 'ajaxTeste.php?Terceiro=' + valor,
                    method: 'POST',
                    dataType: "json",
                })
                
        }
        
    </script>
</body>

</html>