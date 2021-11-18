<script src="js/JQuery2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/protetico.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="bootstrap-select-1.14-dev/js/bootstrap-select.js"></script>
<script type='text/javascript' src='FullCalendar/main.min.js'></script>
<script type='text/javascript' src='FullCalendar/javascript.js'></script>

<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
<script>
    if("<?= IDENTIFICACAO ?>" ===  'Agendamento'){
        Calendario();
    }

</script>


</body>

</html>