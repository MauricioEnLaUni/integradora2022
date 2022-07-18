<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fictichos</title>
    <?php
      include_once 'modules/meta/stylesheets.php';
    ?>
    <link
    rel="shortcut icon"
    href="img/logo/favicon.ico"
    type="image/x-icon"
    />
  </head>

  <body>
    <?php
      require_once "modules/session.php";
    ?>
    <?php
      include_once "modules/modal.php";
    ?>
    <!-- Inicia la barra de navegación. -->
    <div class="content-wrapper">
      <?php
        include_once 'modules/header.php';
      ?>

      <main>
        <?php
          include_once 'modules/index/carrusel.php';
        ?>

        <?php
          include_once 'modules/ofertas.php';
        ?>

        <div id="card">
        </div>

      </main>

      <?php
        include_once 'modules/footer.php';
      ?>

    </div>

    <!-- Scripts -->
    <?php
      include_once 'modules/meta/scripts.html';
    ?>
    <?php
      include_once 'modules/index/card.php';
    ?>
  </body>
</html>