<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fictichos</title>
    <?php
    include 'modules\stylesheets.php';
    ?>
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
  </head>

  <body>
    <!-- Inicia la barra de navegación. -->
    <div class="content-wrapper">
      <?php
      include 'modules\header.php';
      ?>

      <main>
        <?php
        include 'modules\index\carrusel.php';
        ?>

        <?php
        include 'modules\ofertas.php';
        ?>

        <div id="card">
        </div>

      </main>

      <?php
      include 'modules\footer.php';
      ?>

    </div>

    <!-- Scripts -->
    <?php
    include 'modules\scripts.html';
    ?>
    <?php
      include 'modules\index\card.php';
    ?>
  </body>
</html>