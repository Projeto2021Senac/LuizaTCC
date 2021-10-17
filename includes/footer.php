<script src="js/bootstrap.bundle.min.js">
</script>
<script src="js/JQuery.js"></script>

<script type="text/javascript">
    function habilitar() {
        if (document.getElementById('denteOuro').checked) {
            document.getElementById('qtdOuro').removeAttribute("disabled");
        } else {
            document.getElementById('qtdOuro').value = "";
            document.getElementById('qtdOuro').setAttribute("disabled", "disabled");
        }
    }

    function dureza(valor) {
        if (valor == "Acrilico") {
            document.getElementById('Dureza').removeAttribute("disabled");
        } else {
            document.getElementById('Dureza').value = "[SELECIONE]";
            document.getElementById('Dureza').setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    $(function(){
        $("#pesquisaPaciente").autocomplete({
            source: ''
        });
    })
</script>
</body>

</html>