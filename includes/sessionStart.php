<?php
session_start();
if($_SESSION['nr'] != $_SESSION['confereNR']){

    header('location:sessionDestroy.php');
}
?>