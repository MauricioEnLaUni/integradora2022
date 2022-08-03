<?php
include_once 'config.php';
include_once 'modules/session.php';
include_once CONN . '/connector.php';
include_once 'modules/search/allItems.php';
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

if(str_contains($_SERVER['REQUEST_URI'],'?')){
  $end = [];
  include_once 'modules/search/brand.php';
  include_once 'modules/search/colors.php';
  include_once 'modules/search/names.php';
  include_once 'modules/search/offer.php';
  include_once 'modules/search/price.php';
  include_once 'modules/search/rating.php';
  include_once 'modules/search/style.php';
  include_once 'modules/search/whose.php';
  include_once 'modules/search/join.php';
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
    <?php
      include_once 'modules/modal.php';
      include_once 'modules/header/offcanvasSearch.php';
    ?>
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
          <button type="submit" name="submit">Buscar</button>
        </form>
      </div>
    </div>
  
    <div class="row mt-2">
      <div class="col-sm-12 col-md-4 col-lg-3 mb-3" id="searchForm">
        <?php
          include_once 'modules/search/form/estilo.php';
          include_once 'modules/search/form/discount.php';
          include_once 'modules/search/form/ratings.php';
          include_once 'modules/search/form/price.php';
          include_once 'modules/search/form/whose.php';
          include_once 'modules/search/form/brand.php';
          include_once 'modules/search/form/color.php';
        ?>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-9" id="searchResults">
          <?php
          include_once 'modules/search/results/card.php';
          ?>
        </div>
      </div>
    </div>
  </div>
  </main>
  <?php
    include_once 'modules/footer.php';
    include_once "modules/meta/scripts.html";
  ?>
</body>
</html>