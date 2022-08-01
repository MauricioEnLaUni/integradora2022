<?php
  include_once "config.php";
  require_once "modules/session.php";
  include_once CONN . '/connector.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/about.css">
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
      include_once 'modules/modal.php';
    ?>
    <header>
      <?php include_once 'modules/header.php'; ?>
    </header>
    <div class="content-wrapper">
      <main>
        <div class="row hero"></div>
        <div class="row mt-5 mb-3">
          <div class="col-md-3 col-sm-1 d-none d-sm-flex"></div>
          <div class="col-md-6 col-sm-10 col-12">
            <h1 id="abouTtitle" class="text-center blueU">Fictichos</h1>
            <p class="text-center blueU">About us</p>
            <p class="text-justify blueU">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut iure, optio distinctio, ad soluta sapiente quasi cupiditate maiores quos quam aliquid maxime voluptatibus tempora reiciendis doloribus reprehenderit omnis, non cum!</p>
            <p class="text-justify blueU">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta nam accusantium ullam mollitia saepe libero enim ab cumque nostrum expedita voluptatem quis eius iure, magni laudantium exercitationem maxime? Amet, et?</p>
          </div>
          <div class="col-md-3 col-sm-1 d-none d-sm-flex"></div>
          </div>
          <div class="row">
            <?php
            $equipo = [
              0=>['Victor','210727','img','victor cara','rol'],
              1=>['Hector','210727','img','victor cara','rol'],
              2=>['Victor','210727','img','victor cara','rol']
            ];
            foreach($equipo as $r){
              include "modules/about/card.php";
            }
            ?>
          </div>
      </main>
      <footer></footer>
      <?php
        include_once 'modules/footer.php';
        include_once 'modules/meta/scripts.html';
        echo '<script>
        picture("logo","img/logo/Fictichos.png","img/logo/bigF.png",
        "img/logo/Fictichos.png","Logo Test");
        </script>';
      ?>
    </div>
  </body>
</html>