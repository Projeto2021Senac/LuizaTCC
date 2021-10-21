<?php
require __DIR__ . '/vendor/autoload.php';

use Classes\Entity\Procedimento;

$linhasProcedimento = Procedimento::getProcedimentos();
//echo '<pre>';print_r($linhasProcedimento);echo'<pre>';exit;
if (isset($_POST['submit'])) {
echo '<pre>';print_r(count($_POST['teste']));echo'<pre>';exit;
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
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <div class="form-group">
            <label for="observacao">Procedimentos:</label>
            <select class="selectpicker" multiple="multiple" data-live-search="true" name="teste[]">

                <?php

                foreach ($linhasProcedimento as $linha) {
                ?>
                    <option value="<?= $linha->nomeProcedimento; ?>"><?= $linha->nomeProcedimento; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <input type="submit" name="submit"></input>
    </form>

    <script src="js/JQuery2.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-select-1.14-dev/js/bootstrap-select.js"></script>
</body>

</html>