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
    <link rel="stylesheet" href="css/parallax.css">
    <link
    rel="shortcut icon"
    href="img/logo/favicon.ico"
    type="image/x-icon"
    />
  </head>

  <body>
    <?php
      require_once "modules/session.php";
      include_once "modules/modal.php";
    ?>
    <div class="content-wrapper">
      <?php
        include_once 'modules/header.php';
      ?>

      <main>
        <?php
          include_once 'modules/index/carrusel.php';
          //include_once 'modules/ofertas.php';
        ?>
        <div class="mt-1" id="parallax">
        </div>
        <div id="card">
        </div>

      </main>

      <?php
        include_once 'modules/footer.php';
        include_once "modules/meta/scripts.html";
        echo '<script>
        picture("logo","img/logo/Fictichos.png","img/logo/bigF.png",
        "img/logo/Fictichos.png","Logo Test");
        </script>';
        include_once 'modules/index/card.php';
      ?>

    </div>
  </body>
</html>