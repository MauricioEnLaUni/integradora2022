<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="css/newest.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/colors.css">
</head>
<body>
<div class="container-fluid navContainer">
<div class="row">
  <div class="col-md-3 g-0">
    <a href="index.php"><div id="logo"></div></a>
  </div>
  <div class="col-md-9">
    <div class="row flex-row-reverse">
    <div id="inscribir" class="noneBasic col-md-2">
      <img src="img/svg/pencil-square.svg" alt="" />
      <a
      class="btn btn-link logButtons"
      data-bs-toggle="modal"
      href="#logInModal2"
      role="button">
          Inscribirse
      </a>
    </div>
    <div id="acceder" class="noneBasic col-md-2">
      <img src="img/svg/personFill.svg" alt="" />
      <a
      class="btn btn-link logButtons"
      data-bs-toggle="modal"
      href="#logInModal"
      role="button">
          Acceder
      </a>
    </div>
    <div class="search-bar col-md-6">
      <input
          type="search"
          class="search-bar__input"
          placeholder="Buscar"
          aria-label="buscar"
      />
      <button type="submit" class="search-bar__submit" aria-label="enviar búsqueda">
          <img src="img\svg\search.svg" alt="" />
      </button>
    </div>
    <?php
      include_once 'modules/modal.php';
    ?>
  </div>
  <div class="row text-center navBCont">
    <a class="navButtons col-3" href="index.php">
      INICIO
    </a>
    <a class="navButtons col-3" href="">
      NOVEDADES
    </a>
    <a class="navButtons col-3" href="about.php">
      NOSOTROS
    </a>
    <a class="navButtons col-3" href="contact.php">
      CONTACTO
    </a>
  </div>
</div>
</div>
</div>




  <script src="js/one.js"></script>
  <script>
    picture("logo","img/logo/Fictichos.png","img/logo/bigF.png","img/logo/Fictichos.png","Logo Test");
  </script>
  
<script src="js/card.js"></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
  crossorigin="anonymous">
</script>
</body>
</html>
