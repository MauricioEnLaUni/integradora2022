<?php
include_once "modules/session.php";
include_once '../../ssl/connector.php';
if(!isset($end) || $end < 10) $_SESSION['sPage'] = 1;
$st[] = (isset($_GET['Bota'])) ? 'Bota' : "";
$st[] = (isset($_GET['Bote'])) ? 'Bote' : "";
$st[] = (isset($_GET['Clogs'])) ? 'Clogs' : "";
$st[] = (isset($_GET['Loafers'])) ? 'Loafr' : "";
$st[] = (isset($_GET['Sandalia'])) ? 'Sanda' : "";
$st[] = (isset($_GET['Slipper'])) ? 'Slipp' : "";
$st[] = (isset($_GET['Atletico'])) ? 'Atlet' : "";
$st[] = (isset($_GET['Trabajo'])) ? 'Work' : "";

$br[] = (isset($_GET['Adidas'])) ? 'Adidas' : "";
$br[] = (isset($_GET['Caterpillar'])) ? 'Caterpillar' : "";
$br[] = (isset($_GET['Converse'])) ? 'Converse' : "";
$br[] = (isset($_GET['Crocs'])) ? 'Crocs' : "";
$br[] = (isset($_GET['ECCO'])) ? 'ECCO' : "";
$br[] = (isset($_GET['Hush'])) ? 'Hush Puppies' : "";
$br[] = (isset($_GET['Nike'])) ? 'Nike' : "";
$br[] = (isset($_GET['SAS'])) ? 'SAS' : "";

$gn[] = (isset($_GET['dama'])) ? 'Mujr' : "";
$gn[] = (isset($_GET['cab'])) ? 'Homb' : "";
$gn[] = (isset($_GET['uni'])) ? 'Unsx' : "";
$gn[] = (isset($_GET['infa'])) ? 'Infa' : "";

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
  if(isset($_GET['submit'])){
    $stmt = $conn->prepare("SELECT `it_id`
                            FROM `item`
                            WHERE `it_nm` LIKE ?;");
    $tx = "%" . $_GET['searchText'] . "%";
    getSearch($stmt,$tx,$txt);

    if($_GET['offer'] !== false){
      $stmt = $conn->prepare('SELECT `it_id`
                            FROM `item`
                            WHERE `it_of` IS NOT NULL;');
      getOffers($stmt,$_GET['offer'],$off);
    }

    $stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_id` IN (
                          SELECT `sc_it`
                          FROM `score`
                          HAVING AVG(`sc_se`) >= ?
                        );');
    getSearch($stmt,$_GET['inCal'],$scores);

    $stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_ot` BETWEEN ? AND ?;');
    $stmt->execute([$_GET['minNumber'],$_GET['maxNumber']]);
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach($result as $row){
      $minmax[] = $row[0];
    }
    
    $stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_tp` = ?;');
    getTheFors($stmt,$st,$type);

    $stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_br` = ?;');
    getTheFors($stmt,$br,$brand);

    $stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_wh` = ?;');
    getTheFors($stmt,$br,$whose);

    function andMe(&$t,&$t2,&$e){
      if(empty($t)) $t[] = 0;
      if(empty($t2)) $t2[] = 0;
      andArray($t,$t2,$e);
      array_unique($e);
      unset($t);
      unset($t2);
    }
    if(empty($off)) andArray($txt,$scores,$tmp1);
    if(empty($type)) andArray($type,$minmax,$tmp2);
    andMe($tmp1,$tmp2,$end);
    andArray($brand,$whose,$tmp1);
    andArray($tmp1,$end,$end);
    array_unique($end);

  }else{
    $stmt = $conn->prepare("SELECT `it_id`
                            FROM `item`
                            WHERE `it_nm` LIKE ?;");
    getSearch($stmt,$_GET['searchText'],$end);
  }
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
  <?php
      include_once "modules/session.php";
      include_once "../../ssl/connector.php";
      include_once "modules/header.php";
  ?>
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
        <fieldset id="estilo">
          <legend>Estilo</legend>
        </fieldset>
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
    include_once "modules/footer.php";
  ?>
  <script src="js/search.js"></script>
</body>
</html>