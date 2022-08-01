<?php
include_once 'config.php';
include_once 'modules/session.php';
include_once CONN . '/connector.php';
if(!isset($end) || $end < 10) $_SESSION['sPage'] = 1;

function getSearch($stmt,$cond,&$array){
  $stmt->execute([$cond]);
  $result = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach($result as $row){
    $array[] = $row[0];
  }
}
function getOffers($stmt,$cond,&$array){
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_NUM);

  foreach($result as $row){
    $array[] = $row[0];
  }
}

function getTheFors($stmt,$cond,&$array){
  foreach($cond as $row){
    if($row != ""){
      $stmt->execute([$row]);
      $result = $stmt->fetchAll(PDO::FETCH_NUM);
      foreach($result as $row){
        $array[] = $row[0];
      }
    }
  }
}

function andArray($array1,$array2,&$out){
  foreach($array1 as $i){
    if(in_array($i,$array2)) $out[] = $i;
  }
}

if(str_contains($_SERVER['REQUEST_URI'],'?')){
  $txt = [];
  $off = [];
  $scores = [];
  $type = [];
  $brand = [];
  $whose = [];
  $end = [];
  $full = 1;
  include_once 'modules/search/brand.php';
  include_once 'modules/search/names.php';
  include_once 'modules/search/offer.php';
  include_once 'modules/search/price.php';
  include_once 'modules/search/rating.php';
  include_once 'modules/search/style.php';
  include_once 'modules/search/whose.php';
}
?>
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
  <link rel="stylesheet" href="css/rating.css">
  <link rel="stylesheet" href="css/searchPage.css">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/usuario.css" />
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/carrusel.css">
  <link rel="stylesheet" href="css/offers.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/colors.css">
  <link rel="stylesheet" href="css/searchCard.css">
</head>
<body>
<header>
  <?php include_once 'modules/header.php'; ?>
</header>
  <main>
  <div class="container-fluid">
    <div class="row">
      <div class="d-none d-md-block col-md-3"></div>
      <div class="col-12 col-md-9 pt-2">
        <form action="search.php" id="searchBar" role="search" method="GET">
          <label>
              <img src="img/svg/search.svg" alt="">
              <input
              type="search"
              name="searchText"
              />
          </label>
          <button type="submit" name="submit">A</button>
        </form>
      </div>
    </div>
  
    <div class="row mt-2">
      <div class="col-sm-12 col-md-4 col-lg-3 mb-3" id="searchForm">
        <?php
          include 'modules/search/form/estilo.php';
        ?>
          <fieldset id="oferta" form="searchBar">
            <legend>
              Descuentos
            </legend>
            <label form="searchBar">
            Rebajas
            <input
            form="searchBar"
            name="offer"
            type="radio"
            />
            </label>
            <label form="searchBar">
              <input
              form="searchBar"
              name="offer"
              type="radio"
              checked
              />
              Todo
            </label>
          </fieldset>
          <fieldset id="calificacion" form="searchBar">
            <legend>
                Calificaciones
            </legend>
            <input
            form="searchBar"
            class="rating rating--nojs"
            max="5"
            name="inCal"
            step=".5"
            type="range"
            value="2"
            />
          </fieldset>
          <fieldset id="precio" form="searchBar">
            <legend>
                Precio
            </legend>
            <label>
            min
            <input
            form="searchBar"
            type="number"
            name="minNumber"
            size="5"
            min="150"
            max="2999"
            value="150"
            />
            </label>
            <label>
            max
            <input
            form="searchBar"
            type="number"
            name="maxNumber"
            size="5"
            min="150"
            max="2999"
            value="2999"
            />
            </label>
          </fieldset>

          <fieldset id="shoesGender" form="searchBar">
            <legend>
              Género
            </legend>
            <div class="flexbox">
              <label>
                <input
                form="searchBar"
                type="checkbox"
                name="dama"
                value="dama"
                />&ensp;Dama
              </label>
              <label>
                <input
                form="searchBar"
                type="checkbox"
                name="cab"
                value="caballero"
                />&ensp;Caballeros
              </label>
              <label>
                <input
                form="searchBar"
                type="checkbox"
                name="uni"
                value="unisex"
                />&ensp;Unisex
              </label>
              <label>
                <input
                form="searchBar"
                type="checkbox"
                name="infa"
                value="niños"
                />&ensp;Infantil
              </label>
            </div>
          </fieldset>
          <fieldset id="marca" form="searchBar">
            <legend>
              Marca
            </legend>
          </fieldset>
          <fieldset id="colorFlex" form="searchBar">
            <legend>
              Color
            </legend>
            <div class="flexbox" id="color">

            </div>
          </fieldset>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-9" id="searchResults">
          <?php
          $stmt = $conn->prepare('SELECT `it_id`,`it_nm`,`it_ot`,`it_ds`
          FROM `item`
          WHERE `it_id` = ?;');
          $end = array_unique($end);
          $end = array_chunk($end,10);
          foreach($end[$_SESSION['sPage'] - 1] as $tmp){
            $stmt->execute([$tmp]);
            while($tmp = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
          <article class="searchArticle">
            <div class="row">
              <div class="col-2">
                <img src="img/items/smol/<?php echo $tmp['it_id'] ?>.jpg" alt="" width="100vw" class="searchImg"/>
              </div>
              <div class="col-8">
                <h3 class="searchTitle"><?php echo $tmp['it_nm'] ?></h3>
                <h4 class="searchPrice"><?php echo $tmp['it_ot'] ?></h4>
              </div>
              <div class="col-2">
                <button class="searchButton">Carrito</button>
              </div>
              <div class="row">
                <h4 class="searchDesc"><?php echo $tmp['it_ds'] ?></h4>
                <p></p>
              </div>
          </article>
          <?php }}?>
        </div>
      </div>
    </div>
  </div>
  </main>
  <?php
    include_once 'modules/footer.php';
  ?>
  <script src="js/search.js"></script>
</body>
</html>