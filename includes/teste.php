<!DOCTYPE html>

<head>
  <script type="text/javascript" src="js/jQuery.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#hide").click(function() {
        $("div").hide();
      });
      $("#show").click(function() {
        $("div").show();
      });
    });
  </script>
</head>

<body>
  <div>If you click on the "Hide" button, I will disappear.</div>
  <button id="hide">Hide</button>
  <button id="show">Show</button>
</body>

</html>