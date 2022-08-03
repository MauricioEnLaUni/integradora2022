<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fictichos</title>
    <?php
      include_once 'config.php';
      include_once 'modules/meta/stylesheets.php';
    ?>
    <link rel="stylesheet" href="css/terms.css">
    <link
    rel="shortcut icon"
    href="img/logo/favicon.ico"
    type="image/x-icon"
    />
  </head>

  <body>
    <header>
    <?php
    include_once 'modules/session.php';
    include_once 'modules/header.php';
    ?>
    </header>
    <?php
      include_once 'modules/modal.php';
      include_once 'modules/header/offcanvasSearch.php';
    ?>
    <main>
      <?php
      if(!isset($_GET['page']) || $_GET['page'] == 'tos'){
        include_once 'modules/legal/ToS.php';
      } else include_once 'modules/legal/privacy.php';
      ?>
    </main>
  <?php
  include_once 'modules/footer.php';
  include_once "modules/meta/scripts.html";
  ?>
  </body>