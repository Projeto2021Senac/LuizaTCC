<!-- /**
div container
*/ -->
</div>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
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
  </body>
</html>