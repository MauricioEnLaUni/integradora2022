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
      include_once '../../ssl/connector.php';
      include_once "modules/modal.php";
    ?>
    <header>
      <?php include_once 'modules/header.php'; ?>
    </header>
    <div class="content-wrapper">
      <main class="pt-3 pb-4">
        <a href="modules/cart.php" class="btn btn-primary">Cart</a>
        <?php include_once 'modules/index/carrusel.php'; ?>
        <aside class="row">
          <div class="col-md-9">
            <div class="row" id="card1">
            </div>
          </div>
          <div class="col-md-3">
          </div>
        </aside>
        <div id="parallax" class="row"></div>
        <div id="card2" class="row"></div>
      </main>
      <footer></footer>
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