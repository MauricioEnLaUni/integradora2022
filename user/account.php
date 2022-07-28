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
  <main class="py-3">
  <?php
    include_once "modules/account.php";
  ?>
  </main>
  <footer>
    <?php
      include_once "../modules/footer.php";
    ?>
  </footer>
</body>
</html>
<script src="/Integradora/js/one.js"></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
  crossorigin="anonymous"
></script>