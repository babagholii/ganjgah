<!DOCTYPE html>
<html lang="fa">
<head>
  <!-- Favicon and touch icons -->
  <!--  <link rel="shortcut icon" href="--><? //= baseUrl() ?><!--/image/project/logo-64.png">-->

  <meta charset="utf-8">
  <title></title>

  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="asset/style/style.css">
<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>-->
<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>-->
  <link rel="stylesheet" href="asset/style/player.css"/>

  <script src="asset/js/jquery-3.6.0.min.js"></script>
  <script src="asset/js/jquery-ui.min.js"></script>
  <script src="asset/js/kendo.all.min.js"></script>

<!--  <script src="asset/js/faal.js"></script>-->
  <script src="asset/js/player.js"></script>

</head>
<body>

<div id="root"></div>

</body>
</html>

<script>

  $(function () {
    const root = $('div#root');

    $.ajax({
      url: 'home.php'
    }).done(function (output) {
      root.html(output);
    });

  });

</script>