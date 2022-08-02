<?php
include_once "config.php";
require_once  'modules/session.php';
require_once CONN . '/connector.php';
$id = $_GET['product'];

$stmt = $conn->prepare('SELECT `it_id`,`it_nm`,`it_ds`,`it_in`,`it_br`,`it_cl`,`it_tp`,`it_wh`,`it_of`
FROM `ITEM`
WHERE `it_id` = :i;');
$stmt->bindParam('i',$id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare('SELECT *
FROM `STOCK`
WHERE `st_it` = :i;');
$stmt->bindParam('i',$id);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Fictichos</title>
<?php
    include_once  'modules/meta/stylesheets.php';
?>
<link rel="stylesheet" href="css/exhibit.css">
<link rel="stylesheet" href="css/rating.css">
<link rel="stylesheet" href="css/parallax.css">
</head>

<body>
<?php
include_once  'modules/modal.php';
?>
<header>
<?php
  include_once "modules/header.php";
?>
</header>

<main class="py-3">
  <div class="container-fluid">
    <div class="row">
      <?php include_once "modules/exhibit.php";?>
      <div class="col-2"></div>
    </div>
  <div id="parallax" class="row"></div>
  <div class="row" id="card1">
  </div>
</div>
</main>
<footer>
  <?php include_once "modules/footer.php";?>
</footer>
<?php
  include_once "modules/meta/scripts.html";
  $loljson = json_encode($item);
  echo "<script>exhibit('itemImage',$loljson,$id)</script>";
  include_once "modules/meta/scripts.html";
  include_once "modules/index/card.php";
?>
</body>
</html>