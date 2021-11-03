<script src="js/JQuery2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="bootstrap-select-1.14-dev/js/bootstrap-select.js"></script>
<!-- <script src="js/JQuery.min.js"></script> -->

<script>
    $(function () {
        $("#busca").autocomplete({
            source: 'autoComplete.php'
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


<script type="text/javascript">


 $( "#RFKTerceiro" ).change(function() {
  ( "#RFKServico" ).load( "cadRastreio.php?retorno=2" );
  alert("asdasdasdasdasdas");
});

    // function selecionaServico() {
    //var select = document.getElementById('RFKTerceiro');
    //var retorno = select.options[select.selectedIndex].value;
    //window.location= "cadRastreio.php?retorno="+retorno;




    //ATUALIZA PAG. 
    /*history.replaceState({
     id: 'retorno',
     source: 'cadRastreio.php'
     }, 'retorno', 'cadRastreio.php?retorno='+retorno);
     //location.reload(true);*/
    //}
</script>
</body>

</html>
