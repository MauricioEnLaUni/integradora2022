<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fictichos</title>
    <?php
    include 'stylesheets.php';
    ?>
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
  </head>

  <body>
    <!-- Inicia la barra de navegación. -->
    <div class="content-wrapper">
      <?php
      include 'header.php';
      ?>

      <main>
        <?php
        include 'carrusel.php';
        ?>

        <?php
        include 'ofertas.php';
        ?>

        <div id="card">
        </div>

      </main>

      <?php
      include 'footer.php';
      ?>

    </div>

    <!-- Scripts -->
    <?php
    include 'scripts.html';
    ?>
    <?php
      include 'card.php';
    ?>
  </body>
</html>