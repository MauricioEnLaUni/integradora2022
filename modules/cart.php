<?php
include_once "session.php";
include_once "../../../ssl/connector.php";
$stmt = $conn->prepare('SELECT `u`.`us_nm`,`u`.`us_ln`,`a`.`ad_st`,`a`.`ad_nb`,`a`.`ad_zn`,`a`.`ad_cy`,`a`.`ad_ct`
FROM `users` AS `u`
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
  <title>Document</title>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
  crossorigin="anonymous"
  />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="../css/search.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/confirmSale.css">
  <link rel="stylesheet" href="../css/colors.css">
  <link rel="stylesheet" href="../css/order.css">
</head>
<body>
  <header>
  <?php
  include_once "header.php";
  ?>
  </header>
  <main>
  <div class="container-fluid mt-2 mb-5" id="orderPage">
  <div class="row">
      <h1 id="titleSale">Confirmación de Compra</h1>
  </div>
  <div class="row container" id="datosSale">
    <div class="row" id="printSale">
      <div class="col-6">
        <div class="row">
          <div class="col-3"><p class="h4">Nombre: </p></div>
          <div class="col-8"><?php echo $row['us_nm'] . " " . $row['us_ln'];?></div>
        </div>
        <div class="row">
          <div class="col-3"><p class="h4">Órden: </p></div>
          <div class="col-8"><?php echo $row['us_nm'] . " " . $row['us_ln'];?></div>
        </div>
        <div class="row">
          <div class="col-3"><p class="h4">Fecha: </p></div>
          <div class="col-8"><?php echo date("Y-m-d H:i:s");?></div>
        </div>
        <div class="row">
          <p class="h3">Dirección:</p>
            <button class="col-3">Cambiar</button>
          <p class="col-9"><?php echo $row['ad_nb'] . " " . $row['ad_st'] . " " . $row['ad_zn'] . "<br />" . $row['ad_cy'] . ", " . $row['ad_ct'];?></p>
        </div>
      </div>
      <div class="col-6">
        <div class="accordion" id="payments">
          <div id="ppplus"></div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <table class="table table-dark table-stripped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio Unidad</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Quitar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        $stmt = $conn->prepare('SELECT `it_nm`,(`it_ot`*.85) AS `price`,`it_id`
                                FROM `item`
                                WHERE `it_nm` = :n');
        $stmt->bindParam('n',$j);
        foreach($_SESSION['cart'] as $j=>$v){
          $stmt->execute();
          if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
        <tr>
          <th scope="row"><?php echo $i++;?></th>
          <td><?php echo $row['it_nm'];?></td>
          <td><?php echo $row['price'];?></td>
          <td><input type="number" min="0" value="<?php echo $v;?>" /></td>
          <form action="rmvItem.php" method="POST">
            <td><button type="submit" name="rmv" value="<?php echo $row['it_nm']?>">Quitar</button></td>
          </form>
        </tr>
        <?php }}?>
      </tbody>
    </table>
  </div>
  <div class="row">
    <form action="confirmación.php" method="POST">
      <label>
        <input type="checkbox" name="acuerdo" id="" required/> He leido y acepto los Términos y Condiciones de compra.
      </label>
      <label>
        <input type="checkbox" name="suscribir" id="" /> Suscribirme para obtener más ofertas.
      </label>
      <div class="g-recaptcha" data-sitekey="your_site_key"></div>
      <br/>
      <button
      type="submit"
      value="Comfirmar Pedido"
      id="continueButton"
      onclick="ppp.doContinue();return false;"></button>
      <input type="reset" value="Cancelar" />
      </form>
    </div>
  </div>
</div>
</main>
<?php
include_once "footer.php";
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