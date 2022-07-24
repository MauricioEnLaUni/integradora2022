<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manejo de Cuenta</title>
  <?php
    include_once "modules/userStyle.php";
  ?>
</head>
<body>
  <header>
    <?php
      include_once "../modules/session.php";
      require_once "logged.php";
      include_once "../modules/header.php";
    ?>
  </header>
  <main>
    <?php
      include_once "modules/orden.php";
    ?>
  </main>
  <footer>
    <?php
      include_once "../modules/footer.php";
    ?>
  </footer>
</body>
</html>
<?php
  include_once "../modules/meta/scripts.html";
?>