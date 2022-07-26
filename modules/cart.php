<?php
include_once "session.php";
include_once "../../../ssl/connector.php";
$i = 1;
$stmt = $conn->prepare('SELECT `it_nm`,(`it_ot`*.85) AS `price`,`it_id`
                        FROM `item`
                        WHERE `it_nm` = :n');
$stmt->bindParam('n',$j);
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
  <link rel="stylesheet" href="css/confirmSale.css">
  <link rel="stylesheet" href="css/colors.css">
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <h1 id="titleSale">Confirmación de Compra</h1>
        </div>
        <div class="row container" id="datosSale">
            <div class="row" id="printSale">
                <div class="col-4">

                </div>
                <div class="col-8">
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
</body>
</html>