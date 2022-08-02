<?php
include_once "config.php";
include_once "modules/session.php";
include_once CONN . "/connector.php";
$stmt = $conn->prepare('SELECT `u`.`us_nm`,`u`.`us_ln`,`a`.`ad_st`,`a`.`ad_id`,`a`.`ad_nb`,`a`.`ad_zn`,`a`.`ad_cy`,`a`.`ad_ct`
FROM `USERS` AS `u`
INNER JOIN `address` AS `a` ON `u`.`us_id` = `a`.`ad_us`
WHERE `us_id` = :u 
LIMIT 1;');
$stmt->bindParam('u',$_SESSION['userId']);
$stmt->execute();
$row = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito</title>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
  crossorigin="anonymous"
  />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/confirmSale.css">
  <link rel="stylesheet" href="css/colors.css">
  <link rel="stylesheet" href="css/order.css">
</head>
<body>
  <header>
  <?php
  include_once "modules/header.php";
  ?>
  </header>
<main>
<div class="container-fluid mt-2 mb-5" id="orderPage">
  <div class="row">
      <h1 id="titleSale">Confirmación de Compra</h1>
  </div>
  <?php
  include_once 'modules/cart/userData.php';
  include_once 'modules/cart/orderTable.php';
  include_once 'modules/cart/submit.php';
  ?>
</div>
</main>
<?php
include_once "modules/footer.php";
?>
</body>
</html>
<script src="https://www.paypalobjects.com/webstatic/ppplusdcc/ppplusdcc.min.js" type="text/javascript"></script>
<script type="application/javascript">
    var ppp = PAYPAL.apps.PPP({
    "approvalUrl": "'.$approval_url.'",
        "placeholder": "ppplus",
        "mode": "sandbox",});
</script>
<script src="js/paypalPlaceholder.js"></script>