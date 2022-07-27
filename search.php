<?php
include_once "modules/session.php";
include_once '../../ssl/connector.php';
function getSearch($cond,&$array){
  $stmt->execute([$cond]);
  $result = $stmt->fetch(PDO::FETCH_NUM);
  $array = $result[0];
}
function getArraySearch($cond,&$array){
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_NUM);

  foreach($result as $row){
    $fill[] = $row[0];
  }
}

if(str_contains($_SERVER['REQUEST_URI'],'?')){
  if($_GET['submit'] != 1){
    $stmt = $conn->prepare("SELECT `it_id`
                            FROM `item`
                            WHERE `it_nm` LIKE ?;");
    getSearch($_GET['searchText'],$fill);
    if($of !== false){
      $stmt = $conn->prepare('SELECT `it_id`
                            FROM `item`
                            WHERE `it_of` IS NOT NULL;');
      getArraySearch($_GET['offer'],$fill);
    }
    

  }else{
    $stmt = $conn->prepare("SELECT `it_id`
                            FROM `item`
                            WHERE `it_nm` LIKE ?;");
    getSearch($_GET['searchText'],$fill);
  }
}
$nm = (isset($_GET['searchText'])) ? "%" . $_GET['searchText'] . "%" : "";
$of = (isset($_GET['offer'])) ? True : "";
$sc = (isset($_GET['inCal'])) ? $_GET['inCal'] : "";
$min = (isset($_GET['minNumber'])) ? $_GET['minNumber'] : "";
$max = (isset($_GET['maxNumber'])) ? $_GET['maxNumber'] : "";

$st[] = (isset($_GET['Bota'])) ? 'Bota' : "";
$st[] = (isset($_GET['Bote'])) ? 'Bote' : "";
$st[] = (isset($_GET['Clogs'])) ? 'Clogs' : "";
$st[] = (isset($_GET['Loafers'])) ? 'Loafers' : "";
$st[] = (isset($_GET['Sandalia'])) ? 'Sandalia' : "";
$st[] = (isset($_GET['Slipper'])) ? 'Slipper' : "";
$st[] = (isset($_GET['Atletico'])) ? 'Atletico' : "";
$st[] = (isset($_GET['Trabajo'])) ? 'Trabajo' : "";

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
  crossorigin="anonymous"
  />
  <link rel="stylesheet" href="css/rating.css">
  <link rel="stylesheet" href="css/searchPage.css">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/encabezado.css" />
  <link rel="stylesheet" href="css/usuario.css" />
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/carrusel.css">
  <link rel="stylesheet" href="css/offers.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/colors.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form action="search.php" id="searchBar" role="search" method="GET">
          <label>
              <img src="img/svg/search.svg" alt="">
              <input
              type="search"
              name="searchText"
              />
          </label>
          <button type="submit">A</button>
        </form>
      </div>
    </div>
  
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-3" id="searchForm">
        <fieldset id="estilo">
          <legend>Estilo</legend>
        </fieldset>
          <fieldset id="oferta">
            <legend>
              Descuentos
            </legend>
            <label>
            Rebajas
            <input
            form="searchForm"
            name="offer"
            type="radio"
            />
            </label>
            <label>
              <input
              form="searchForm"
              name="offer"
              type="radio"
              />
              Todo
            </label>
          </fieldset>
          <fieldset id="calificacion">
            <legend>
                Calificaciones
            </legend>
            <input    
            class="rating rating--nojs"
            form="searchBar"
            max="5"
            name="inCal"
            step=".5"
            type="range"
            value="2"
            />
          </fieldset>
          <fieldset id="precio">
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

          <fieldset id="shoesGender">
            <legend>
              Género
            </legend>
            <div class="flexbox">
              <label>
                <input
                form="searchForm"
                type="checkbox"
                name="dama"
                value="dama"
                />&ensp;Dama
              </label>
              <label>
                <input
                form="searchForm"
                type="checkbox"
                name="cab"
                value="caballero"
                />&ensp;Caballeros
              </label>
              <label>
                <input
                form="searchForm"
                type="checkbox"
                name="uni"
                value="unisex"
                />&ensp;Unisex
              </label>
              <label>
                <input
                form="searchForm"
                type="checkbox"
                name="infa"
                value="niños"
                />&ensp;Infantil
              </label>
            </div>
          </fieldset>
          <fieldset id="marca">
            <legend>
              Marca
            </legend>
          </fieldset>
          <fieldset id="colorFlex">
            <legend>
              Color
            </legend>
            <div class="flexbox" id="color">

            </div>
          </fieldset>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-3" id="searchResults">
          <article class="searchArticle">
              <img src="img/placeholderRAT.jpg" alt="" width="100vw"/>
              <h3>Item Title</h3>
              <h4>Precio</h4>
              <h4>Descripción</h4>
              <button>Agregar al carrito</button>
          </article>
        </div>
      </div>
    </div>
  </div>
  <script src="js/search.js"></script>
</body>
</html>